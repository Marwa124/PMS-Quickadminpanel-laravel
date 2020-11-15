@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bug.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bugs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.id') }}
                        </th>
                        <td>
                            {{ $bug->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.issue_no') }}
                        </th>
                        <td>
                            {{ $bug->issue_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.project') }}
                        </th>
                        <td>
                            {{ $bug->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.opportunities') }}
                        </th>
                        <td>
                            {{ $bug->opportunities->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.task') }}
                        </th>
                        <td>
                            {{ $bug->task->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.name') }}
                        </th>
                        <td>
                            {{ $bug->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.description') }}
                        </th>
                        <td>
                            {!! $bug->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.status') }}
                        </th>
                        <td>
                            {{ $bug->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.notes') }}
                        </th>
                        <td>
                            {!! $bug->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.priority') }}
                        </th>
                        <td>
                            {{ $bug->priority }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.severity') }}
                        </th>
                        <td>
                            {{ $bug->severity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.reproducibility') }}
                        </th>
                        <td>
                            {!! $bug->reproducibility !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.reporter') }}
                        </th>
                        <td>
                            {{ $bug->reporter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($bug->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bug.fields.client_visible') }}
                        </th>
                        <td>
                            {{ $bug->client_visible }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bugs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection