@extends('layouts.pdf_layout')
@section('content')

    <div style="width: 100%; border-bottom: 2px solid black;">
        <table style="width: 100%; vertical-align: middle;">
            <tr>
                <td style="width: 50px; border: 0px;">

                </td>
                <td style="border: 0px;">
                    <p style="margin-left:150px;margin-top: 13px; font-size:16px;font-weight:bold;color:red;position:relative;top:30px;">Transactions</p>
                </td>
            </tr>
        </table>
    </div>
    <br/>



            <table style="width: 100%; font-size: 40px;margin-top: 20px" border="1">
                <tr >
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.date') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.account') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.type') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.name') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.amount') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.credit') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.debit') }}

                    </th>
                    <th style="width: 30%;text-align: center; padding:3px">

                            {{ trans('cruds.transaction.fields.total_balance') }}

                    </th>


                </tr>
                @foreach($transactions as $key => $transaction)
                    <tr>
                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->date ?? '' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->account->name ?? '' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{trans('cruds.transaction.fields.'. $transaction->type)  ?? '' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->name ?? '' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->amount != null  ? $transaction->amount. ' EGP' :  '0.0 EGP' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->credit != null  ? $transaction->credit. ' EGP' :  '0.0 EGP' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->debit != null  ? $transaction->debit. ' EGP' :  '0.0 EGP' }}
                        </td>

                        <td style="width: 30%;text-align: center; padding:3px">
                            {{ $transaction->total_balance != null  ? $transaction->total_balance. ' EGP' :  '0.0 EGP' }}
                        </td>
                    </tr>

                @endforeach

            </table>

@endsection

