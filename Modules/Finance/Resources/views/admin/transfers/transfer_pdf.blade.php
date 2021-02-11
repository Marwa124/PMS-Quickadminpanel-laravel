@extends('layouts.pdf_layout')
@section('title'){{trans('cruds.transfers.transfers_report')}} @endsection
@section('content')


    {{-- Transfers Report --}}

    <p >{{ trans('cruds.transfers.transfers_report') }} {{ trans('global.list') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>

            <tr>
                <th>
                    {{ trans('cruds.transfers.fields.date') }}
                </th>
                <th>
                    {{ trans('cruds.transfers.fields.from_account') }}
                </th>
                <th>
                    {{ trans('cruds.transfers.fields.to_account') }}
                </th>
                <th>
                    {{ trans('cruds.transfers.fields.payment_method') }}
                </th>
                <th>
                    {{ trans('cruds.transfers.fields.amount') }}
                </th>

            </tr>

        </thead>
        <tbody>
            @if($transfers)
                @foreach($transfers as $key => $transfer)
                    <tr data-entry-id="{{ $transfer->id }}">


                        <td>
                            {{ $transfer->date ?? '' }}
                        </td>
                        <td>
                            {{ $transfer->from && $transfer->from->name ?  $transfer->from->name : '' }}
                        </td>
                        <td>
                            {{ $transfer->to && $transfer->to->name ?  $transfer->to->name : '' }}
                        </td>
                        <td>
                            {{ $transfer->payment_method && $transfer->payment_method->name ? $transfer->payment_method->name : '' }}
                        </td>
                        <td>
                            {{ $transfer->amount ? $transfer->amount.'EGP': '' }}
                        </td>


                    </tr>

                @endforeach
            @else
                <tr>
                    <td colspan="5" >

                    </td>
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td COLSPAN="4"><b style="color: #7b0000;">@lang('global.total')</b></td>
                <td style="color: #7b0000;">{{$total_balance ? $total_balance.'EGP': ''}} </td>
            </tr>
        </tfoot>

    </table>


@endsection

