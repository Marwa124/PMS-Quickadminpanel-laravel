@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryPayment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryPayment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.user') }}
                        </th>
                        <td>
                            {{ $salaryPayment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.payment_amount') }}
                        </th>
                        <td>
                            {{ $salaryPayment->payment_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.fine_deductio') }}
                        </th>
                        <td>
                            {{ $salaryPayment->fine_deductio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.payment_type') }}
                        </th>
                        <td>
                            {{ $salaryPayment->payment_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.comments') }}
                        </th>
                        <td>
                            {!! $salaryPayment->comments !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.paid_date') }}
                        </th>
                        <td>
                            {{ $salaryPayment->paid_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.deduct_from') }}
                        </th>
                        <td>
                            {{ $salaryPayment->deduct_from }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.salary-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection