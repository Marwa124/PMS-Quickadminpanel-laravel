@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.id') }}
                        </th>
                        <td>
                            {{ $employee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.username') }}
                        </th>
                        <td>
                            {{ $employee->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.email') }}
                        </th>
                        <td>
                            {{ $employee->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.role') }}
                        </th>
                        <td>
                            {{ $employee->role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.last_login') }}
                        </th>
                        <td>
                            {{ $employee->last_login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.online_time') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::ONLINE_TIME_RADIO[$employee->online_time] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($employee->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.active_email') }}
                        </th>
                        <td>
                            {{ $employee->active_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_email_type') }}
                        </th>
                        <td>
                            {{ $employee->smtp_email_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_action') }}
                        </th>
                        <td>
                            {{ $employee->smtp_action }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_host_name') }}
                        </th>
                        <td>
                            {{ $employee->smtp_host_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_user_name') }}
                        </th>
                        <td>
                            {{ $employee->smtp_user_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_port') }}
                        </th>
                        <td>
                            {{ $employee->smtp_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.smtp_additional_flag') }}
                        </th>
                        <td>
                            {{ $employee->smtp_additional_flag }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.last_postmaster_run') }}
                        </th>
                        <td>
                            {{ $employee->last_postmaster_run }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.media_path_slug') }}
                        </th>
                        <td>
                            {{ $employee->media_path_slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.marketing_username') }}
                        </th>
                        <td>
                            {{ $employee->marketing_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.marketing_type') }}
                        </th>
                        <td>
                            {{ $employee->marketing_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.vacation_balance') }}
                        </th>
                        <td>
                            {{ $employee->vacation_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.vacation_counterdown') }}
                        </th>
                        <td>
                            {{ $employee->vacation_counterdown }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.date_of_join') }}
                        </th>
                        <td>
                            {{ $employee->date_of_join }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.date_of_insurance') }}
                        </th>
                        <td>
                            {{ $employee->date_of_insurance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.vacation_verified') }}
                        </th>
                        <td>
                            {{ $employee->vacation_verified }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection