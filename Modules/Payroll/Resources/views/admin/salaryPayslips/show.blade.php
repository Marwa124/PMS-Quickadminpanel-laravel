@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryPayslip.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payslips.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryPayslip->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.payslip_number') }}
                        </th>
                        <td>
                            {{ $salaryPayslip->payslip_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.salary_payment') }}
                        </th>
                        <td>
                            {{ $salaryPayslip->salary_payment->payment_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.payslip_generate_date') }}
                        </th>
                        <td>
                            {{ $salaryPayslip->payslip_generate_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payslips.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection