<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyTaskUploadedFileRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskUploadedFileRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTaskUploadedFileRequest;
use Modules\ProjectManagement\Entities\TaskAttachment;
use Modules\ProjectManagement\Entities\TaskUploadedFile;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TaskUploadedFilesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('task_uploaded_file_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskUploadedFiles = TaskUploadedFile::all();

        return view('projectmanagement::admin.taskUploadedFiles.index', compact('taskUploadedFiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_uploaded_file_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task_attachments = TaskAttachment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('projectmanagement::admin.taskUploadedFiles.create', compact('task_attachments'));
    }

    public function store(StoreTaskUploadedFileRequest $request)
    {
        $taskUploadedFile = TaskUploadedFile::create($request->all());

        if ($request->input('files', false)) {
            $taskUploadedFile->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $taskUploadedFile->id]);
        }

        return redirect()->route('projectmanagement::admin.task-uploaded-files.index');
    }

    public function edit(TaskUploadedFile $taskUploadedFile)
    {
        abort_if(Gate::denies('task_uploaded_file_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task_attachments = TaskAttachment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $taskUploadedFile->load('task_attachment');

        return view('projectmanagement::admin.taskUploadedFiles.edit', compact('task_attachments', 'taskUploadedFile'));
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

        return redirect()->route('projectmanagement::admin.task-uploaded-files.index');
    }

    public function show(TaskUploadedFile $taskUploadedFile)
    {
        abort_if(Gate::denies('task_uploaded_file_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskUploadedFile->load('task_attachment');

        return view('projectmanagement::admin.taskUploadedFiles.show', compact('taskUploadedFile'));
    }

    public function destroy(TaskUploadedFile $taskUploadedFile)
    {
        abort_if(Gate::denies('task_uploaded_file_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskUploadedFile->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskUploadedFileRequest $request)
    {
        TaskUploadedFile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('task_uploaded_file_create') && Gate::denies('task_uploaded_file_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TaskUploadedFile();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
