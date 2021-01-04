@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.training.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.id') }}
                        </th>
                        <td>
                            {{ $training->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.user') }}
                        </th>
                        <td>
                            {{ $training->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.assigned_by') }}
                        </th>
                        <td>
                            {{ App\Models\Training::ASSIGNED_BY_SELECT[$training->assigned_by] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.training_name') }}
                        </th>
                        <td>
                            {{ $training->training_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.vendor_name') }}
                        </th>
                        <td>
                            {{ $training->vendor_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.start_date') }}
                        </th>
                        <td>
                            {{ $training->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.finish_date') }}
                        </th>
                        <td>
                            {{ $training->finish_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.training_cost') }}
                        </th>
                        <td>
                            {{ $training->training_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Training::STATUS_SELECT[$training->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.performance') }}
                        </th>
                        <td>
                            {{ App\Models\Training::Performance_SELECT[$training->performance] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.remarks') }}
                        </th>
                        <td>
                            {{ $training->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.uploaded_file') }}
                        </th>
                        <td>
                            @if($training->uploaded_file)
                                <a href="{{ $training->uploaded_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.permission') }}
                        </th>
                        <td>
                            @foreach($training->permissions as $key => $permission)
                                <span class="label label-info">{{ $permission->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection