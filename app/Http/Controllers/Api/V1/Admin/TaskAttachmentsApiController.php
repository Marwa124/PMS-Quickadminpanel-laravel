<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTaskAttachmentRequest;
use App\Http\Requests\UpdateTaskAttachmentRequest;
use App\Http\Resources\Admin\TaskAttachmentResource;
use App\Models\TaskAttachment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskAttachmentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('task_attachment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskAttachmentResource(TaskAttachment::with(['task', 'user', 'lead', 'opportunities', 'project', 'bug'])->get());
    }

    public function store(StoreTaskAttachmentRequest $request)
    {
        $taskAttachment = TaskAttachment::create($request->all());

        return (new TaskAttachmentResource($taskAttachment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TaskAttachment $taskAttachment)
    {
        abort_if(Gate::denies('task_attachment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskAttachmentResource($taskAttachment->load(['task', 'user', 'lead', 'opportunities', 'project', 'bug']));
    }

    public function update(UpdateTaskAttachmentRequest $request, TaskAttachment $taskAttachment)
    {
        $taskAttachment->update($request->all());

        return (new TaskAttachmentResource($taskAttachment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TaskAttachment $taskAttachment)
    {
        abort_if(Gate::denies('task_attachment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskAttachment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
