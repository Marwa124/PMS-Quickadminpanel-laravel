@extends('layouts.pdf_layout')
@section('title'){{trans('cruds.finance.balance_sheet')}} @endsection
@section('content')


    {{-- balance sheet Report --}}

    <p >{{ trans('cruds.finance.balance_sheet') }} {{ trans('global.list') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>

            <tr>
                <th>
                    {{ trans('cruds.account.title') }}
                </th>
                <th>
                    {{ trans('cruds.account.fields.balance') }}
                </th>

            </tr>
        </thead>
        <tbody>
            @if($bank_accounts)
                @foreach($bank_accounts as $key => $account)
                    <tr data-entry-id="{{ $account->id }}">

                        <td>
                            {{ $account->name ?? '' }}
                        </td>
                        <td>
                            {{ $account->balance ?? '' }} EGP
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
            <tr style="color: #7b0000;">
                <td COLSPAN="1"><b style="color: #7b0000;">@lang('global.total')</b></td>
                <td style="color: #7b0000;">{{$total_balance ? $total_balance.'EGP': ''}} </td>
            </tr>
        </tfoot>

    </table>


@endsection

