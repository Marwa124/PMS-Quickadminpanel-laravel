@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.returnStock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.return-stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.id') }}
                        </th>
                        <td>
                            {{ $returnStock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.supplier') }}
                        </th>
                        <td>
                            {{ $returnStock->supplier->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $returnStock->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.total') }}
                        </th>
                        <td>
                            {{ $returnStock->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.update_stock') }}
                        </th>
                        <td>
                            {{ App\Models\ReturnStock::UPDATE_STOCK_RADIO[$returnStock->update_stock] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.status') }}
                        </th>
                        <td>
                            {{ $returnStock->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.emailed') }}
                        </th>
                        <td>
                            {{ App\Models\ReturnStock::EMAILED_RADIO[$returnStock->emailed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.date_sent') }}
                        </th>
                        <td>
                            {{ $returnStock->date_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.created_by') }}
                        </th>
                        <td>
                            {{ $returnStock->created_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.user') }}
                        </th>
                        <td>
                            {{ $returnStock->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.return_stock_date') }}
                        </th>
                        <td>
                            {{ $returnStock->return_stock_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.due_date') }}
                        </th>
                        <td>
                            {{ $returnStock->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.discount_type') }}
                        </th>
                        <td>
                            {{ App\Models\ReturnStock::DISCOUNT_TYPE_RADIO[$returnStock->discount_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.discount_percent') }}
                        </th>
                        <td>
                            {{ $returnStock->discount_percent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.adjustment') }}
                        </th>
                        <td>
                            {{ $returnStock->adjustment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.discount_total') }}
                        </th>
                        <td>
                            {{ $returnStock->discount_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.show_quantity_as') }}
                        </th>
                        <td>
                            {{ $returnStock->show_quantity_as }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($returnStock->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.total_tax') }}
                        </th>
                        <td>
                            {{ $returnStock->total_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.tax') }}
                        </th>
                        <td>
                            {{ $returnStock->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.returnStock.fields.notes') }}
                        </th>
                        <td>
                            {!! $returnStock->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.return-stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection