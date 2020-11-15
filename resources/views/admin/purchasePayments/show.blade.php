@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchasePayment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.id') }}
                        </th>
                        <td>
                            {{ $purchasePayment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.purchase') }}
                        </th>
                        <td>
                            {{ $purchasePayment->purchase->reference_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $purchasePayment->payment_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.amount') }}
                        </th>
                        <td>
                            {{ $purchasePayment->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.currency') }}
                        </th>
                        <td>
                            {{ $purchasePayment->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.notes') }}
                        </th>
                        <td>
                            {!! $purchasePayment->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.payment_date') }}
                        </th>
                        <td>
                            {{ $purchasePayment->payment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.paid_to') }}
                        </th>
                        <td>
                            {{ $purchasePayment->paid_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.paid_by') }}
                        </th>
                        <td>
                            {{ $purchasePayment->paid_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.account') }}
                        </th>
                        <td>
                            {{ $purchasePayment->account->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasePayment.fields.transaction') }}
                        </th>
                        <td>
                            {{ $purchasePayment->transaction->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection