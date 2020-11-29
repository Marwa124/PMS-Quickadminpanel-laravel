<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyTaskAttachmentRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskAttachmentRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTaskAttachmentRequest;
use App\Models\Bug;
use App\Models\Lead;
use App\Models\Opportunity;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\Task;
use Modules\ProjectManagement\Entities\TaskAttachment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TaskAttachmentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('task_attachment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskAttachments = TaskAttachment::all();

        return view('projectmanagement::admin.taskAttachments.index', compact('taskAttachments'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_attachment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bugs = Bug::all()->pluck('issue_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('projectmanagement::admin.taskAttachments.create', compact('tasks', 'users', 'leads', 'opportunities', 'projects', 'bugs'));
    }

    public function store(StoreTaskAttachmentRequest $request)
    {
        $taskAttachment = TaskAttachment::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $taskAttachment->id]);
        }

        return redirect()->route('projectmanagement.admin.task-attachments.index');
    }

    public function edit(TaskAttachment $taskAttachment)
    {
        abort_if(Gate::denies('task_attachment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bugs = Bug::all()->pluck('issue_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $taskAttachment->load('task', 'user', 'lead', 'opportunities', 'project', 'bug');

        return view('projectmanagement::admin.taskAttachments.edit', compact('tasks', 'users', 'leads', 'opportunities', 'projects', 'bugs', 'taskAttachment'));
    }

    public function update(UpdateTaskAttachmentRequest $request, TaskAttachment $taskAttachment)
    {
        $taskAttachment->update($request->all());

        return redirect()->route('projectmanagement.admin.task-attachments.index');
    }

    public function show(TaskAttachment $taskAttachment)
    {
        abort_if(Gate::denies('task_attachment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskAttachment->load('task', 'user', 'lead', 'opportunities', 'project', 'bug');

        return view('projectmanagement::admin.taskAttachments.show', compact('taskAttachment'));
    }

    public function destroy(TaskAttachment $taskAttachment)
    {
        abort_if(Gate::denies('task_attachment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskAttachment->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskAttachmentRequest $request)
    {
        TaskAttachment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('task_attachment_create') && Gate::denies('task_attachment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TaskAttachment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
