<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyMilestoneRequest;
use Modules\ProjectManagement\Http\Requests\StoreMilestoneRequest;
use Modules\ProjectManagement\Http\Requests\UpdateMilestoneRequest;
use Modules\ProjectManagement\Entities\Milestone;
use Gate;
use Illuminate\Http\Request;
use Modules\ProjectManagement\Entities\Project;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ProjectManagementNotification;
use App\Models\User;
use App\Mail\ProjectManagementMail;
use App\Events\NewNotification;

class MilestonesController extends Controller
{
    use ProjectManagementHelperTrait;

    public function __construct()
    {
        $this->middleware('AllowAccessShowAndEditPages:Milestone',['only' => ['show','edit','getAssignTo']]);
    }

    public function index()
    {
        abort_if(Gate::denies('milestone_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));


        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;
            $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id,$trashed);

            return view('projectmanagement::admin.milestones.index', compact('milestones','trashed'));

        }

        $trashed = false;
        $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id,$trashed);


        return view('projectmanagement::admin.milestones.index', compact('milestones','trashed'));
    }

    public function create($id = null)
    {

        // $id refer to project_id in this case

        abort_if(Gate::denies('milestone_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');
        $project = null;

        if (request()->segment(count(request()->segments())-1) == 'project-milestone' || $id)
        {
            $project = Project::findOrFail($id);

            // check if user can access this project or not
            $all_projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

            if (!in_array($project->id,$all_projects->toArray())){
                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }
        }

        return view('projectmanagement::admin.milestones.create', compact('projects','project'));
    }

    public function store(StoreMilestoneRequest $request)
    {
        abort_if(Gate::denies('milestone_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
        try {
            // Begin a transaction
            DB::beginTransaction();
            $milestone = Milestone::create($request->all());

            // Commit the transaction
            DB::commit();
            return redirect()->route('projectmanagement.admin.milestones.index')->with(flash(trans('cruds.messages.create_success'), 'success'));

        }catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.create_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }
    }

    public function edit(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this milestone or not
        $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id)->pluck('id');

        if (in_array($milestone->id,$milestones->toArray()))
        {

            $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');

            $milestone->load('accountDetails', 'project');

            return view('projectmanagement::admin.milestones.edit', compact('projects', 'milestone'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function update(UpdateMilestoneRequest $request, Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();
            $milestone->update($request->all());

            // Commit the transaction
            DB::commit();
            return redirect()->route('projectmanagement.admin.milestones.index')->with(flash(trans('cruds.messages.update_success'), 'success'));

        }catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.update_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }
    }

    public function show(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this milestone or not
        $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id)->pluck('id');

        if (in_array($milestone->id,$milestones->toArray()))
        {

            $milestone->load('accountDetails', 'project');

            return view('projectmanagement::admin.milestones.show', compact('milestone'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function destroy(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
        //$milestone->accountDetails()->detach();
        try {
            // Begin a transaction
            DB::beginTransaction();

            $milestone->delete();

            // Commit the transaction
            DB::commit();
            return redirect()->back()->with(flash(trans('cruds.messages.delete_success'), 'danger'));
        }catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.delete_failed'), 'danger'));
            // and throw the error again.
            throw $e;
        }
    }

    public function massDestroy(MassDestroyMilestoneRequest $request)
    {
        abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $ids = request('ids');

            //Milestone::whereIn('id', request('ids'))->delete();

            foreach ($ids as $id){
                $milestone = Project::where('id',$id)->first();

                $milestone->delete();
            }
            // Commit the transaction
            DB::commit();
        }catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getAssignTo($id)
    {

        abort_if(Gate::denies('milestone_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this milestone or not
        $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id)->pluck('id');

        if (in_array($id,$milestones->toArray()))
        {

            $milestone = Milestone::findOrFail($id);

            if (!$milestone->project){

                abort(404,trans('cruds.messages.milestone_not_have_project'));
            }

            $department = $milestone->project->department;

            if (!$department){
                abort(404,trans('cruds.messages.project_of_milestone_not_have_department'));

            }

            return view('projectmanagement::admin.milestones.assignto',compact('milestone','department'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
    }


    public function storeAssignTo(Request $request)
    {
        abort_if(Gate::denies('milestone_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $milestone = Milestone::findOrFail($request->milsetone_id);
            if ($request->accounts) {

                $milestone->accountDetails()->sync($request->accounts);

                // set permission to users
                $accounts = AccountDetail::whereIn('id', $request->accounts)->with('user.department')->get();

                $milestone_permissions_head_names = ['project_management_access', 'milestone_access', 'milestone_create', 'milestone_show', 'milestone_edit', 'milestone_assign_to'];
                $milestone_permissions_notToMember_names = ['milestone_create', 'milestone_edit', 'milestone_assign_to'];
                $milestone_permissions_toMember_names = ['project_management_access', 'milestone_access', 'milestone_show'];

                $milestone_permissions_head = $this->getPermissionID($milestone_permissions_head_names);
                $milestone_permissions_notToMember = $this->getPermissionID($milestone_permissions_notToMember_names);
                $milestone_permissions_toMember = $this->getPermissionID($milestone_permissions_toMember_names);

                foreach ($accounts as $account) {

                    foreach ($account->user->permissions as $permission) {

                        if (in_array($permission->name, $milestone_permissions_notToMember_names)) {
                            $account->user->permissions()->detach($milestone_permissions_notToMember);
                        }
                    }
                    $account->user->permissions()->syncWithoutDetaching($milestone_permissions_toMember);

                    foreach ($account->user->department as $department) {
                        if ($department->department_name == $milestone->project->department->department_name) {
                            $account->user->permissions()->syncWithoutDetaching($milestone_permissions_head);

                            break;
                        }
                    }
                }
            }else{
                $milestone->accountDetails()->detach();
            }

            // Notify User
            foreach ($milestone->accountDetails as $accountUser)
            {
                $user = $accountUser->user;

                $dataNotification = [
                    'message'       => 'Assign The Project : '.$milestone->{'name_'.app()->getLocale()}.' To '.$user->name,
                    'route_path'    => 'admin/projectmanagement/milestones',
                ];
//
//                $user->notify(new ProjectManagementNotification($project,$user,$dataMail,$dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($milestone,$user,$dataNotification));
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

                //send mail to user
                $template = templates('responsible_milestone');
                $message = str_replace("{ASSIGNED_BY}",$userName,$template->template_body);
                $message = str_replace("{PROJECT_NAME}",$milestone->project->name_en,$message);
                $message = str_replace("{MILESTONE_NAME}",$milestone->name_en,$message);
                $message = str_replace("{PROJECT_LINK}",route("projectmanagement.admin.milestones.show", $milestone->id),$message);
                $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

                Mail::mailer('smtp')->to($user->email)
                    ->cc(['mabrouk@onetecgroup.com','sara@onetecgroup.com'])
                    ->bcc('marwa@onetecgroup.com')
                    ->send(new ProjectManagementMail($email_from, $sender,$message,$template->subject));
//                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));

//                $message = $userName.' '.'Assign The Project <a href="'.route("projectmanagement.admin.projects.show", $project->id).'">'.$project->{'name_'.app()->getLocale()}.'</a> To '.$user->name;
//                dd('kk');

            }
//            dd('ll');
            // Commit the transaction
            DB::commit();

            return redirect()->route('projectmanagement.admin.milestones.index')->with(flash(trans('cruds.messages.assignto_success'), 'success'));

        }catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            return back()->with(flash(trans('cruds.messages.assignto_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }
//            return redirect()->route('projectmanagement.admin.milestones.index');
    }

    public function forceDelete(Request $request,$id)
    {
        abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $action = $request->action;
            $message = '';
            if ($action == 'force_delete') {

                $milestone = Milestone::onlyTrashed()->where('id', $id)->first();

                $this->forceDeleteMilestone($milestone);
                $message = 'force_delete_success';
            } else if ($action == 'restore') {
                Milestone::onlyTrashed()->where('id', $id)->restore();
                $message = 'restore_success';
            }
            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('cruds.messages.'.$message), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
//            $message = 'action_failed';
            return back()->with(flash(trans('cruds.messages.action_failed'), 'danger'));
            // and throw the error again.
            throw $e;
        }

        return back();
    }

//    public function massforceDelete(Request $request)
//    {
//        //dd($request->all());
//        $ids = request('ids');
//
//        foreach ($ids as $id){
//            $milestone = Milestone::where('id',$id)->first();
//            $milestone->accountDetails()->detach();
//        }
//
//        Milestone::onlyTrashed()->whereIn('id', request('ids'))->forceDelete();
//
//        return response(null, Response::HTTP_NO_CONTENT);
//    }
}
