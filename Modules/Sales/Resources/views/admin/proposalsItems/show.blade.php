@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proposalsItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.proposals-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.id') }}
                        </th>
                        <td>
                            {{ $proposalsItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.proposals') }}
                        </th>
                        <td>
                            {{ $proposalsItem->proposals->reference_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.name') }}
                        </th>
                        <td>
                            {{ $proposalsItem->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.description') }}
                        </th>
                        <td>
                            {!! $proposalsItem->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.group_name') }}
                        </th>
                        <td>
                            {{ $proposalsItem->group_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.brand') }}
                        </th>
                        <td>
                            {{ $proposalsItem->brand }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.delivery') }}
                        </th>
                        <td>
                            {{ $proposalsItem->delivery }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.part') }}
                        </th>
                        <td>
                            {{ $proposalsItem->part }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.quantity') }}
                        </th>
                        <td>
                            {{ $proposalsItem->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.unit_cost') }}
                        </th>
                        <td>
                            {{ $proposalsItem->unit_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.margin') }}
                        </th>
                        <td>
                            {{ $proposalsItem->margin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.selling_price') }}
                        </th>
                        <td>
                            {{ $proposalsItem->selling_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.total_cost_price') }}
                        </th>
                        <td>
                            {{ $proposalsItem->total_cost_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.tax_rate') }}
                        </th>
                        <td>
                            {{ $proposalsItem->tax_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.tax_name') }}
                        </th>
                        <td>
                            {{ $proposalsItem->tax_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.tax_total') }}
                        </th>
                        <td>
                            {{ $proposalsItem->tax_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.tax_cost') }}
                        </th>
                        <td>
                            {{ $proposalsItem->tax_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.order') }}
                        </th>
                        <td>
                            {{ $proposalsItem->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.unit') }}
                        </th>
                        <td>
                            {{ $proposalsItem->unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.hsn_code') }}
                        </th>
                        <td>
                            {{ $proposalsItem->hsn_code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.proposals-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection