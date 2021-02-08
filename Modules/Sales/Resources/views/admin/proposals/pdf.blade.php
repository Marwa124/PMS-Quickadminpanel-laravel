@extends('layouts.pdf_layout')
@section('title'){{$project->name ?? '' }} @endsection
@section('content')
    <div class="card">
        <div class="card-header">  Show Proposals <strong># PRO-2021-01-26-00031</strong></div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-4">
                    <h6 class="mb-3"></h6>
                    <div><img src="{{asset('images/image001.png')}}" alt=""></div>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h6 class="mb-3"> Reference No:</h6>
                    <div><strong>#PRO-2021-01-26-00031</strong></div>
                    <div>Proposal Date : 2021-01-15</div>
                    <div>Expire Date : 2021-01-21</div>
                    <div>Sales Agent: CFO </div>
                    <div>
                        Status: Waiting_approval
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-4">
                <div class="col-sm-4">
                    <div><strong> OTG INFO</strong></div>
                    <div>Company Name : One Tec Group LLC</div>
                    <div>Company Address : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                    <div>Company Phone: +201555836995 </div>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div><strong>Opportunity_INFO</strong></div>
                    <div>Company Name :weeww</div>
                    <div>Company Address : </div>
                    <div>Company Phone: </div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th class="center">Quantity</th>
                            <th class="right">Unit Cost</th>
                            <th class="right">Selling Price</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center">1</td>
                            <td class="left">Design</td>
                            <td class="left">ss</td>
                            <td class="center">1</td>
                            <td class="right">2000</td>
                            <td class="right">2200.00</td>
                            <td class="right">2200</td>
                        </tr>
                        <tr>
                            <td class="center">2</td>
                            <td class="left">Design</td>
                            <td class="left">ss</td>
                            <td class="center">1</td>
                            <td class="right">2000</td>
                            <td class="right">2200.00</td>
                            <td class="right">2200</td>
                        </tr>
                        <tr>
                            <td class="center">3</td>
                            <td class="left">pmroject</td>
                            <td class="left"></td>
                            <td class="center">1</td>
                            <td class="right">1003</td>
                            <td class="right">2006.00</td>
                            <td class="right">2006</td>
                        </tr>
                        <tr>
                            <td class="center">4</td>
                            <td class="left">pmroject</td>
                            <td class="left"></td>
                            <td class="center">1</td>
                            <td class="right">1003</td>
                            <td class="right">2006.00</td>
                            <td class="right">2006</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5"></div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left"><strong>Subtotal</strong></td>
                                <td class="right">8412.00</td>
                            </tr>
                            <tr>
                                <td class="left"><strong>Discount (0%)</strong></td>
                                <td class="right">0.00 </td>
                            </tr>
                            <tr>
                                <td class="left"><strong>Egyptian Tax Rate (14%)</strong></td>
                                <td class="right">420.42</td>
                            </tr>
                            <tr>
                                <td class="left"><strong>services (12%)</strong></td>
                                <td class="right">360.36</td>
                            </tr>
                            <tr>
                                <td class="left"><strong>Total</strong></td>
                                <td class="right"><strong>8952.78</strong></td>
                            </tr>
                        </tbody>
                    </table> <a href="#" class="btn btn-success"><i class="fa fa-usd"></i> Proceed to Payment</a>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .panel {
            margin-bottom: 21px;
            background-color: #ffffff;
            border: 1px solid transparent;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        .panel-custom .panel-heading {
            border-bottom: 2px solid #2b957a;
        }

        .panel .panel-heading {
            border-bottom: 0;
            font-size: 14px;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 16px;
        }

    </style>


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
                        <td>{{ $proposals_info->proposal_validity }}</td>
                    </tr>
                    <tr>
                        <td> 2. Materials supply/delivery: </td>
                        <td> {{ $proposals_info->materials_supply_delivery }}</td>
                    </tr>
                    <tr>
                        <td> 3. Warranty: </td>
                        <td> {{ $proposals_info->warranty }}</td>
                    </tr>

                    <tr>
                        <td> 4. Prices:</td>
                        <td>{{$proposals_info->prices}}</td>
                    </tr>

                    <tr>
                        <td style="text-decoration:underline"> 5. Payment Terms:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0px 0px 0px 20px;"> {{  nl2br($proposals_info->payment_terms) }}

                        </td>
                    </tr>

                    <tr>
                        <td>6. Maintenance & Service Contract:</td>
                        <td> {{$proposals_info->maintenance_service_contract}}</td>
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
