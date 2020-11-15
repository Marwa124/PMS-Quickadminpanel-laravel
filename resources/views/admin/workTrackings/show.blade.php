@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workTracking.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.work-trackings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.id') }}
                        </th>
                        <td>
                            {{ $workTracking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.work_type') }}
                        </th>
                        <td>
                            {{ $workTracking->work_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.achievement') }}
                        </th>
                        <td>
                            {{ $workTracking->achievement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.start_date') }}
                        </th>
                        <td>
                            {{ $workTracking->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.end_date') }}
                        </th>
                        <td>
                            {{ $workTracking->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.description') }}
                        </th>
                        <td>
                            {{ $workTracking->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.notify_work_achive') }}
                        </th>
                        <td>
                            {{ $workTracking->notify_work_achive }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.notify_work_not_achive') }}
                        </th>
                        <td>
                            {{ $workTracking->notify_work_not_achive }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($workTracking->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.email_send') }}
                        </th>
                        <td>
                            {{ $workTracking->email_send }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.account') }}
                        </th>
                        <td>
                            {{ $workTracking->account->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.work-trackings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection