@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.all') }} {{ trans('cruds.payment.title') }}
                </div>

                <div class="card-body">
                </div>
            </div>

        </div>
        <div class="col-9">
            <div class="card">
                {{--<div class="card-header">--}}
                    {{--{{ trans('cruds.payment.title_singular') }} {{trans('global.details')}} - {{$payment->transaction_id ??  ''}}--}}
                {{--</div>--}}
                <div class="p-3">
                    <a class="btn btn-info" href="{{ route('finance.admin.payment_received.edit',$payment->id) }}">
                        {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
                    </a>
                    <a class="btn btn-success" href="{{ route('finance.admin.payment_received.payment_received_pdf',$payment->id) }}" title="pdf">
                        <i class="fa fa-file-pdf  " aria-hidden="true" ></i>
                    </a>

                </div>
                <div class="card-body">

                    <div class="p-3">
                        <img src="{{asset('images/image001.png')}}" alt="">
                        <div>
                            <p>One Tec Group LLC</p>
                            <p>8TH SECTOR – BUILDING 10 – BLOCK 11 – NASR CITY - CAIRO, EGYPT</p>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        {{ strtoupper(trans('cruds.finance.payment_received')) }}
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 ">

                            <div class="p-2 ">

                                <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.payment_date') }}    :</p> <span class="col-md-6">{{ $payment->payment_date ??  ''  }}</span> </div>
                                <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.transaction') }}     : </p><span class="col-md-6">{{ $payment->transaction_id ?? '' }}</span> </div>
                                <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.client.title_singular') }}          :</p> <span class="col-md-6">{{ $payment->invoice && $payment->invoice->client && $payment->invoice->client->name ? $payment->invoice->client->name :  '' }}</span> </div>
                                <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.payment_method') }}  : </p><span class="col-md-6">{{ $payment->paymentMethod && $payment->paymentMethod->name  ? $payment->paymentMethod->name : '' }}</span> </div>
                                <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.notes') }}           : </p><span class="col-md-6">{{ $payment->notes  ?? '' }}</span> </div>

                            </div>
                        </div>
                        <div class="col-sm-6 ">

                            <div class="p-2 d-flex justify-content-end">
                                <div style="background:#1ba87e; color:#fff; padding:2rem; display:grid; place-items:center">
                                    <div class="">{{trans('cruds.finance.payment_received') .' '. trans('cruds.payment.fields.amount') }}  </div>
                                    <div class="">{{$amounts ?? ''}}</div>
                                </div>

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
                                        {{ $payment->invoice && $payment->invoice->total_amount ? $payment->invoice->total_amount : '' }}
                                    </td>
                                    <td>
                                        {{$amounts ?? ''}}
                                    </td>
                                    @if( $payment->invoice && $payment->invoice->total_amount && $amounts && $payment->invoice->total_amount - $amounts >0)
                                        <td  style="color:#cd0a0a">
                                            {{   $payment->invoice->total_amount - $amounts}}
                                        </td>
                                    @endif


                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

