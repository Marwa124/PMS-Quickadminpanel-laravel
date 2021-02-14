<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Notifications\ProjectManagementNotification;
use Illuminate\Support\Facades\DB;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Entities\TimeSheet;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyTaskRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTaskRequest;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\Task;
use Modules\ProjectManagement\Entities\TaskStatus;
use Modules\ProjectManagement\Entities\TaskTag;
use App\Models\User;
use App\Models\WorkTracking;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectManagementMail;

class TaskController extends Controller
{
    use MediaUploadingTrait, ProjectManagementHelperTrait;

    public function __construct()
    {
        $this->middleware('AllowAccessShowAndEditPages:Task', ['only' => ['show', 'edit', 'getAssignTo', 'update_task_timer']]);
    }

    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $task_statuses = TaskStatus::get();

        $task_tags = TaskTag::get();

        $projects = Project::get();

        $milestones = Milestone::get();

        if (request()->segment(count(request()->segments())) == 'trashed') {

            abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;

            $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, $trashed);

            return view('projectmanagement::admin.tasks.index', compact('tasks', 'trashed', 'task_statuses', 'task_tags', 'projects', 'milestones'));

        }

        $trashed = false;

        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, $trashed);

        return view('projectmanagement::admin.tasks.index', compact('tasks', 'trashed', 'task_statuses', 'task_tags', 'projects', 'milestones'));
    }

    public function create($id = null)
    {
        // $id refer to task_id in case and refer to milestone id in anther case depend on route

        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        //$statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::all()->pluck('name_'.app()->getLocale(), 'id');

        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');

        $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id);
        foreach ($milestones as $milestone){

            $milestone->load('project');
        }

        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('name_'.app()->getLocale(), 'id');


        $task = null;
        $milestone = null;
        $project = null;


        if (request()->segment(count(request()->segments()) - 1) == 'project-task') {
            $project = Project::findOrFail($id);

            // check if user can access this project or not
            $all_projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

            if (!in_array($project->id, $all_projects->toArray())) {

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }

        }

        if (request()->segment(count(request()->segments()) - 1) == 'milestone-task') {
            $milestone = Milestone::findOrFail($id);

            // check if user can access this milestone or not
            $all_milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id)->pluck('id');

            if (!in_array($milestone->id, $all_milestones->toArray())) {

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }
        }

        if (request()->segment(count(request()->segments()) - 1) == 'sub-task') {
            $task = Task::findOrFail($id);

            // check if user can access this task or not
            $all_tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('id');

            if (!in_array($task->id, $all_tasks->toArray())) {

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }

        }

        return view('projectmanagement::admin.tasks.create', compact('tags', 'projects', 'milestones', 'task', 'tasks', 'milestone', 'project'));
    }

    public function store(StoreTaskRequest $request)
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            unset($request['created_by']);
            $request['created_by'] = auth()->user()->id;

            $task = Task::create($request->all());
            $task->tags()->sync($request->input('tags', []));

            if ($request->input('attachment', false)) {
                $task->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
            }

            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $task->id]);
            }

            setActivity('task', $task->id, 'Save Task Details', 'حقظ تفاصيل المهمه', $task->name_en, $task->name_ar);

            // Commit the transaction
            DB::commit();
            return redirect()->route('projectmanagement.admin.tasks.index')->with(flash(trans('cruds.messages.create_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            return redirect()->back()->with(flash(trans('cruds.messages.create_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.tasks.index');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this task or not
        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('id');

        if (in_array($task->id, $tasks->toArray())) {

            $tags = TaskTag::all()->pluck('name_'.app()->getLocale(), 'id');

            $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('name_'.app()->getLocale(), 'id');

            $milestones = Milestone::with('project')->get();

            $tasks = Task::with('milestone')->get();

            $task->load('tags', 'assigned_to', 'project', 'milestone');

            return view('projectmanagement::admin.tasks.edit', compact('tags', 'projects', 'milestones', 'task', 'tasks'));

        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $task->update($request->all());
            $task->tags()->sync($request->input('tags', []));

            if ($request->input('attachment', false)) {
                if (!$task->attachment || $request->input('attachment') !== $task->attachment->file_name) {
                    if ($task->attachment) {
                        $task->attachment->delete();
                    }

                    $task->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
                }
            } elseif ($task->attachment) {
                $task->attachment->delete();
            }

            // Notify User
            foreach ($task->accountDetails as $accountUser) {
                $user = $accountUser->user;
//                $dataMail = [
//                    'subjectMail' => 'Update Task ' . $task->name,
//                    'bodyMail' => 'Update The Task ' . $task->name,
//                    'action' => route("projectmanagement.admin.tasks.show", $task->id)
//                ];

                $dataNotification = [
                    'message' => 'Update The Task : ' . $task->{'name_'.app()->getLocale()},
                    'route_path' => 'admin/projectmanagement/tasks',
                ];

//                $user->notify(new ProjectManagementNotification($task, $user, $dataMail, $dataNotification));

                //send notification
//                $user->notify(new ProjectManagementNotification($task, $user, $dataMail, $dataNotification));
                $user->notify(new ProjectManagementNotification($task, $user, $dataNotification));
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

                $message = $userName.' '.'Update The Task '.$task->{'name_'.app()->getLocale()};
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));
            }

            setActivity('task', $task->id, 'Update Task Details', 'تعديل تفاصيل المهمه', $task->name_en, $task->name_ar);


            // Commit the transaction
            DB::commit();

            return redirect()->route('projectmanagement.admin.tasks.index')->with(flash(trans('cruds.messages.update_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.update_failed'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.tasks.index');
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this task or not
        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('id');

        if (in_array($task->id, $tasks->toArray())) {

            $task->load('tags', 'project', 'milestone', 'createBy', 'TimeSheetOn', 'TimeSheet');

            return view('projectmanagement::admin.tasks.show', compact('task'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $task->delete();

            setActivity('task', $task->id, 'Delete Task', 'حذف المهمه', $task->name_en, $task->name_ar);


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

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            //Task::whereIn('id', request('ids'))->delete();

            $ids = request('ids');

            foreach ($ids as $id) {
                $task = Task::where('id', $id)->first();

                $task->delete();

                //$project->accountDetails()->detach();
                setActivity('task', $task->id, 'Delete Task', 'حذف المهمه', $task->name_en, $task->name_ar);

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
        abort_if(Gate::denies('task_create') && Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $model = new Task();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id)
    {

        abort_if(Gate::denies('task_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $task = Task::findOrFail($id);

        // check if user can access this task or not
        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('id');

        if (in_array($id, $tasks->toArray())) {


            if ( !$task->project || !$task->project->department ) {
                abort(404, trans('cruds.messages.project_of_task_not_have_department'));
            }
            $department = $task->project->department;


            return view('projectmanagement::admin.tasks.assignto', compact('task', 'department'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
    }

    public function storeAssignTo(Request $request)
    {
        abort_if(Gate::denies('task_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $task = Task::findOrFail($request->task_id);
            if ($request->accounts) {

                $task->accountDetails()->sync($request->accounts);

                // set permission to users
                $accounts = AccountDetail::whereIn('id', $request->accounts)->with('user.department')->get();

                $task_permissions_head_names = ['project_management_access', 'task_access', 'task_create', 'task_show', 'task_edit', 'task_assign_to'];
                $task_permissions_notToMember_names = ['task_create', 'task_assign_to'];
    //            $task_permissions_head_names = ['project_management_access', 'task_access', 'task_create', 'task_show', 'task_edit'];
    //            $task_permissions_notToMember_names = ['task_create'];
                $task_permissions_toMember_names = ['project_management_access', 'task_access', 'task_show', 'task_edit'];

                $task_permissions_head = $this->getPermissionID($task_permissions_head_names);
                $task_permissions_notToMember = $this->getPermissionID($task_permissions_notToMember_names);
                $task_permissions_toMember = $this->getPermissionID($task_permissions_toMember_names);

                foreach ($accounts as $account) {

                    foreach ($account->user->permissions as $permission) {

                        if (in_array($permission->name, $task_permissions_notToMember_names)) {
                            $account->user->permissions()->detach($task_permissions_notToMember);
                        }
                    }
                    $account->user->permissions()->syncWithoutDetaching($task_permissions_toMember);

                    foreach ($account->user->department as $department) {
                        if ($department->department_name == $task->project->department->department_name) {
                            $account->user->permissions()->syncWithoutDetaching($task_permissions_head);

                            break;
                        }
                    }
                }
            } else {
                $task->accountDetails()->detach();
            }

            // Notify User
            foreach ($task->accountDetails as $accountUser) {
                $user = $accountUser->user;
//                $dataMail = [
//                    'subjectMail' => 'New Task Assign To You',
//                    'bodyMail' => 'Assign The Task : ' . $task->name . ' To ' . $user->name,
//                    'action' => route("projectmanagement.admin.tasks.show", $task->id)
//                ];

                $dataNotification = [
                    'message' => 'Assign The Task : ' . $task->{'name_'.app()->getLocale()} . ' To ' . $user->name,
                    'route_path' => 'admin/projectmanagement/tasks',
                ];

//                $user->notify(new ProjectManagementNotification($task, $user, $dataMail, $dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($task, $user, $dataNotification));
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

                $message = $userName.' '.'Assign The Task : '.$task->{'name_'.app()->getLocale()}. ' To ' . $user->name;
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));
            }

            setActivity('task', $task->id, 'Update Assign to', 'تعديل القائمين على مهمة', $task->name_en, $task->name_ar);


            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return redirect()->route('projectmanagement.admin.tasks.index');
    }

    public function update_note(Request $request)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();
            $task = Task::findOrFail($request->task_id);
            //$project->notes = $request->notes;
            $task->update($request->all());

            // Notify User
            foreach ($task->accountDetails as $accountUser) {
                $user = $accountUser->user;
//                $dataMail = [
//                    'subjectMail' => 'Update Task ' . $task->name,
//                    'bodyMail' => 'Update Note Of Task ' . $task->name,
//                    'action' => route("projectmanagement.admin.tasks.show", $task->id)
//                ];

                $dataNotification = [
                    'message' => 'Update Note Of Task : ' . $task->{'name_'.app()->getLocale()},
                    'route_path' => 'admin/projectmanagement/tasks',
                ];

//                $user->notify(new ProjectManagementNotification($task, $user, $dataMail, $dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($task, $user, $dataNotification));
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

                $message = $userName.' '.'Update Note Of Task '.$task->{'name_'.app()->getLocale()};
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender,$message));
            }

            setActivity('task', $task->id, 'Update Note','تعديل الملاحظات', $task->name_en, $task->name_ar);

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

//        return redirect()->back();
    }

    public function update_task_timer($task_id)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this task or not
        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('id');

        if (in_array($task_id, $tasks->toArray())) {

            try {
                // Begin a transaction
                DB::beginTransaction();
                $user_id = auth()->user()->id;
                $taskTimer = TimeSheet::where('module', '=', 'task')->where('module_field_id', $task_id)->where('user_id', $user_id)->where('timer_status', 'on')->first();

                if (!$taskTimer) {
                    $Timer = [
                        'user_id' => $user_id,
                        'module' => 'task',
                        'module_field_id' => $task_id,
                        'timer_status' => 'on',
                        'start_time' => time(),
                    ];

                    $taskTimer = TimeSheet::create($Timer);

                } else {

                    $taskTimer->update(['timer_status' => 'off', 'end_time' => time()]);
                }

                $timer_status = trans('global.off');
                if($taskTimer->timer_status == 'on'){

                    $timer_status = trans('global.on');
                }

                setActivity('task',$task_id,'Timer '.$timer_status,'المؤقت ' .$timer_status,$taskTimer->task->name_en,$taskTimer->task->name_ar);


                // Commit the transaction
                DB::commit();

            }catch(\Exception $e){
                // An error occured; cancel the transaction...
                DB::rollback();

                // and throw the error again.
                throw $e;
            }
            return redirect()->back();
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function forceDelete(Request $request, $id)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            //dd($request->all(),$id);
            $action = $request->action;

            if ($action == 'force_delete') {

                $task = Task::onlyTrashed()->where('id', $id)->first();
                //force Delete Task
                $this->forceDeleteTask($task);
                $message = 'force_delete_success';

            } else if ($action == 'restore') {
                //restore Task
                Task::onlyTrashed()->where('id', $id)->restore();
                $task = Task::findOrFail($id);
                $message = 'restore_success';

                setActivity('task',$task->id,'Restore Task Details ','إسترجاع المهمة من الحذف',$task->name_en,$task->name_ar);

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

    public function task_clone($task_id)
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try{
            // Begin a transaction
            DB::beginTransaction();

            // get Task by id
            $task = Task::findOrFail($task_id);

            // check if user can access this task or not
            $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id, false, true)->pluck('id');

            if (!in_array($task_id, $tasks->toArray())) {

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }

            // clone Task as new Task

            $newtask = $task->cloneTask();

            // Commit the transaction
            DB::commit();

            return redirect()->route('projectmanagement.admin.tasks.show',$newtask->id)->with(flash(trans('cruds.messages.clone_success'), 'success'));

        }catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            return back()->with(flash(trans('cruds.messages.clone_failed'), 'danger'));
            // and throw the error again.
            throw $e;
        }
    }

    public function task_report()
    {
        abort_if(Gate::denies('task_report_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

//        $user = User::findOrFail(auth()->user()->id);
//        if ($user->hasrole(['Admin', 'Super Admin'])) {
            $tasks = Task::all();

            return view('projectmanagement::admin.tasks.task_report', compact('tasks'));

//        }
//
//        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
    }


}
