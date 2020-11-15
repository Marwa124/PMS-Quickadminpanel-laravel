@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryPaymentDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payment-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.salary_payment') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDetail->salary_payment->payment_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.name') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDetail->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.value') }}
                        </th>
                        <td>
                            {{ $salaryPaymentDetail->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payment-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection