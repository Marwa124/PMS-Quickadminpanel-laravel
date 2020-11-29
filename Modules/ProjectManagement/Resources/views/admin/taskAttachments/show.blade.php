@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskAttachment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.task-attachments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.id') }}
                        </th>
                        <td>
                            {{ $taskAttachment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.task') }}
                        </th>
                        <td>
                            {{ $taskAttachment->task->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.user') }}
                        </th>
                        <td>
                            {{ $taskAttachment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.name') }}
                        </th>
                        <td>
                            {{ $taskAttachment->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.description') }}
                        </th>
                        <td>
                            {!! $taskAttachment->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.lead') }}
                        </th>
                        <td>
                            {{ $taskAttachment->lead->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.opportunities') }}
                        </th>
                        <td>
                            {{ $taskAttachment->opportunities->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.project') }}
                        </th>
                        <td>
                            {{ $taskAttachment->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.bug') }}
                        </th>
                        <td>
                            {{ $taskAttachment->bug->issue_no ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                @can('task_attachment_edit')
                    <a class="btn  btn-info" href="{{ route('projectmanagement.admin.task-attachments.edit', $taskAttachment->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.task-attachments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
