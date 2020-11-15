@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employeeBank.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.id') }}
                        </th>
                        <td>
                            {{ $employeeBank->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.user') }}
                        </th>
                        <td>
                            {{ $employeeBank->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.name') }}
                        </th>
                        <td>
                            {{ $employeeBank->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.branch_name') }}
                        </th>
                        <td>
                            {{ $employeeBank->branch_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.account_name') }}
                        </th>
                        <td>
                            {{ $employeeBank->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.account_number') }}
                        </th>
                        <td>
                            {{ $employeeBank->account_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.routing_number') }}
                        </th>
                        <td>
                            {{ $employeeBank->routing_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeBank.fields.type_of_account') }}
                        </th>
                        <td>
                            {{ $employeeBank->type_of_account }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection