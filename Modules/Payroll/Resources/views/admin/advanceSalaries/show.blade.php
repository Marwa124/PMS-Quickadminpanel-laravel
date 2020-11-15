@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.advanceSalary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.advance-salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.id') }}
                        </th>
                        <td>
                            {{ $advanceSalary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.user') }}
                        </th>
                        <td>
                            {{ $advanceSalary->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.advance_amount') }}
                        </th>
                        <td>
                            {{ $advanceSalary->advance_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.deduct_month') }}
                        </th>
                        <td>
                            {{ $advanceSalary->deduct_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.reason') }}
                        </th>
                        <td>
                            {!! $advanceSalary->reason !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.request_date') }}
                        </th>
                        <td>
                            {{ $advanceSalary->request_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.status') }}
                        </th>
                        <td>
                            {{ $advanceSalary->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.approve_by') }}
                        </th>
                        <td>
                            {{ $advanceSalary->approve_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.advance-salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
