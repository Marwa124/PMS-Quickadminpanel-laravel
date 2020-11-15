@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryDeduction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-deductions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryDeduction.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryDeduction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryDeduction.fields.salary_template') }}
                        </th>
                        <td>
                            {{ $salaryDeduction->salary_template->salary_grade ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryDeduction.fields.name') }}
                        </th>
                        <td>
                            {{ $salaryDeduction->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryDeduction.fields.value') }}
                        </th>
                        <td>
                            {{ $salaryDeduction->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-deductions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection