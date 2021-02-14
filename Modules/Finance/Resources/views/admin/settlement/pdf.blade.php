@extends('layouts.pdf_layout')
@section('title'){{$stock->name ?? '' }} @endsection
@section('content')

    <table style="width: 100%; vertical-align: middle;position:relative;top:-30px">
        <tr>
            <td style="width: 50px; border: 0px;">

            </td>
            <td style="border: 0px;">
                <p style="margin-left:300px;margin-top: 13px; font-size:20px;font-weight:bold;color:black;position:relative;">
                    PETTY CASH SETTLEMENT</p>
            </td>
        </tr>
    </table>
    <div style="width: 100%; border-bottom: 2px solid red;position:relative;top:-20px;">

    </div>


    <p style="font-size:16px;font-weight:bold;position:relative"> Petty Cash
        Holder: {{$pettycash->added_by->accountDetail->fullname ?? ''}}</p>

    <p style=" font-size:16px;font-weight:bold;position:relative;left:800px;top:-35px;">Petty Cash
        Amount: {{$pettycash->amount ?? ''}}</p>


    <p style="font-size:16px;font-weight:bold;position:relative;top:-38px;">Submission
        Date: {{$pettycash->date ?? ''}} </p>


    <div style="width: 120%; border-bottom: 2px solid red;position:relative;top:-300px;"></div>

    </div>
    <br/>


    <div class="" style="width:100%">


        <table
            style="width: 100%; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;;position:relative;top:-55px;">
            <thead>
            <tr>

                <th>
                    {{ trans('cruds.settlement.fields.date') }}
                </th>
                <th>
                    {{ trans('cruds.settlement.fields.invoice_number') }}
                </th>
                <th>
                    {{ trans('cruds.settlement.fields.amount') }}
                </th>
                <th>
                    {{ trans('cruds.settlement.fields.description') }}
                </th>
                <th>
                    {{ trans('cruds.settlement.fields.project') }}
                </th>
                <th>
                    {{ trans('cruds.settlement.fields.settlement_type') }}
                </th>


            </tr>

            </thead>

            <tbody>

            @foreach ($settlements as $settlement)
                <tr>

                    <td>{{$settlement->date}}</td>
                    <td>{{$settlement->invoice_number}}</td>
                    <td>{{$settlement->amount}}</td>
                    <td>{!! $settlement->description !!}</td>
                    <td>{{$settlement->project->{'name_'.app()->getLocale()} ?? ''}}</td>
                    <td>{{$settlement->settlement_type}}</td>

                </tr>

            @endforeach


            </tbody>


        </table>



        <div class="" style="position:relative;top:-40">


            <!-- <div style="width: 120%; border-bottom: 2px solid black" ></div> -->


            <p style="text-decoration:underline;color:red;margin-top:3px">Note:</p>
            <p style="font-size:14px;margin-bottom:0px;">* EXP.Type: (ST) Stationary - (TR) Transportation - (E&W)
                Electricity & Water - (TEL) Telephone & Internet - (IT) IT supplies - (F&B) <br/>
                office Pantry - (M&C) Maintenance & Cleaning... Please Add new Category if needed.</p>

            <p style="font-size:14px;margin-bottom:0px;">* Original invoices have to be attached.</p>
            <p style="font-size:14px;margin-bottom:0px;">* In case of permanent petty cash, reimbursement should be
                before the 29th of each month.</p>
            <p style="font-size:14px;margin-bottom:0px;">* The attached invoices should not be for different periods
                than submission period.</p>
            <p style="font-size:14px;margin-bottom:0px;">* Petty cash should be kept in the office safe till needed.</p>
            <p style="font-size:14px;margin-bottom:0px;">* If petty cash holder is going on leave, proper handover for
                petty cash & invoices to be done.</p>


            <!-- <div style="width: 120%; border-bottom: 2px solid black" ></div> -->
        </div>

        <div class="" style="position:relative;">


            <p style="font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;top:20px;"> Approved
                By: {{$pettycash->approve_by->accountDetail->fullname ?? ''}} </p>


            <p style=" font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;left:600px;">Signatutre:</p>


            <p style="font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;top:20px;">Prepared
                By: {{$pettycash->approve_by->accountDetail->fullname ?? ''}} </p>


            <p style=" font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;left:600px;">Signatutre:</p>


        </div>


        <div class="" style="position:relative;top:150">


            <!-- <div style="width: 120%; border-bottom: 2px solid black" ></div> -->


            <p style="text-decoration:underline;color:red;margin-top:3px">Note:</p>
            <p style="font-size:14px;margin-bottom:0px;">* EXP.Type: (ST) Stationary - (TR) Transportation - (E&W)
                Electricity & Water - (TEL) Telephone & Internet - (IT) IT supplies - (F&B) <br/>
                office Pantry - (M&C) Maintenance & Cleaning... Please Add new Category if needed.</p>

            <p style="font-size:14px;margin-bottom:0px;">* Original invoices have to be attached.</p>
            <p style="font-size:14px;margin-bottom:0px;">* In case of permanent petty cash, reimbursement should be
                before the 29th of each month.</p>
            <p style="font-size:14px;margin-bottom:0px;">* The attached invoices should not be for different periods
                than submission period.</p>
            <p style="font-size:14px;margin-bottom:0px;">* Petty cash should be kept in the office safe till needed.</p>
            <p style="font-size:14px;margin-bottom:0px;">* If petty cash holder is going on leave, proper handover for
                petty cash & invoices to be done.</p>


            <!-- <div style="width: 120%; border-bottom: 2px solid black" ></div> -->
        </div>


        <div class="" style="position:relative;top:250px;">


            <p style="font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;top:20px;"> Approved
                By: {{$pettycash->approve_by->accountDetail->fullname ?? ''}} </p>


            <p style=" font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;left:600px;">Signatutre:</p>


            <p style="font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;top:20px;">Prepared
                By:  {{$pettycash->approve_by->accountDetail->fullname ?? ''}} </p>


            <p style=" font-size:16px;font-weight:bold;margin-bottom:0px;position:relative;left:600px;">Signatutre:</p>


        </div>

    </div>




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


@endsection

