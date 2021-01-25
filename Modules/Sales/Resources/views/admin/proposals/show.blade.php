@extends('layouts.admin')
@section('content')

{{-- <div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proposal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.proposals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.id') }}
                        </th>
                        <td>
                            {{ $proposal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $proposal->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.subject') }}
                        </th>
                        <td>
                            {{ $proposal->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.module') }}
                        </th>
                        <td>
                            {{ $proposal->module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_date') }}
                        </th>
                        <td>
                            {{ $proposal->proposal_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.expire_date') }}
                        </th>
                        <td>
                            {{ $proposal->expire_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.alert_overdue') }}
                        </th>
                        <td>
                            {{ $proposal->alert_overdue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.currency') }}
                        </th>
                        <td>
                            {{ $proposal->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.notes') }}
                        </th>
                        <td>
                            {!! $proposal->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.total_tax') }}
                        </th>
                        <td>
                            {{ $proposal->total_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.total_cost_price') }}
                        </th>
                        <td>
                            {{ $proposal->total_cost_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.tax') }}
                        </th>
                        <td>
                            {{ $proposal->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.status') }}
                        </th>
                        <td>
                            {{ $proposal->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.date_sent') }}
                        </th>
                        <td>
                            {{ $proposal->date_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_deleted') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::PROPOSAL_DELETED_SELECT[$proposal->proposal_deleted] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.emailed') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::EMAILED_SELECT[$proposal->emailed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.show_client') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::SHOW_CLIENT_SELECT[$proposal->show_client] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.convert') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::CONVERT_SELECT[$proposal->convert] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.convert_module') }}
                        </th>
                        <td>
                            {{ $proposal->convert_module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.permissions') }}
                        </th>
                        <td>
                          
                                <span class="label label-info">sara</span>
                          
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.proposals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
 --}}



      <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.proposal.title') }}
          <strong># {{ $proposal->reference_no }}</strong>
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

              <h6 class="mb-3"> {{ trans('cruds.proposal.fields.reference_no') }}:</h6>
              <div>
                <strong>#{{ $proposal->reference_no }}</strong>
              </div>
              <div>{{ trans('cruds.proposal.fields.proposal_date') }} : {{ $proposal->proposal_date }}</div>
              <div>{{ trans('cruds.proposal.fields.expire_date') }} : {{ $proposal->expire_date }}</div>
              <div>{{ trans('cruds.proposal.fields.Sales_Agent') }}: {{ $proposal->user && $proposal->user->accountDetail ? $proposal->user->accountDetail->fullname :'' }} </div>
              <div>
                {{ trans('cruds.proposal.fields.status') }}: {{ $proposal->status }}
              </div>
            </div>
            <!--/.col-->

          </div>
          <hr>
          <div class="row mb-4">

            <div class="col-sm-4">

                {{-- <h6 class="mb-3"> {{ trans('cruds.proposal.fields.OTG_INFO') }}:</h6> --}}
                <div>
                  <strong> {{ trans('cruds.proposal.fields.OTG_INFO') }}</strong>
                </div>
                <div>{{ trans('cruds.proposal.fields.companyname') }} : One Tec Group LLC</div>
                <div>{{ trans('cruds.proposal.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                <div>{{ trans('cruds.proposal.fields.companyphone') }}: +201555836995 </div>
              </div>
            <!--/.col-->


            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            @dd($proposal->client,$proposal->opportunity)
               @if($proposal->module =='client') 
               
                    <div>
                    <strong>{{ trans('cruds.proposal.fields.Customer_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyname') }} :{{-- $proposal->client?: --}}</div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}: +201555836995 </div>
               @endif
               @if($proposal->module =='opportunities') 
                    <div>
                        <strong>{{ trans('cruds.proposal.fields.Opportunity_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyname') }} :{{-- $proposal->opportunity?: --}}</div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt</div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}: +201555836995 </div>
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