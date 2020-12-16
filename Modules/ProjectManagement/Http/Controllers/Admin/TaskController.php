<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Http\Controllers\Traits\PermissionHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyTaskRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTaskRequest;
use App\Models\Lead;
use App\Models\Opportunity;
use App\Models\Permission;
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

class TaskController extends Controller
{
    use MediaUploadingTrait,PermissionHelperTrait;

    public function __construct()
    {
        $this->middleware('AllowAccessShowAndEditPages:Task',['only' => ['show','edit','getAssignTo']]);
    }

    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tasks = Task::with('project','milestone')->get();

        $tasks = auth()->user()->getUserTasksByUserID(auth()->user()->id);

        $task_statuses = TaskStatus::get();

        $task_tags = TaskTag::get();

        //$users = User::get();

        $projects = Project::get();

        $milestones = Milestone::get();

        //$opportunities = Opportunity::get();

        //$work_trackings = WorkTracking::get();

        //$leads = Lead::get();

        //$permissions = Permission::get();
        //dd($milestones);

        return view('projectmanagement::admin.tasks.index', compact('tasks', 'task_statuses', 'task_tags', 'projects', 'milestones'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::all()->pluck('name', 'id');

//        $assigned_tos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id');

        //$milestones1 = Milestone::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $milestones = Milestone::with('project')->get();

//        $allmilestones =[];
//        foreach ($milestones1 as $id => $milestone1){
//            foreach ($milestones as $milestone){
//                if($id == $milestone->id){
//
//                    //dd($id,$milestone1,$milestone->project);
//                    array_push($allmilestones,[ 'milestone_id' =>$id,
//                        'milestone_name' =>$milestone1,
//                        'project_id' => $milestone->project->id,
//                       ]);
//
//                }
//            }
//        }
//        dd($milestones);
//        foreach ($allmilestones as $milestone){
//            dd($milestone['milestone_name']);
//        }

//        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

//        $work_trackings = WorkTracking::all()->pluck('achievement', 'id')->prepend(trans('global.pleaseSelect'), '');

//        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

//        $permissions = Permission::all()->pluck('title', 'id');

        return view('projectmanagement::admin.tasks.create', compact('statuses', 'tags', 'projects', 'milestones'));
    }

    public function store(StoreTaskRequest $request)
    {
        unset($request['created_by']);
        $request['created_by'] = auth()->user()->id;
        //dd($request->all());

        $task = Task::create($request->all());
        $task->tags()->sync($request->input('tags', []));
//        $task->permissions()->sync($request->input('permissions', []));

        if ($request->input('attachment', false)) {
            $task->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $task->id]);
        }

        return redirect()->route('projectmanagement.admin.tasks.index');
    }

        public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::all()->pluck('name', 'id');

//        $assigned_tos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id');

        //$milestones = Milestone::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $milestones = Milestone::with('project')->get();

//        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//
//        $work_trackings = WorkTracking::all()->pluck('achievement', 'id')->prepend(trans('global.pleaseSelect'), '');
//
//        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//
//        $permissions = Permission::all()->pluck('title', 'id');

        $task->load('status', 'tags', 'assigned_to', 'project', 'milestone');

        return view('projectmanagement::admin.tasks.edit', compact('statuses', 'tags', 'projects', 'milestones', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        //dd($request->all(),$task);
        $task->update($request->all());
        $task->tags()->sync($request->input('tags', []));
//        $task->permissions()->sync($request->input('permissions', []));

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

        return redirect()->route('projectmanagement.admin.tasks.index');
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->load('status', 'tags', 'project', 'milestone','createBy');

        return view('projectmanagement::admin.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        Task::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('task_create') && Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Task();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id)
    {

//        abort_if(Gate::denies('task_assign_to'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $task = Task::findOrFail($id);
        $department = $task->project->department;
        //dd($department,$task->project);
        if (!$department){
            abort(404,"this project don't have department ");
        }

        return view('projectmanagement::admin.tasks.assignto',compact('task','department'));
    }

    public function storeAssignTo(Request $request)
    {
        //dd($request->all());
        $task = Task::findOrFail($request->task_id);
        if ($request->accounts) {

            $task->accountDetails()->sync($request->accounts);

            // set permission to users
            $accounts = AccountDetail::whereIn('id', $request->accounts)->with('user.department')->get();

//            $task_permissions_head_names = ['project_management_access','task_access','task_create', 'task_show','task_edit','task_assign_to'];
//            $task_permissions_notToMember_names = ['task_create','task_assign_to'];
            $task_permissions_head_names = ['project_management_access', 'task_access', 'task_create', 'task_show', 'task_edit'];
            $task_permissions_notToMember_names = ['task_create'];
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
        }else{
            $task->accountDetails()->detach();
        }

        return redirect()->route('projectmanagement.admin.tasks.index');
    }
}
