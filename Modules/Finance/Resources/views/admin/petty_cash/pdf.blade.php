@extends('layouts.pdf_layout')
@section('title'){{$stock->name ?? '' }} @endsection
@section('content')
    <table style="width: 100%; vertical-align: middle;">
        <tr>
            <td style="width: 50px; border: 0px;">

            </td>
            <td style="border: 0px;">
                <p style="margin-left:150px;margin-top: 13px; font-size:16px;font-weight:bold;color:red;position:relative;top:30px;">PETTY CASH REQUEST</p>
            </td>
        </tr>
    </table>
    <div style="width: 100%; border-bottom: 2px solid red;position:relative;top:20px;" >

    </div>
    <br/>


    <div class="" style="width:100%">





        <p style="font-size:14px;font-weight:700px !important;position:relative;top:20px;">Requested By: </p>

        <p style="font-size:14px;font-weight:700px !important;position:relative;top:-10px;left:140px;">{{$pettycash->added_by->accountDetail->fullname ?? ''}}</p>
        <p style="font-size:14px;font-weight:700px !important;position:relative;top:-35px;left:140px;">......................................................</p>


        <p style=" font-size:14px;font-weight:bold;left:300px;"></p>


        <p style=" font-size:14px;font-weight:bold;position:relative;left:375px;top:-125px">Date:</p>

        <p style="font-size:14px;font-weight:700px !important;position:relative;top:-160px;left:530px;">{{$pettycash->date?? ''}}</p>
        <p style="font-size:14px;font-weight:700px !important;position:relative;top:-182px;left:500px;">..............................................................</p>


        <p style="font-size:14px;font-weight:bold;position:relative;top:-180px">Amount Requested:</p>

        <p style="font-size:14px;font-weight:700px !important;position:relative;top:-215px;left:200px;">{{$pettycash->amount?? ''}}</p>
        <p style="font-size:14px;font-weight:700px !important;position:relative;top:-240px;left:140px;">......................................................</p>




        <p style="font-size:14px;font-weight:bold;position:relative;top:-290px;">Description of Need: </p>


        <p style="font-size:14px;position:relative;top:-320px;left:140px">{!! $pettycash->description !!}</p>
        <!-- <p style="font-size:14px;position:relative;top:-345px;left:140px">.......................................................................................................................................................................................................................................</p> -->


        <div class="" style="position:relative;top:-290px">


            <div style="width: 120%; border-bottom: 2px solid black" ></div>



            <p style="text-decoration:underline;">Note:</p>
            <p>* Original invoices have to be attached.</p>
            <p>* In case of permanent petty cash, reimbursement should be before the 29th of each month.</p>
            <p>* The attached invoices should not be for different periods than submission period.</p>
            <p>* Petty cash should be kept in the office safe till needed.</p>
            <p>* If petty cash holder is going on leave, proper handover for petty cash & invoices to be done.</p>


            <div style="width: 120%; border-bottom: 2px solid black" ></div>
        </div>




        <p style="font-size:14px;font-weight:bold;position:relative;top:-220px;"> Received By: {{$pettycash->approve_by->accountDetail->fullname ?? ''}}</p>
        <!-- <p style="font-size:14px;font-weight:700px !important;position:relative;top:-255px;left:140px;">......................................................</p> -->


        <p style=" font-size:14px;font-weight:bold;position:relative;left:375px;top:-286px">Signatutre:</p>

        <!-- <p style="font-size:14px;font-weight:700px !important;position:relative;top:-315px;left:500px;">....................................................................</p> -->

        <p style="font-size:14px;font-weight:bold;position:relative;top:-315px;">Approved By: {{$pettycash->approve_by->accountDetail->fullname ?? ''}} </p>
        <!-- <p style="font-size:14px;font-weight:700px !important;position:relative;top:-345px;left:140px;">......................................................</p> -->


        <p style=" font-size:14px;font-weight:bold;position:relative;left:375px;top:-312px">Signatutre:</p>

        <!-- <p style="font-size:14px;font-weight:700px !important;position:relative;top:-345px;left:140px;">......................................................</p> -->

        <div style="width: 120%; border-bottom: 2px solid red;position:relative;top:-300px;" ></div>

    </div>




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


@endsection

