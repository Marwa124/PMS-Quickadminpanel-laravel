@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.id') }}
                        </th>
                        <td>
                            {{ $purchase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.supplier') }}
                        </th>
                        <td>
                            {{ $purchase->supplier->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $purchase->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.total') }}
                        </th>
                        <td>
                            {{ $purchase->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.update_stock') }}
                        </th>
                        <td>
                            {{ App\Models\Purchase::UPDATE_STOCK_RADIO[$purchase->update_stock] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.status') }}
                        </th>
                        <td>
                            {{ $purchase->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.emailed') }}
                        </th>
                        <td>
                            {{ App\Models\Purchase::EMAILED_RADIO[$purchase->emailed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.date_sent') }}
                        </th>
                        <td>
                            {{ $purchase->date_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.created_by') }}
                        </th>
                        <td>
                            {{ $purchase->created_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.user') }}
                        </th>
                        <td>
                            {{ $purchase->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.purchase_date') }}
                        </th>
                        <td>
                            {{ $purchase->purchase_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.due_date') }}
                        </th>
                        <td>
                            {{ $purchase->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.discount_type') }}
                        </th>
                        <td>
                            {{ App\Models\Purchase::DISCOUNT_TYPE_SELECT[$purchase->discount_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.discount_percent') }}
                        </th>
                        <td>
                            {{ $purchase->discount_percent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.adjustment') }}
                        </th>
                        <td>
                            {{ $purchase->adjustment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.discount_total') }}
                        </th>
                        <td>
                            {{ $purchase->discount_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.show_quantity_as') }}
                        </th>
                        <td>
                            {{ $purchase->show_quantity_as }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.permission') }}
                        </th>
                        <td>
                            @foreach($purchase->permissions as $key => $permission)
                                <span class="label label-info">{{ $permission->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.total_tax') }}
                        </th>
                        <td>
                            {{ $purchase->total_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.tax') }}
                        </th>
                        <td>
                            {{ $purchase->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.notes') }}
                        </th>
                        <td>
                            {!! $purchase->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection