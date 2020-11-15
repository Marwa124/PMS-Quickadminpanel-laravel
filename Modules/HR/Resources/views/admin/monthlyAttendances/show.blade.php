@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.monthlyAttendance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.monthly-attendances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.id') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.user') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.total_attendance_days') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->total_attendance_days }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.total_hours') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->total_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.total_absence') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->total_absence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.total_vacation') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->total_vacation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.holidays') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->holidays }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.created_month') }}
                        </th>
                        <td>
                            {{ $monthlyAttendance->created_month }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.monthly-attendances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection