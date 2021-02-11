@extends('layouts.pdf_layout')
@section('title'){{$invoice->reference_no ?? '' }} @endsection
@section('propsal')
<td width="50%" class="pull-right" align="left">
    <div class="row mb-4">
        <div class="col-sm-4">
            <h6 class="mb-3"></h6>

        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h6 class="mb-3"> Reference No:</h6>
            <div><strong>#{{$invoice->reference_no ?? '' }}</strong></div>
            <div>{{ trans('cruds.proposal.fields.subject') }} : {{ $invoice->subject }}</div>
            <div>{{ trans('cruds.proposal.fields.proposal_date') }} : {{ $invoice->proposal_date }}</div>
            <div>{{ trans('cruds.proposal.fields.expire_date') }} : {{ $invoice->expire_date }}</div>
            <div>{{ trans('cruds.proposal.fields.Sales_Agent') }}: {{ $invoice->user && $invoice->user->accountDetail ? $invoice->user->accountDetail->fullname :'' }}</div>
            <div>
                {{ trans('cruds.proposal.fields.status') }}: <span class="btn btn-sm btn-primary">  {{ $invoice->status }} </span>
            </div>
        </div>
    </div>
</td>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row mb-4">
                <div class="col-sm-4">
                    <div>
                        <strong> {{ trans('cruds.proposal.fields.OTG_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyname') }} : One Tec Group LLC</div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr
                        City - Cairo, Egypt</div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}: +201555836995 </div>
                </div>
                <!--/.col-->
    
    
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
    
                    @if($invoice->module =='client')
                    <div>
                        <strong>{{ trans('cruds.proposal.fields.Customer_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyname') }}
                        :{{ $invoice->getclient && $invoice->getclient->name ? $invoice->getclient->name : '' }}</div>
                    <div>{{ trans('cruds.proposal.fields.companyemail') }}:
                        {{ $invoice->getclient && $invoice->getclient->email ? $invoice->getclient->email : '' }} </div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }}
                        :{{ $invoice->getclient && $invoice->getclient->address ? $invoice->getclient->address : '' }}
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}:
                        {{ $invoice->getclient && $invoice->getclient->phone ? $invoice->getclient->phone : '' }} </div>
                    @endif
                    @if($invoice->module =='opportunities')
                    <div>
                        <strong>{{ trans('cruds.proposal.fields.Opportunity_INFO') }}</strong>
                    </div>
    
                    <div>{{ trans('cruds.proposal.fields.companyname') }}
                        :{{ $invoice->getopportunity && $invoice->getopportunity->name ? $invoice->getopportunity->name : '' }}
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }} :
                        {{ $invoice->getopportunity && $invoice->getopportunity->address ? $invoice->getopportunity->address : '' }}
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}:
                        {{ $invoice->getopportunity && $invoice->getopportunity->phone ? $invoice->getopportunity->phone : '' }}
                    </div>
    
                    @endif
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th class="center">Quantity</th>
                            <th class="right">Selling Price</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @if($invoice->items->isEmpty() != true)
                        @foreach($invoice->items as $item)
    
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="left">{{ $item->pivot->item_name }}</td>
                            <td class="left">{{ $item->pivot->item_desc }}</td>
                            <td class="center">{{ $item->pivot->quantity }}</td>
                            <td class="right">{{ $item->pivot->selling_price  }}</td>
                            <td class="right">{{ $item->pivot->selling_price * $item->pivot->quantity}}</td>
                      
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-sm-5"></div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Subtotal</strong>
                            </td>
                            <td class="right">{{ $invoice->before_discount }}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Discount ({{ $invoice->discount_percent }}%)</strong>
                            </td>
                            <td class="right">{{ $invoice->discount_total }} </td>
                        </tr>
                        @if($invoice->adjustment)
                            <tr>
                                <td class="left">
                                    <strong>Adjustment</strong>
                                </td>
                                <td class="right">{{ round($invoice->adjustment) }} </td>
                            </tr>
                        @endif

                        @foreach($invoice->gettaxesarray($invoice) as $key=> $taxold)
                            <tr>

                                <td class="left">
                                    <strong>{{get_taxes($key)->name }} ({{ get_taxes($key)->rate_percent }}%)</strong>
                                </td>
                                <td class="right">
                                    {{ array_sum($taxold) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="left">
                                <strong>Total</strong>
                            </td>
                            <td class="right">
                                <strong>{{ $invoice->total_amount }}</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

   

    <!-- footer hereeeeeeeeeeeeeeeeeee -->






    <!-- **************************************** -->


    <footer>

        <!--  -->
        <div style="margin-top: 0px">
            <div style="padding:4px; background:#515151;color: #ffffff;">
                <div class="panel-titlex" style="text-align:center; font-size:15px;">Payment Policy </div>
            </div>
            <table class="itemsz" border="0" cellpadding="0" cellspacing="0"
                style="font-size:14px; text-align: left;width:100%">
                <!-- <thead>
            <tr>

            </tr>
            </thead> -->
                <tbody>

                    <tr>
                        <td>1. Proposal Validity: </td>
                        <td>{{ $invoice->proposal_validity }}</td>
                    </tr>
                    <tr>
                        <td> 2. Materials supply/delivery: </td>
                        <td> {{ $invoice->materials_supply_delivery }}</td>
                    </tr>
                    <tr>
                        <td> 3. Warranty: </td>
                        <td> {{ $invoice->warranty }}</td>
                    </tr>

                    <tr>
                        <td> 4. Prices:</td>
                        <td>{{$invoice->prices}}</td>
                    </tr>

                    <tr>
                        <td style="text-decoration:underline"> 5. Payment Terms:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0px 0px 0px 20px;"> {{  nl2br($invoice->payment_terms) }}

                        </td>
                    </tr>

                    <tr>
                        <td>6. Maintenance & Service Contract:</td>
                        <td> {{$invoice->maintenance_service_contract}}</td>
                    </tr>


                </tbody>
            </table>
        </div>


        <div style="padding:1px; background:#515151;color: #ffffff;"></div>
        <!--  -->



        <table class="items" border="0" cellpadding="0" cellspacing="0"
            style="font-size:14px; text-align: left;width:100%">
            <tbody>

                <tr>
                    <td><span>TAX Registration Number</span></td>
                    <td><span>562-190-759</span></td>
                    <td style="text-align:right;float:right"><span>562-190-759</span></td>
                    <td style="text-align:right;float:right"><span>:رقم السجل الضريبي</span></td>
                </tr>

                <tr>
                    <td><span>Trade License Number :</span></td>
                    <td><span>135842</span></td>
                    <td style="text-align:right;float:right"><span>135842</span></td>
                    <td style="text-align:right;float:right"><span>:رقم السجل التجاري</span></td>
                </tr>

                <tr>
                    <td><span>Address:</span></td>
                    <td colspan="0"><span>Villa 10 - Block 11 - 9th District - Nasr City</span></td>
                    <td style="text-align:right;float:right"><span>قطعة 10 - بلوك 11 - المنطقة التاسعة - مدينة نصر
                        </span></td>
                    <td style="text-align:right;float:right"><span>:العنوان</span></td>

                </tr>

                <tr style="background-color:#b5b5b5;">
                    <td colspan="3"><span><b>PAYMENT DETAILS:</b></span></td>
                    <td style="text-align:right;float:right"><span><b>:بيانات الدفع</b></span></td>
                </tr>

                <tr>
                    <td><span>Cheques are payable to:</span></td>
                    <td><span>One Tec Group</span></td>
                    <td style="text-align:right;float:right"><span>ون تك جروب </span></td>
                    <td style="text-align:right;float:right"><span>:تصدر الشيكات بإسم </span></td>
                </tr>

                <tr style="background-color:#b5b5b5;">
                    <td colspan="3"><span><b>Bank Transfer:</b></span></td>
                    <td style="text-align:right;float:right"><span><b>:التحويل البنكى</b></span></td>
                </tr>

                <tr>
                    <td><span>ACCOUNT NAME :</span></td>
                    <td><span>One Tec Group</span></td>
                    <td style="text-align:right;float:right"><span>ون تك جروب </span></td>
                    <td style="text-align:right;float:right"><span>:اسم الحساب </span></td>
                </tr>

                <tr>
                    <td><span>A/C # (EGP):</span></td>
                    <td><span>760077-3931-EGP-001</span></td>
                    <td style="text-align:right;float:right"><span>760077-3931-EGP-001</span></td>
                    <td style="text-align:right;float:right"><span>:رقم الحساب </span></td>
                </tr>

                <tr>
                    <td><span>BANK NAME :</span></td>
                    <td><span>Arab African International Bank</span></td>
                    <td style="text-align:right;float:right"><span>البنك العربى الأفريقى الدولى</span></td>
                    <td style="text-align:right;float:right"><span>:اسم البنك</span></td>
                </tr>

                <tr>
                    <td><span>SWIFT CODE:</span></td>
                    <td><span>ARAIEGCXXX</span></td>
                    <td style="text-align:right;float:right"><span>ARAIEGCXXX</span></td>
                    <td style="text-align:right;float:right"><span>:سويفت كود</span></td>
                </tr>

                <tr>
                    <td colspan="4"><span>ADDRESS: 13 Khaled Ebn El Waleed St. - Sheraton Buildings, Heliopolis, Cairo,
                            Egypt</span></td>
                </tr>

                <tr>
                    <td colspan="4"><span>If you have any inquiry concerning this proposal, please send an email to:
                            <font class="font5">sales@onetecgroup.com</font></span></td>
                </tr>

                <tr>
                    <td colspan="2" style="margin-top:50px !important;"><span>RECEIVED BY:</span></td>
                    <td style="margin-top:10px !important;"><span>SIGNATURE:</span></td>
                </tr>

                <tr>
                    <td colspan="2" style="margin-top:50px !important;"><span>DATE:</span></td>
                    <td style="margin-top:10px !important;"><span>STAMP:</span></td>
                </tr>

                <tr>
                    <td colspan="4"
                        style="margin-top:10px !important;text-align:center;background-color:red;color:#fff;">
                        <span>THANK YOU FOR YOUR BUSINESS!</span></td>
                </tr>

            </tbody>
        </table>
        @endsection
