@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dashboardSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dashboard-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.name') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.col') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->col }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.order_no') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->order_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.status') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.report') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->report }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.for_staff') }}
                        </th>
                        <td>
                            {{ $dashboardSetting->for_staff }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dashboard-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection