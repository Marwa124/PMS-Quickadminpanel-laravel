<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTaskUploadedFileRequest;
use App\Http\Requests\UpdateTaskUploadedFileRequest;
use App\Http\Resources\Admin\TaskUploadedFileResource;
use App\Models\TaskUploadedFile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskUploadedFilesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('task_uploaded_file_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskUploadedFileResource(TaskUploadedFile::with(['task_attachment'])->get());
    }

    public function store(StoreTaskUploadedFileRequest $request)
    {
        $taskUploadedFile = TaskUploadedFile::create($request->all());

        if ($request->input('files', false)) {
            $taskUploadedFile->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new TaskUploadedFileResource($taskUploadedFile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TaskUploadedFile $taskUploadedFile)
    {
        abort_if(Gate::denies('task_uploaded_file_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskUploadedFileResource($taskUploadedFile->load(['task_attachment']));
    }

    public function update(UpdateTaskUploadedFileRequest $request, TaskUploadedFile $taskUploadedFile)
    {
        $taskUploadedFile->update($request->all());

        if ($request->input('files', false)) {
            if (!$taskUploadedFile->files || $request->input('files') !== $taskUploadedFile->files->file_name) {
                if ($taskUploadedFile->files) {
                    $taskUploadedFile->files->delete();
                }

                $taskUploadedFile->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }
        } elseif ($taskUploadedFile->files) {
            $taskUploadedFile->files->delete();
        }

        return (new TaskUploadedFileResource($taskUploadedFile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TaskUploadedFile $taskUploadedFile)
    {
        abort_if(Gate::denies('task_uploaded_file_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskUploadedFile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
