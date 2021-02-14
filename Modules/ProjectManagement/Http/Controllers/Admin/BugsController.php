<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\User;
use App\Notifications\ProjectManagementNotification;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\Bug;
use Modules\ProjectManagement\Entities\Comment;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyBugRequest;
use Modules\ProjectManagement\Http\Requests\StoreBugRequest;
use Modules\ProjectManagement\Http\Requests\UpdateBugRequest;
use Gate;
use Illuminate\Http\Request;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\Task;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectManagementMail;
use Validator;


class BugsController extends Controller
{
    use MediaUploadingTrait,ProjectManagementHelperTrait;

    public function __construct()
    {
        $this->middleware('AllowAccessShowAndEditPages:Bug',['only' => ['show','edit','getAssignTo']]);
    }

    public function index()
    {
        abort_if(Gate::denies('bug_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));


        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;

            $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id,$trashed);

            return view('projectmanagement::admin.bugs.index', compact('bugs','trashed'));
        }


        $trashed = false;

        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id,$trashed);

        return view('projectmanagement::admin.bugs.index', compact('bugs','trashed'));
    }

    public function create($id =null)
    {
        // $id refer to task_id in case and refer to project id in anther case depend on route

        abort_if(Gate::denies('bug_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');

        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id,false,true);

        $project    = null;
        $task       = null;

        if (request()->segment(count(request()->segments())-1) == 'project-bug')
        {
            $project = Project::findOrFail($id);

            // check if user can access this project or not
            $all_projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

            if (!in_array($project->id,$all_projects->toArray())){

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }
        }

        if (request()->segment(count(request()->segments())-1) == 'task-bug')
        {
            $task = Task::findOrFail($id);

            // check if user can access this task or not
            $all_tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id,false,true)->pluck('id');

            if (!in_array($task->id,$all_tasks->toArray())){

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }
        }

        return view('projectmanagement::admin.bugs.create', compact('projects','tasks','project','task'));
    }

    public function store(StoreBugRequest $request)
    {
        abort_if(Gate::denies('bug_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $request['issue_no'] = 'pms'.substr(time(),-8);           //pms + time function to be sure this num is unique
            $request['reporter'] = auth()->user()->id;

            $bug = Bug::create($request->all());

            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $bug->id]);
            }

            setActivity('bug', $bug->id, 'New Bug Added', ' bug جديدة إضافة', $bug->name_en, $bug->name_ar);

            // Commit the transaction
            DB::commit();
            return redirect()->route('projectmanagement.admin.bugs.index')->with(flash(trans('cruds.messages.create_success'), 'success'));


        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            return redirect()->back()->with(flash(trans('cruds.messages.create_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.bugs.index');
    }

    public function edit(Bug $bug)
    {
        abort_if(Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this Bug or not
        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($bug->id,$bugs->toArray()))
        {

            $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');

            $tasks = Task::with('project')->get();

            $bug->load('project','task');

            return view('projectmanagement::admin.bugs.edit', compact('projects','tasks','bug'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function update(UpdateBugRequest $request, Bug $bug)
    {
        abort_if(Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $bug->update($request->all());

            // Notify User
            foreach ($bug->accountDetails as $accountUser)
            {
                $user = $accountUser->user;

                $dataNotification = [
                    'message'       => 'Update The Bug : '.$bug->{'name_'.app()->getLocale()},
                    'route_path'    => 'admin/projectmanagement/bugs',
                ];

                //send notification
                $user->notify(new ProjectManagementNotification($bug,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;

                if(User::find(auth()->user()->id)->accountDetail && User::find(auth()->user()->id)->accountDetail()->first())
                {
                    $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
                }else {
                    $userName = User::find(auth()->user()->id)->name;
                }

//                $message = $userName.' '.'Update The Bug '.$bug->{'name_'.app()->getLocale()};
//                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));

                //send mail to user
                $template = templates('bug_updated');
                $message = str_replace("{ASSIGNED_BY}",$userName,$template->template_body);
                $message = str_replace("{BUG_TITLE}",$bug->name_en,$message);
                $message = str_replace("{STATUS}",$bug->status,$message);
                $message = str_replace("{MARKED_BY}",$bug->reporterBy && $bug->reporterBy->name ? $bug->reporterBy->name : '',$message);
                $message = str_replace("{BUG_URL}",route("projectmanagement.admin.bugs.show", $bug->id),$message);
                $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

                Mail::mailer('smtp')->to($user->email)
                    ->cc(['mabrouk@onetecgroup.com','sara@onetecgroup.com'])
                    ->bcc('marwa@onetecgroup.com')
                    ->send(new ProjectManagementMail($email_from, $sender,$message,$template->subject));
            }

            setActivity('bug', $bug->id, 'Update Bug', ' bug تعديل', $bug->status, $bug->status);

            // Commit the transaction
            DB::commit();
            return redirect()->route('projectmanagement.admin.bugs.index')->with(flash(trans('cruds.messages.update_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            return redirect()->back()->with(flash(trans('cruds.messages.update_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.bugs.index');

    }

    public function show(Bug $bug)
    {
        abort_if(Gate::denies('bug_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this Bug or not
        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($bug->id,$bugs->toArray()))
        {

            $bug->load('project', 'task');

            return view('projectmanagement::admin.bugs.show', compact('bug'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function destroy(Bug $bug)
    {
        abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $bug->delete();

//            setActivity('bug',$bug->id,'Delete Bug',$bug->name);
            setActivity('bug', $bug->id, 'Delete Bug', ' bug حذف', $bug->name_en, $bug->name_ar);

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return back();
    }

    public function massDestroy(MassDestroyBugRequest $request)
    {
        abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        //Bug::whereIn('id', request('ids'))->delete();

        try {
            // Begin a transaction
            DB::beginTransaction();

            $ids = request('ids');

            foreach ($ids as $id){
                $bug = Bug::where('id',$id)->first();

                $bug->delete();

                //$project->accountDetails()->detach();
                setActivity('bug', $bug->id, 'Delete Bug', ' bug حذف', $bug->name_en, $bug->name_ar);
            }

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bug_create') && Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $model         = new Bug();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id)
    {

        abort_if(Gate::denies('bug_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this Bug or not
        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($id,$bugs->toArray()))
        {

            $bug = Bug::findOrFail($id);
            $department = $bug->project->department;

            if (!$department){
                abort(404,trans('cruds.messages.project_of_bug_not_have_department'));
            }

            return view('projectmanagement::admin.bugs.assignto',compact('bug','department'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function storeAssignTo(Request $request)
    {
        abort_if(Gate::denies('bug_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $bug = Bug::findOrFail($request->bug_id);
            if ($request->accounts){


                $bug->accountDetails()->sync($request->accounts);
                // set permission to users
                $accounts = AccountDetail::whereIn('id',$request->accounts)->with('user.department')->get();

                $bug_permissions_head_names = ['project_management_access','bug_access','bug_create', 'bug_show','bug_edit','bug_assign_to'];
                $bug_permissions_notToMember_names = ['bug_create','bug_assign_to'];
    //            $bug_permissions_head_names = ['project_management_access','bug_access','bug_create', 'bug_show','bug_edit'];
    //            $bug_permissions_notToMember_names = ['bug_create'];
                $bug_permissions_toMember_names = ['project_management_access','bug_access','bug_show','bug_edit'];

                $bug_permissions_head = $this->getPermissionID($bug_permissions_head_names);
                $bug_permissions_notToMember = $this->getPermissionID($bug_permissions_notToMember_names);
                $bug_permissions_toMember = $this->getPermissionID($bug_permissions_toMember_names);

                foreach ($accounts as $account){

                    foreach ($account->user->permissions as $permission){

                        if (in_array($permission->name,$bug_permissions_notToMember_names)){
                            $account->user->permissions()->detach($bug_permissions_notToMember);
                        }
                    }
                    $account->user->permissions()->syncWithoutDetaching($bug_permissions_toMember);

                    foreach ($account->user->department as $department){
                        if ($department->department_name == $bug->project->department->department_name){
                            $account->user->permissions()->syncWithoutDetaching($bug_permissions_head);

                            break;
                        }
                    }
                }
            }else{
                $bug->accountDetails()->detach();
            }

            // Notify User
            foreach ($bug->accountDetails as $accountUser)
            {
                $user = $accountUser->user;

                $dataNotification = [
                    'message'       => 'Assign The Bug : '.$bug->{'name_'.app()->getLocale()}.' To '.$user->name,
                    'route_path'    => 'admin/projectmanagement/bugs',
                ];

                //send notification
                $user->notify(new ProjectManagementNotification($bug,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;

                if(User::find(auth()->user()->id)->accountDetail && User::find(auth()->user()->id)->accountDetail()->first())
                {
                    $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
                }else {
                    $userName = User::find(auth()->user()->id)->name;
                }

//                $message = $userName.' '.'Assign The Bug '.$bug->{'name_'.app()->getLocale()}.' To '.$user->name;
//                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));

                //send mail to user
                $template = templates('bug_assigned');
                $message = str_replace("{ASSIGNED_BY}",$userName,$template->template_body);
                $message = str_replace("{BUG_TITLE}",$bug->name_en,$message);
                $message = str_replace("{BUG_URL}",route("projectmanagement.admin.bugs.show", $bug->id),$message);
                $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

                Mail::mailer('smtp')->to($user->email)
                    ->cc(['mabrouk@onetecgroup.com','sara@onetecgroup.com'])
                    ->bcc('marwa@onetecgroup.com')
                    ->send(new ProjectManagementMail($email_from, $sender,$message,$template->subject));
            }

            setActivity('bug', $bug->id, 'Update Assign to', ' bug تعديل القائمين على', $bug->name_en, $bug->name_ar);

            // Commit the transaction
            DB::commit();

            return redirect()->route('projectmanagement.admin.bugs.index')->with(flash(trans('cruds.messages.assignto_success'), 'success'));


        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return back()->with(flash(trans('cruds.messages.assignto_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.bugs.index');
    }

    public function update_note(Request $request)
    {
        abort_if(Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $bug = Bug::findOrFail($request->bug_id);
            //$project->notes = $request->notes;
            $bug->update($request->all());

            // Notify User
            foreach ($bug->accountDetails as $accountUser)
            {
                $user = $accountUser->user;

                $dataNotification = [
                    'message'       => 'Update Note Of Bug : '.$bug->{'name_'.app()->getLocale()},
                    'route_path'    => 'admin/projectmanagement/bugs',
                ];

                //send notification
                $user->notify(new ProjectManagementNotification($bug,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

//                // send mail
//                $sender =  settings('smtp_sender_name');
//                $email_from =  settings('smtp_email') ;
//
//                if(User::find(auth()->user()->id)->accountDetail && User::find(auth()->user()->id)->accountDetail()->first())
//                {
//                    $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
//                }else {
//                    $userName = User::find(auth()->user()->id)->name;
//                }

//                $message = $userName.' '.'Update Note Of Bug '.$bug->{'name_'.app()->getLocale()};
//                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));

            }

//            setActivity('bug',$bug->id,'Update Note ',$bug->name);
            setActivity('bug', $bug->id, 'Update Note', 'تعديل الملاحظات', $bug->name_en, $bug->name_ar);

            // Commit the transaction
            DB::commit();

            return back()->with(flash(trans('cruds.messages.update_note_success'), 'success'));


        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return back()->with(flash(trans('cruds.messages.update_note_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }

        return redirect()->back();
    }

    public function forceDelete(Request $request,$id)
    {
        abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();
            //dd($request->all(),$id);
            $action = $request->action;

            if ($action == 'force_delete') {

                $bug = Bug::onlyTrashed()->where('id', $id)->first();

                // force delete bug
                $bug->forceDelete();
                $message = 'force_delete_success';


            } else if ($action == 'restore') {
                //restore bug
                Bug::onlyTrashed()->where('id', $id)->restore();
                $bug = Bug::findOrFail($id);
                $message = 'restore_success';

                setActivity('bug', $bug->id, 'Restore Bug', 'إسترجاع Bug من الحذف', $bug->name_en, $bug->name_ar);
            }

            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('cruds.messages.'.$message), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            return back()->with(flash(trans('cruds.messages.action_failed'), 'danger'));

            // and throw the error again.
            throw $e;
        }

    }

    public function bug_report()
    {
        abort_if(Gate::denies('bug_report_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

//        $user = User::findOrFail(auth()->user()->id);
//        if ($user->hasrole(['Admin','Super Admin']))
//        {
        $bugs = Bug::all();
        $yearly_report = $this->get_project_report_by_month();

        $unconfirmArray = [];
        $confirmedArray = [];
        $in_progressArray = [];
        $resolvedArray = [];
        $verifiedArray = [];

        foreach($yearly_report as $report)
        {
                array_push($unconfirmArray,$report->where('status','unconfirm')->count());
                array_push($confirmedArray,$report->where('status','confirmed')->count());
                array_push($in_progressArray,$report->where('status','in_progress')->count());
                array_push($resolvedArray,$report->where('status','resolved')->count());
                array_push($verifiedArray,$report->where('status','verified')->count());
        }


        $unconfirmArray = implode(',',$unconfirmArray);
        $confirmedArray = implode(',',$confirmedArray);
        $in_progressArray = implode(',',$in_progressArray);
        $resolvedArray = implode(',',$resolvedArray);
        $verifiedArray = implode(',',$verifiedArray);

        return view('projectmanagement::admin.bugs.bug_report', compact('bugs','unconfirmArray','confirmedArray','in_progressArray','resolvedArray','verifiedArray'));

//        }
//
//        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
    }

    public function add_comment(Request $request)
    {

        try {
            // Begin a transaction
            DB::beginTransaction();

            if ($request->comment_replay_id){

                $validator = Validator::make($request->all(),[
                    'bug_id'            => 'exists:bugs,id',
                    'replay_comment'    => 'required',
                    'comment_replay_id' => 'exists:comments,id',
                ]);
                if($validator->fails()) {
                    return redirect()->back()->with(flash(trans('cruds.messages.add_replay_failed'), 'danger'))->withErrors($validator)->withInput();
                }
                $comment = Comment::create([
                    'module_field_id'       => $request->bug_id,
                    'comment'               => $request->replay_comment,
                    'module'                => 'bug',
                    'user_id'               => auth()->user()->id,
                    'comment_replay_id'     => $request->comment_replay_id,
                ]);
            }else{

                $validator = Validator::make( $request->all(),[
                    'bug_id'        => 'exists:bugs,id',
                    'comment'           => 'required',
                ]);

                if($validator->fails()) {
                    return redirect()->back()->with(flash(trans('cruds.messages.add_replay_failed'), 'danger'))->withErrors($validator)->withInput();
                }

                $replay = Comment::create([
                    'module_field_id'       => $request->bug_id,
                    'comment'               => $request->comment,
                    'module'                => 'bug',
                    'user_id'               => auth()->user()->id,
                ]);
            }
            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('cruds.messages.add_replay_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            return back()->with(flash(trans('cruds.messages.add_replay_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }
//        return redirect()->back();
    }

}
