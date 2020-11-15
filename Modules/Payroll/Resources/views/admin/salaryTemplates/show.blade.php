@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryTemplate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryTemplate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.salary_grade') }}
                        </th>
                        <td>
                            {{ $salaryTemplate->salary_grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.basic_salary') }}
                        </th>
                        <td>
                            {{ $salaryTemplate->basic_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.overtime_salary') }}
                        </th>
                        <td>
                            {{ $salaryTemplate->overtime_salary }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection