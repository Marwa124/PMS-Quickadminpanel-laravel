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
                <thead>
                <tr>
                    <th colspan="3" style="background-color: #f00; text-align: center">
                        <h3><br>{{ trans('cruds.stock.fields.stock_list') }}</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="3">
                        <h3><br>{{ $cat_name }} > {{$stock_name}}</h3>
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

                </thead>
                <tbody>

                @foreach($stocks as $key => $stock)
                    <tr data-entry-id="{{ $stock->id }}">


                        <td>
                            {{ $stock->name ?? '' }}
                        </td>
                        <td>
                            {{ $stock->total_stock ?? '' }}
                        </td>
                        <td>
                            {{ $stock->buying_date ?? '' }}
                        </td>


                    </tr>
                @endforeach
                <tr>

                    <th>
                        {{ trans('cruds.stock.fields.total_assigned') }}
                    </th>
                    <th>
                        {{ $assigned_stocks->sum('quantity') ?? '' }}
                    </th>
                    <th>
                        {{ trans('cruds.stock.fields.available_stock') }}
                        : {{ $stocks->sum('total_stock') -  $assigned_stocks->sum('quantity')  ?? '' }}
                    </th>


                </tr>

                </tbody>

            </table>


            @if(count($assigned_stocks) > 0)

                <table class=" table table-bordered table-striped table-hover ajaxTable ">
                    <thead>
                    <tr>
                        <th colspan="3" style="background-color: #f00; text-align: center">
                            <h3><br>{{ trans('cruds.stock.fields.assign_stock_list') }}</h3>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <h3><br>{{ $cat_name }} > {{$stock_name}}</h3>
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

                    @foreach($assigned_stocks as $key => $stock)
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
                            {{ trans('cruds.stock.fields.total') }} {{$stock_name}} :
                        </th>
                        <th>
                            {{ $assigned_stocks->sum('quantity') ?? '' }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.available_stock') }}
                            : {{ $stocks->sum('total_stock') -  $assigned_stocks->sum('quantity')  ?? '' }}
                        </th>


                    </tr>

                </table>

            @endif
        </div>
    </div>

@endsection

