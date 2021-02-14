@extends('layouts.pdf_layout')
@section('title'){{$stock->name ?? '' }} @endsection
@section('content')


    <div class="card">
        <div class="card-body">


            <div class="row">
                <h3>   {{ trans('cruds.stock.fields.report_list') }}</h3>

            </div>
            <hr>
            <table class=" table table-bordered table-striped table-hover ajaxTable ">

                <tr>
                    <th colspan="3" style="background-color: #f00; text-align: center">
                        <h3><br>{{ trans('cruds.stock.fields.stock_list') }}</h3>
                    </th>
                </tr>
                @foreach($sub_stocks as $sub_stock)
                    @foreach($sub_stock->stocks->unique('name') as $stock)
                        <tr>
                            <th colspan="3">
                                <h3><br>{{ $stock->stock_sub_category->name }} > {{$stock->name}}</h3>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stock.fields.item_name') }}
                            </th>

                            <th>
                                {{ trans('cruds.stock.fields.total_stock') }}
                            </th>
                            <th>
                                {{ trans('cruds.stock.fields.buying_date') }}
                            </th>

                        </tr>

                        <tbody>

                        @foreach($stocks->where('stock_sub_category_id',$sub_stock->id)->where('name',$stock->name) as $key => $value)
                            <tr data-entry-id="{{ $value->id }}">


                                <td>
                                    {{ $value->name ?? '' }}
                                </td>
                                <td>
                                    {{ $value->total_stock ?? '' }}
                                </td>
                                <td>
                                    {{ $value->buying_date ?? '' }}
                                </td>


                            </tr>
                        @endforeach
                        <tr>

                            <th>
                                {{ trans('cruds.stock.fields.total_assigned') }}
                            </th>
                            <th>
                                {{ $stock->assigned_stocks->sum('quantity') ?? '' }}
                                {{--{{ $assigned_stocks->sum('quantity') ?? '' }}--}}
                            </th>
                            <th>
                                {{ trans('cruds.stock.fields.available_stock') }}
                                : {{ $stocks->where('stock_sub_category_id',$sub_stock->id)->where('name',$stock->name)->sum('total_stock') -  $stock->assigned_stocks->sum('quantity')   ?? '' }}
                            </th>


                        </tr>

                        </tbody>

                    @endforeach
                @endforeach
            </table>


            @if(count($assigned_stocks) > 0)

                <table class=" table table-bordered table-striped table-hover ajaxTable ">
                    <thead>
                    <tr>
                        <th colspan="3" style="background-color: #f00; text-align: center">
                            <h3><br>{{ trans('cruds.stock.fields.assign_stock_list') }}</h3>
                        </th>
                    </tr>
                    @foreach($assigned_stocks->unique('stock_id') as $assigned_stock)

                        <tr>
                            <th colspan="3">
                                <h3><br>{{ $assigned_stock->stock->stock_sub_category->name ?? ' ' }} > {{$assigned_stock->stock->name ?? ''}}</h3>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assign_stocks.fields.item_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.assign_stocks.fields.assign_date') }}
                            </th>

                            <th>
                                {{ trans('cruds.assign_stocks.fields.assign_quantity') }}
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($assigned_stocks->whereIn('stock_id',$assigned_stock->stock_ids()) as $key => $stock)
                        <tr data-entry-id="{{ $stock->id }}">

                            <td>
                                {{ $stock->user->accountDetail->fullname ?? '' }}
                            </td>
                            <td>
                                {{ $stock->assign_date ?? '' }}
                            </td>
                            <td>
                                {{ $stock->quantity ?? '' }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tr>

                        <th>
                            {{ trans('cruds.stock.fields.total') }} {{$assigned_stock->stock->name ?? ''}} :
                        </th>
                        <th>
                            {{ $assigned_stocks->whereIn('stock_id',$assigned_stock->stock_ids())->sum('quantity') ?? '' }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.available_stock') }}
                            : {{ $stocks->where('name',$assigned_stock->stock->name)->where('stock_sub_category_id',$assigned_stock->stock->stock_sub_category_id)->sum('total_stock') -  $assigned_stocks->whereIn('stock_id',$assigned_stock->stock_ids())->sum('quantity')  ?? '' }}
                        </th>

                    </tr>

                    @endforeach

                </table>

            @endif

        </div>
    </div>

@endsection

