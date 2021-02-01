@extends('layouts.admin')
@section('content')



    <div class="mb-2">
            @if($proposal->status != 'accepted' || $proposal->status != 'Approved')
             
            <!-- Secondary, outline button -->
            <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#primaryModal" >Clone</button>
            
            <!-- Indicates a successful or positive action -->
            <button type="button" class="btn btn-warning">Reminder </button>
            
            <!-- Indicates caution should be taken with this action -->
             <!-- /btn-group -->
             <div class="btn-group">
              <button type="button" class="btn btn-success  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Convert To
              </button>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="#">Invoice</a>
                <a class="dropdown-item" href="#">Estimate</a>
               
              </div>
            </div>
            <!-- /btn-group -->
             <!-- /btn-group -->
             <div class="btn-group">
              <button type="button" class="btn btn-danger  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More Actions
              </button>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">

                {{-- <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.Waiting_approval')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.Rejected')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.Approved')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.draft')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.sent')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.open')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.revised')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.declined')}}</a>
                <a  class="dropdown-item" href="#">{{trans('cruds.proposal.fields.accepted')}}</a> --}}

              
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/index/email_proposals/215" data-toggle="ajaxModal">{{trans('cruds.proposal.fields.Email_Proposal')}}</a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/index/proposals_history/215">{{ trans('cruds.proposal.title_singular') }} {{ trans('cruds.proposal.History') }}</a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/change_status/draft/215" title="unmark_as_draft">{{ trans('cruds.proposal.Mark_As') }} {{trans('cruds.proposal.fields.draft')}}</a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/change_status/sent/215" title="Mark As Sent">{{ trans('cruds.proposal.Mark_As') }} {{trans('cruds.proposal.fields.sent')}}</a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/change_status/revised/215" title="Mark as Revised">{{ trans('cruds.proposal.Mark_As') }} {{trans('cruds.proposal.fields.revised')}}</a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/change_status/open/215" title="Mark as Open">{{ trans('cruds.proposal.Mark_As') }} {{trans('cruds.proposal.fields.open')}} </a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/change_status/declined/215">{{ trans('cruds.proposal.Mark_As') }} {{trans('cruds.proposal.fields.declined')}}</a>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/change_status/accepted/215">{{ trans('cruds.proposal.Mark_As') }} {{trans('cruds.proposal.fields.accepted')}}</a>
                  <hr>
                  <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/index/edit_proposals/215"> {{ trans('global.edit') }} {{ trans('cruds.proposal.title_singular') }}</a>
                      
               
              </div>
            </div>
            <!-- /btn-group -->
            
         
        @else 


          <!-- Indicates a successful or positive action -->
          <button type="button" class="btn btn-success changestatus" data-status="accepted">{{trans('cruds.proposal.fields.accepted')}}</button>
          <button type="button" class="btn btn-success changestatus" data-status="accepted">{{trans('cruds.proposal.fields.accepted')}}</button>
        
          <!-- Indicates caution should be taken with this action -->
          <button type="button" class="btn btn-danger changestatus" data-status="Rejected">{{trans('cruds.proposal.fields.Rejected')}}</button>

      
        @endif

     {{-- <div class="float-right "> --}}
        <div class="mb-2 float-right">
            <a href="#" data-toggle="tooltip" data-placement="top" title="" class="btn btn-xs btn-primary pull-right" data-original-title="Send Email">
                <i class="fa fa-envelope-o"></i>
            </a>
            <a onclick="print_proposals('print_proposals')" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print" class=" btn btn-xs btn-danger pull-right" aria-describedby="tooltip1049">
                <i class="fa fa-print"></i>
            </a>
    
            <a href="{{ route('sales.admin.proposals.pdf', $proposal->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF Light Current" class="btn btn-xs btn-success pull-right ">
                <i class="fa fa-file-pdf-o"></i>
            </a>
    
    
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF Software Development" class="btn btn-xs btn-info pull-right ">
                <i class="fa fa-file-pdf-o"></i>
            </a>
    
    
        </div>
    {{-- </div> --}}
   </div>






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
           
               @if($proposal->module =='client') 
                    <div>
                    <strong>{{ trans('cruds.proposal.fields.Customer_INFO') }}</strong>
                    </div>
                    <div>{{ trans('cruds.proposal.fields.companyname') }} :{{ $proposal->getclient && $proposal->getclient->name ? $proposal->getclient->name : '' }}</div>
                    <div>{{ trans('cruds.proposal.fields.companyemail') }}: {{ $proposal->getclient && $proposal->getclient->email ? $proposal->getclient->email : '' }} </div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }} :{{ $proposal->getclient && $proposal->getclient->address ? $proposal->getclient->address : '' }}</div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}: {{ $proposal->getclient && $proposal->getclient->phone ? $proposal->getclient->phone : '' }} </div>
               @endif
               @if($proposal->module =='opportunities') 
                    <div>
                        <strong>{{ trans('cruds.proposal.fields.Opportunity_INFO') }}</strong>
                    </div>
                   
                    <div>{{ trans('cruds.proposal.fields.companyname') }} :{{ $proposal->getopportunity && $proposal->getopportunity->name ? $proposal->getopportunity->name : '' }}</div>
                    <div>{{ trans('cruds.proposal.fields.companyaddress') }} : {{ $proposal->getopportunity && $proposal->getopportunity->address ? $proposal->getopportunity->address : '' }}</div>
                    <div>{{ trans('cruds.proposal.fields.companyphone') }}: {{ $proposal->getopportunity && $proposal->getopportunity->phone ? $proposal->getopportunity->phone : '' }} </div>
                   
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
                  <th class="right">margin</th>
                  <th class="right">Unit Cost</th>
                  <th class="right">Selling Price</th>
                  <th class="right">Total</th>
                </tr>
              </thead>
              <tbody>
              @if($proposal->items->isEmpty() != true)
                @foreach($proposal->items as $item)
               
                 <tr>
                  <td class="center">{{ $loop->iteration }}</td>
                  <td class="left">{{ $item->pivot->item_name }}</td>
                  <td class="left">{{ $item->pivot->item_desc }}</td>
                  <td class="center">{{ $item->pivot->quantity }}</td>
                  <td class="right">{{ $item->pivot->margin }}</td>
                  <td class="right">{{ $item->pivot->unit_cost }}</td>
                  <td class="right">{{ $item->pivot->selling_price }}</td>
                  <td class="right">{{ $item->pivot->selling_price * $item->pivot->quantity}}</td>
                 </tr>
                @endforeach
              @endif
              </tbody>
            </table>
          </div>

          <div class="row">

            <div class="col-lg-4 col-sm-5">
            {!! $proposal->notes !!}
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-sm-5 ml-auto">
              <table class="table table-clear">
                <tbody>
                  <tr>
                    <td class="left">
                      <strong>Subtotal</strong>
                    </td>
                    <td class="right">{{-- $proposal->getSubtotal() --}}</td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>Subtotal After Discount</strong>
                    </td>
                    <td class="right">{{ $proposal->after_discount }}</td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>Discount ({{ $proposal->discount_percent }}%)</strong>
                    </td>
                    <td class="right">{{ $proposal->discount_total }} </td>
                  </tr>
                  @foreach($proposal->gettaxesarray($proposal) as $key=> $taxold)
                  <tr>
                    
                    <td class="left">
                      <strong>{{get_taxes($key)->name }} ({{ get_taxes($key)->rate_percent }}%)</strong>
                    </td>
                    <td class="right">{{ array_sum($taxold) }}</td>
                </tr>
                     @endforeach
                  <tr>
                    <td class="left">
                      <strong>Total</strong>
                    </td>
                    <td class="right">
                      <strong>{{ $proposal->total_tax + $proposal->after_discount }}</strong>
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

    <!-- ****************************************************modal****************************************************** -->
    <!-- /.modal -->

<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> {{ trans('global.clone') }} {{ trans('cruds.customerGroup.title_singular') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

             <form method="POST" action="{{ route('sales.admin.proposals.cloneproposal', [$proposal->id]) }}" id="form2">
                    @csrf
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-12">
                  <label class="required" for="module ">{{ trans('cruds.proposal.fields.Related_To') }}</label>
                  <select class="form-control  {{ $errors->has('module') ? 'is-invalid' : '' }}" name="module"
                      onchange="get_related_moduleName(this.value, true)" id="module" required>
                      <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
                      <option value="client">{{trans('cruds.proposal.fields.client')}}</option>
                      <option value="opportunities">{{trans('cruds.proposal.fields.opportunities')}}</option>
                  </select>
                    @if($errors->has('module'))
                    <div class="invalid-feedback">
                        {{ $errors->first('module') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.proposal.fields.Related_To_helper') }}</span>
                </div>
                  <input type="hidden" name="proposal_id" value="{{$proposal->id}}">
                  <div class="col-md-12" id="related_to">
                  </div>
          
                <div class="col-md-6">
                    <label class="required"
                        for="proposal_date">{{ trans('cruds.proposal.fields.proposal_date') }}</label>
                    <input class="form-control date {{ $errors->has('proposal_date') ? 'is-invalid' : '' }}" type="text"
                        name="proposal_date" id="proposal_date" value="{{ old('proposal_date',$proposal->proposal_date) }}" required>
                    @if($errors->has('proposal_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proposal_date') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.proposal.fields.proposal_date_helper') }}</span>
                </div>
                <div class="col-md-6">
                    <label for="expire_date">{{ trans('cruds.proposal.fields.expire_date') }}</label>
                    <input class="form-control date {{ $errors->has('expire_date') ? 'is-invalid' : '' }}" type="text"
                        name="expire_date" id="expire_date" value="{{ old('expire_date',$proposal->expire_date) }}">
                    @if($errors->has('expire_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expire_date') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.proposal.fields.expire_date_helper') }}</span>
                </div>
               
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="customgroupsubmit">
                    {{ trans('global.save') }}</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
    <!-- ****************************************************/modal****************************************************** -->
@section('scripts')
<script src="{{ asset('js/proposals.js') }}"></script>
<script>
/**
 * function Change status of proposal
 * 
 * */
 $(document).ready(function(){
    $('.changestatus').click(function(){
      var currentstatus=$(this).data('status');
      var url = '/admin/sales/proposals/changestatus';
      var proposalId="{{ $proposal->id }}"
   // Ajax Reuqest
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $.ajax({
          url: url,
          type: 'post',
          data: {
            id: proposalId,
            status: currentstatus,

          },
          success: function (response) {
            location.reload(true);
          }
      });

    });
});



</script> 
@endsection
  
@endsection