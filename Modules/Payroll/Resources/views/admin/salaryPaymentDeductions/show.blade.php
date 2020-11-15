@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryPaymentDeduction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payment-deductions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDeduction.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDeduction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDeduction.fields.salary_payment') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDeduction->salary_payment->payment_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDeduction.fields.name') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDeduction->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDeduction.fields.value') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDeduction->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payment-deductions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection