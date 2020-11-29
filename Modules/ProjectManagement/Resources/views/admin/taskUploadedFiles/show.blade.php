@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskUploadedFile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.task-uploaded-files.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.id') }}
                        </th>
                        <td>
                            {{ $taskUploadedFile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.files') }}
                        </th>
                        <td>
                            @if($taskUploadedFile->files)
                                <a href="{{ $taskUploadedFile->files->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.uploaded_path') }}
                        </th>
                        <td>
                            {{ $taskUploadedFile->uploaded_path }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.file_name') }}
                        </th>
                        <td>
                            {{ $taskUploadedFile->file_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.is_image') }}
                        </th>
                        <td>
                            {{ Modules\ProjectManagement\Entities\TaskUploadedFile::IS_IMAGE_RADIO[$taskUploadedFile->is_image] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.image_width') }}
                        </th>
                        <td>
                            {{ $taskUploadedFile->image_width }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.image_height') }}
                        </th>
                        <td>
                            {{ $taskUploadedFile->image_height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskUploadedFile.fields.task_attachment') }}
                        </th>
                        <td>
                            {{ $taskUploadedFile->task_attachment->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                @can('task_uploaded_file_edit')
                    <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.task-uploaded-files.edit', $taskUploadedFile->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.task-uploaded-files.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
