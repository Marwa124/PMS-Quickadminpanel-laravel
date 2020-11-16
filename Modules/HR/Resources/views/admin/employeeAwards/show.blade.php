@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employeeAward.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.employee-awards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.id') }}
                        </th>
                        <td>
                            {{ $employeeAward->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.name') }}
                        </th>
                        <td>
                            {{ $employeeAward->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.user') }}
                        </th>
                        <td>
                            {{ $employeeAward->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.gift_item') }}
                        </th>
                        <td>
                            {{ $employeeAward->gift_item }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.award_amount') }}
                        </th>
                        <td>
                            {{ $employeeAward->award_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.view_status') }}
                        </th>
                        <td>
                            {{ App\Models\EmployeeAward::VIEW_STATUS_RADIO[$employeeAward->view_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAward.fields.given_date') }}
                        </th>
                        <td>
                            {{ $employeeAward->given_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.employee-awards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection