@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryAllowance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-allowances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryAllowance.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryAllowance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryAllowance.fields.name') }}
                        </th>
                        <td>
                            {{ $salaryAllowance->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryAllowance.fields.value') }}
                        </th>
                        <td>
                            {{ $salaryAllowance->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryAllowance.fields.salary_template') }}
                        </th>
                        <td>
                            {{ $salaryAllowance->salary_template->salary_grade ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-allowances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
