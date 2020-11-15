@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.username') }}
                        </th>
                        <td>
                            {{ $user->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.activated') }}
                        </th>
                        <td>
                            {{ App\Models\User::ACTIVATED_RADIO[$user->activated] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.banned') }}
                        </th>
                        <td>
                            {{ App\Models\User::BANNED_RADIO[$user->banned] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.ban_reason') }}
                        </th>
                        <td>
                            {!! $user->ban_reason !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_ip') }}
                        </th>
                        <td>
                            {{ $user->last_ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_login') }}
                        </th>
                        <td>
                            {{ $user->last_login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.online_time') }}
                        </th>
                        <td>
                            {{ App\Models\User::ONLINE_TIME_RADIO[$user->online_time] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($user->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.smtp_email_type') }}
                        </th>
                        <td>
                            {{ $user->smtp_email_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.smtp_action') }}
                        </th>
                        <td>
                            {{ $user->smtp_action }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.smtp_host_name') }}
                        </th>
                        <td>
                            {{ $user->smtp_host_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.smtp_user_name') }}
                        </th>
                        <td>
                            {{ $user->smtp_user_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.smtp_port') }}
                        </th>
                        <td>
                            {{ $user->smtp_port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.smtp_additional_flag') }}
                        </th>
                        <td>
                            {{ $user->smtp_additional_flag }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_postmaster_run') }}
                        </th>
                        <td>
                            {{ $user->last_postmaster_run }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.media_path_slug') }}
                        </th>
                        <td>
                            {{ $user->media_path_slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.marketing_username') }}
                        </th>
                        <td>
                            {{ $user->marketing_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.marketing_type') }}
                        </th>
                        <td>
                            {{ $user->marketing_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sp_username') }}
                        </th>
                        <td>
                            {{ $user->sp_username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.vacation_balance') }}
                        </th>
                        <td>
                            {{ $user->vacation_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.vacation_counterdown') }}
                        </th>
                        <td>
                            {{ $user->vacation_counterdown }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.date_of_join') }}
                        </th>
                        <td>
                            {{ $user->date_of_join }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.date_of_insurance') }}
                        </th>
                        <td>
                            {{ $user->date_of_insurance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.vacation_verified') }}
                        </th>
                        <td>
                            {{ $user->vacation_verified }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#department_head_departments" role="tab" data-toggle="tab">
                {{ trans('cruds.department.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_account_details" role="tab" data-toggle="tab">
                {{ trans('cruds.accountDetail.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_trainings" role="tab" data-toggle="tab">
                {{ trans('cruds.training.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_employee_awards" role="tab" data-toggle="tab">
                {{ trans('cruds.employeeAward.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="department_head_departments">
            @includeIf('admin.users.relationships.departmentHeadDepartments', ['departments' => $user->departmentHeadDepartments])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_account_details">
            @includeIf('admin.users.relationships.userAccountDetails', ['accountDetails' => $user->userAccountDetails])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_trainings">
            @includeIf('admin.users.relationships.userTrainings', ['trainings' => $user->userTrainings])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_employee_awards">
            @includeIf('admin.users.relationships.userEmployeeAwards', ['employeeAwards' => $user->userEmployeeAwards])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection