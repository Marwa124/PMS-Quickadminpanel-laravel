@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryPaymentAllowance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payment-allowances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryPaymentAllowance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.salary_payment') }}
                        </th>
                        <td>
                            {{ $salaryPaymentAllowance->salary_payment->payment_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.name') }}
                        </th>
                        <td>
                            {{ $salaryPaymentAllowance->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.value') }}
                        </th>
                        <td>
                            {{ $salaryPaymentAllowance->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payment-allowances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection