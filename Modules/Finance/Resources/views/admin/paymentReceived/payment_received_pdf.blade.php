@extends('layouts.pdf_layout')
@section('title'){{$title ?? '' }} @endsection
@section('content')
    {{--<div class="card">--}}
       {{----}}
        {{--<div class="card-body">--}}

            {{--<div class="p-3">--}}
                {{--<img src="images/image001.png" alt="">--}}
                {{--<div>--}}
                    {{--<p>One Tec Group LLC</p>--}}
                    {{--<p>8TH SECTOR – BUILDING 10 – BLOCK 11 – NASR CITY - CAIRO, EGYPT</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="align-content-center">
                {{ trans('cruds.finance.payment_received') }}
            </div>

            <div class="">
                <div class="col-sm-12 ">

                    <div class="p-2 ">
                        <table style="width:900px">
                            <tr >
                                <th></th>
                                <th></th>
                            </tr>
                            <tr >
                                <td>{{ trans('cruds.payment.fields.payment_date') }}</td>
                                <td>{{ $payment->payment_date ??  ''  }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('cruds.payment.fields.transaction') }}</td>
                                <td>{{ $payment->transaction_id ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('cruds.client.title_singular') }}</td>
                                <td>{{ $payment->invoice && $payment->invoice->client && $payment->invoice->client->name ? $payment->invoice->client->name :  '' }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('cruds.payment.fields.payment_method') }}</td>
                                <td>{{ $payment->paymentMethod && $payment->paymentMethod->name  ? $payment->paymentMethod->name : '' }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('cruds.payment.fields.notes') }}</td>
                                <td>{{ $payment->notes  ?? '' }}</td>
                            </tr>
                        </table>


                        {{--<div class="row"> <p class="font-bold ">{{ trans('cruds.payment.fields.payment_date') }}    : <span class="">{{ $payment->payment_date ??  ''  }}</span> </p> </div>--}}
                        {{--<div class="row"> <p class="font-bold ">{{ trans('cruds.payment.fields.transaction') }}     : <span class="">{{ $payment->transaction_id ?? '' }}</span> </p> </div>--}}
                        {{--<div class="row"> <p class="font-bold ">{{ trans('cruds.client.title_singular') }}          : <span class="">{{ $payment->invoice && $payment->invoice->client && $payment->invoice->client->name ? $payment->invoice->client->name :  '' }}</span></p>  </div>--}}
                        {{--<div class="row"> <p class="font-bold ">{{ trans('cruds.payment.fields.payment_method') }}  : <span class="">{{ $payment->paymentMethod && $payment->paymentMethod->name  ? $payment->paymentMethod->name : '' }}</span></p> </div>--}}
                        {{--<div class="row"> <p class="font-bold ">{{ trans('cruds.payment.fields.notes') }}           : <span class="">{{ $payment->notes  ?? '' }}</span></p> </div>--}}

                    </div>
                </div>
                <div class="col-sm-6 ">

                    <div class="p-2 ">

                        <div class="row">{{ trans('cruds.payment.fields.amount') }}  </div>
                        <div class="row">{{$amounts ? $amounts.' EGP' :''}}</div>

                    </div>
                </div>
            </div>
            <div class="">
                {{ trans('cruds.payment.title_singular') }}

                <div class="table-responsive">
                    <table class=" table  ">
                        <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.invoice.title_singular') }}
                            </th>
                            <th>
                                {{ trans('cruds.invoice.fields.date') }}
                            </th>

                            <th>
                                {{ trans('cruds.invoice.title_singular') }} {{ trans('cruds.payment.fields.amount') }}
                                {{--{{ trans('cruds.invoice.fields.due_amount') }}--}}
                            </th>
                            <th>
                                {{ trans('cruds.invoice.fields.paid_amount') }}
                            </th>
                            @if( $payment->invoice && $payment->invoice->total_amount && $amounts && $payment->invoice->total_amount - $amounts >0)
                                <th style="color:#cd0a0a" >
                                    {{ trans('cruds.invoice.fields.due_amount') }}
                                </th>
                            @endif


                        </tr>

                        </thead>
                        <tbody>

                        <tr data-entry-id="{{ $payment->invoice->id }}">

                            <td>
                                {{ $payment->invoice && $payment->invoice->reference_no ?  $payment->invoice->reference_no : '' }}
                            </td>
                            <td>
                                {{ $payment->invoice && $payment->invoice->invoice_date ? $payment->invoice->invoice_date : '' }}
                            </td>
                            <td>
                                {{ $payment->invoice && $payment->invoice->total_amount ? $payment->invoice->total_amount.' EGP' : '' }}
                            </td>
                            <td>
                                {{$amounts ? $amounts.' EGP' :''}}
                            </td>
                            @if( $payment->invoice && $payment->invoice->total_amount && $amounts && $payment->invoice->total_amount - $amounts >0)
                                <td  style="color:#cd0a0a">
                                    {{   $payment->invoice->total_amount - $amounts .' EGP'}}
                                </td>
                            @endif


                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
@endsection

