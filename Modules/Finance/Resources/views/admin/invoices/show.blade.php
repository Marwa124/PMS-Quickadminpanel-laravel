@extends('layouts.admin')
@section('content')

{{-- <div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $invoice->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.subject') }}
                        </th>
                        <td>
                            {{ $invoice->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.module') }}
                        </th>
                        <td>
                            {{ $invoice->module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.expire_date') }}
                        </th>
                        <td>
                            {{ $invoice->expire_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.alert_overdue') }}
                        </th>
                        <td>
                            {{ $invoice->alert_overdue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.currency') }}
                        </th>
                        <td>
                            {{ $invoice->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.notes') }}
                        </th>
                        <td>
                            {!! $invoice->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.total_tax') }}
                        </th>
                        <td>
                            {{ $invoice->total_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.total_cost_price') }}
                        </th>
                        <td>
                            {{ $invoice->total_cost_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.tax') }}
                        </th>
                        <td>
                            {{ $invoice->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.status') }}
                        </th>
                        <td>
                            {{ $invoice->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.date_sent') }}
                        </th>
                        <td>
                            {{ $invoice->date_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_deleted') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::PROPOSAL_DELETED_SELECT[$invoice->invoice_deleted] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.emailed') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::EMAILED_SELECT[$invoice->emailed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.show_client') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::SHOW_CLIENT_SELECT[$invoice->show_client] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.convert') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::CONVERT_SELECT[$invoice->convert] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.convert_module') }}
                        </th>
                        <td>
                            {{ $invoice->convert_module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.permissions') }}
                        </th>
                        <td>
                          
                                <span class="label label-info">sara</span>
                          
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
 --}}



      <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
          <strong># {{ $invoice->reference_no }}</strong>
          <a href="#" class="btn btn-sm btn-info float-right" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
          {{-- <a href="#" class="btn btn-sm btn-info float-right"><i class="fa fa-save"></i> Save</a> --}}
        </div>
        <div class="card-body">
          <div class="row mb-4">

            <div class="col-sm-4">
              <h6 class="mb-3"></h6>
             
              <div><img src="{{asset('images/image001.png')}}" alt=""></div>
           
            </div>
            <!--/.col-->

            <div class="col-sm-4">
             
            </div>
            <!--/.col-->

            <div class="col-sm-4">

              <h6 class="mb-3"> {{ trans('cruds.invoice.fields.reference_no') }}:</h6>
              <div>
                <strong>#{{ $invoice->reference_no }}</strong>
              </div>
              <div>{{ trans('cruds.invoice.fields.invoice_date') }} : {{ $invoice->invoice_date }}</div>
              <div>{{ trans('cruds.invoice.fields.expire_date') }} : {{ $invoice->expire_date }}</div>
              <div>{{ trans('cruds.invoice.fields.Sales_Agent') }}: {{ $invoice->user && $invoice->user->accountDetail ? $invoice->user->accountDetail->fullname :'' }} </div>
              <div>
                {{ trans('cruds.invoice.fields.status') }}: {{ $invoice->status }}
              </div>
            </div>
            <!--/.col-->

          </div>
          <hr>
          <div class="row mb-4">

            <div class="col-sm-4">

                {{-- <h6 class="mb-3"> {{ trans('cruds.invoice.fields.OTG_INFO') }}:</h6> --}}
                <div>
                  <strong> {{ trans('cruds.invoice.fields.OTG_INFO') }}</strong>
                </div>
                <div>{{ trans('cruds.invoice.fields.companyname') }} : One Tec Group LLC</div>
                <div>{{ trans('cruds.invoice.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                <div>{{ trans('cruds.invoice.fields.companyphone') }}: +201555836995 </div>
              </div>
            <!--/.col-->


            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            {{--@dd($invoice->client,$invoice->opportunity)--}}
               @if($invoice->module =='client')
               
                    <div>
                    <strong>{{ trans('cruds.invoice.fields.Customer_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.invoice.fields.companyname') }} :{{-- $invoice->client?: --}}</div>
                    <div>{{ trans('cruds.invoice.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                    <div>{{ trans('cruds.invoice.fields.companyphone') }}: +201555836995 </div>
               @endif
               @if($invoice->module =='opportunities')
                    <div>
                        <strong>{{ trans('cruds.invoice.fields.Opportunity_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.invoice.fields.companyname') }} :{{-- $invoice->opportunity?: --}}</div>
                    <div>{{ trans('cruds.invoice.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                    <div>{{ trans('cruds.invoice.fields.companyphone') }}: +201555836995 </div>
                    @endif
            </div>
            <!--/.col-->

          </div>
          <!--/.row-->

          <div class="table-responsive-sm">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="center">#</th>
                  <th>Item</th>
                  <th>Description</th>
                  <th class="center">Quantity</th>
                  <th class="right">Unit Cost</th>
                  <th class="right">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="center">1</td>
                  <td class="left">Origin License</td>
                  <td class="left">Extended License</td>
                  <td class="center">1</td>
                  <td class="right">$999,00</td>
                  <td class="right">$999,00</td>
                </tr>
                <tr>
                  <td class="center">2</td>
                  <td class="left">Custom Services</td>
                  <td class="left">Instalation and Customization (cost per hour)</td>
                  <td class="center">20</td>
                  <td class="right">$150,00</td>
                  <td class="right">$3.000,00</td>
                </tr>
                <tr>
                  <td class="center">3</td>
                  <td class="left">Hosting</td>
                  <td class="left">1 year subcription</td>
                  <td class="center">1</td>
                  <td class="right">$499,00</td>
                  <td class="right">$499,00</td>
                </tr>
                <tr>
                  <td class="center">4</td>
                  <td class="left">Platinum Support</td>
                  <td class="left">1 year subcription 24/7</td>
                  <td class="center">1</td>
                  <td class="right">$3.999,00</td>
                  <td class="right">$3.999,00</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">

            <div class="col-lg-4 col-sm-5">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-sm-5 ml-auto">
              <table class="table table-clear">
                <tbody>
                  <tr>
                    <td class="left">
                      <strong>Subtotal</strong>
                    </td>
                    <td class="right">$8.497,00</td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>Discount (20%)</strong>
                    </td>
                    <td class="right">$1,699,40</td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>VAT (10%)</strong>
                    </td>
                    <td class="right">$679,76</td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>Total</strong>
                    </td>
                    <td class="right">
                      <strong>$7.477,36</strong>
                    </td>
                  </tr>
                </tbody>
              </table>
              <a href="#" class="btn btn-success"><i class="fa fa-usd"></i> Proceed to Payment</a>
            </div>
            <!--/.col-->

          </div>
          <!--/.row-->
        </div>
      </div>

  
@endsection