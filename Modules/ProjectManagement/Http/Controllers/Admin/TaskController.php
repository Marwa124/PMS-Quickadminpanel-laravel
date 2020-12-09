<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\ProjectManagement\Entities\Milestone;
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
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::all();

        $task_statuses = TaskStatus::get();

        $task_tags = TaskTag::get();

        $users = User::get();

        $projects = Project::get();

        $milestones = Milestone::get();

        $opportunities = Opportunity::get();

        $work_trackings = WorkTracking::get();

        $leads = Lead::get();

        $permissions = Permission::get();

        return view('projectmanagement::admin.tasks.index', compact('tasks', 'task_statuses', 'task_tags', 'users', 'projects', 'milestones', 'opportunities', 'work_trackings', 'leads', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::all()->pluck('name', 'id');

        $assigned_tos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $milestones = Milestone::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_trackings = WorkTracking::all()->pluck('achievement', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('projectmanagement::admin.tasks.create', compact('statuses', 'tags', 'assigned_tos', 'projects', 'milestones', 'opportunities', 'work_trackings', 'leads', 'permissions'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        $task->tags()->sync($request->input('tags', []));
        $task->permissions()->sync($request->input('permissions', []));

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

        $assigned_tos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $milestones = Milestone::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_trackings = WorkTracking::all()->pluck('achievement', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $task->load('status', 'tags', 'assigned_to', 'project', 'milestone', 'opportunities', 'work_tracking', 'lead', 'permissions');

        return view('projectmanagement::admin.tasks.edit', compact('statuses', 'tags', 'assigned_tos', 'projects', 'milestones', 'opportunities', 'work_trackings', 'leads', 'permissions', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $task->tags()->sync($request->input('tags', []));
        $task->permissions()->sync($request->input('permissions', []));

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

        $task->load('status', 'tags', 'assigned_to', 'project', 'milestone', 'opportunities', 'work_tracking', 'lead', 'permissions');

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
}
