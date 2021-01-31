@extends('layouts.admin')
@section('content')



  <div class="mb-2">
  @if($invoice->status != 'accepted' || $invoice->status != 'approved')
    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-primary">Add item</button>

      <!-- Secondary, outline button -->
      <button type="button" class="btn btn-secondary">Clone</button>

      <!-- Indicates a successful or positive action -->
      <button type="button" class="btn btn-warning">Reminder </button>


      <div class="btn-group">
        <button type="button" class="btn btn-danger  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More Actions
        </button>
        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">

          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.Waiting_approval')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.Rejected')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.Approved')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.draft')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.sent')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.open')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.revised')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.declined')}}</a>
          <a  class="dropdown-item" href="#">{{trans('cruds.invoice.fields.accepted')}}</a>

        </div>
      </div>
      <!-- /btn-group -->


  @else


    <!-- Indicates a successful or positive action -->
      <button type="button" class="btn btn-success changestatus" data-status="accepted">{{trans('cruds.invoice.fields.accepted')}}</button>

      <!-- Indicates caution should be taken with this action -->
      <button type="button" class="btn btn-danger changestatus" data-status="Rejected">{{trans('cruds.invoice.fields.Rejected')}}</button>


    @endif

    {{-- <div class="float-right "> --}}
    <div class="mb-2 float-right">
      <a href="#" data-toggle="tooltip" data-placement="top" title="" class="btn btn-xs btn-primary pull-right" data-original-title="Send Email">
        <i class="fa fa-envelope-o"></i>
      </a>
      <a onclick="print_invoices('print_invoices')" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print" class=" btn btn-xs btn-danger pull-right" aria-describedby="tooltip1049">
        <i class="fa fa-print"></i>
      </a>

      <a href="{{ route('finance.admin.invoices.pdf', $invoice->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF Light Current" class="btn btn-xs btn-success pull-right ">
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
          <div>{{ trans('cruds.invoice.fields.due_date') }} : {{ $invoice->due_date }}</div>
          <div>{{ trans('cruds.invoice.fields.Sales_Agent') }}: {{ $invoice->added_by && $invoice->added_by->accountDetail ? $invoice->added_by->accountDetail->fullname :'' }} </div>
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

            <div>
              <strong>{{ trans('cruds.invoice.fields.Customer_INFO') }}</strong>
            </div>
            <div>{{ trans('cruds.invoice.fields.companyname') }} :{{ $invoice->client && $invoice->client->name ? $invoice->client->name : '' }}</div>
            <div>{{ trans('cruds.invoice.fields.companyemail') }}: {{ $invoice->client && $invoice->client->email ? $invoice->client->email : '' }} </div>
            <div>{{ trans('cruds.invoice.fields.companyaddress') }} :{{ $invoice->client && $invoice->client->address ? $invoice->client->address : '' }}</div>
            <div>{{ trans('cruds.invoice.fields.companyphone') }}: {{ $invoice->client && $invoice->client->phone ? $invoice->client->phone : '' }} </div>

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
            <th class="center">Quantity</th>
            <th class="right">Unit Cost</th>
            <th class="right">Selling Price</th>
            <th class="right">Total</th>
          </tr>
          </thead>
          <tbody>
          @if($invoice->items->isEmpty() != true)
            {{--@php--}}
            {{--$total = 0;--}}
            {{--@endphp--}}
            @foreach($invoice->items as $item)

              <tr>
                <td class="center">{{ $loop->iteration }}</td>
                <td class="left">{{ $item->pivot->item_name }}</td>
                <td class="center">{{ $item->pivot->quantity }}</td>
                <td class="right">{{ $item->pivot->unit_cost }} <b>EGP</b></td>
                <td class="right">{{ $item->pivot->unit_cost }} <b>EGP</b></td>
                <td class="right">{{ round($item->pivot->total_cost_price)}} <b>EGP</b></td>
              </tr>
              {{--@php--}}
                {{--$total += $item->pivot->selling_price * $item->pivot->quantity;--}}
              {{--@endphp--}}
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
      <div class="row">

        <div class="col-lg-4 col-sm-5">
          {!! $invoice->notes !!}
        </div>
        <!--/.col-->

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
                  @if($invoice->discount_status == 'after_tax')
                    {{ $invoice->after_discount * get_taxes($key)->rate_percent / 100 }}
                  @else
                    {{ array_sum($taxold) }}
                  @endif
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
        <!--/.col-->

      </div>
      <!--/.row-->
    </div>
  </div>


@section('scripts')
  <script>
      /**
       * function Change status of invoice
       *
       * */
      $(document).ready(function(){
          $('.changestatus').click(function(){
              var currentstatus=$(this).data('status');
              var url = '/admin/finance/invoices/changestatus';
              var invoiceId="{{ $invoice->id }}"
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
                      id: invoiceId,
                      status: currentstatus,

                  },
                  success: function (response) {
                      location.reload(true);
                  }
              });

          });
      });
      //  $("p").click(function(){
      //   alert("The paragraph was clicked.");
      // });
      // var url = '/admin/finance/invoices/changestatus';

      // // Ajax Reuqest
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });
      // $.ajax({
      //     url: url,
      //     type: 'post',
      //     dataType: 'json',
      //     data: {
      //         invoice: invoice,
      //         id: val,

      //     },
      //     context: val,
      //     beforeSend: function () {
      //         $("#related_to").html('Loading...');
      //     },
      //     success: function (response) {

      //         if (response) {
      //             $("#related_to").html('<label for="field-1" > select ' + val + '</label>');
      //             $("#related_to").append(response);
      //         } else {
      //             $("#related_to").empty();
      //         }

      //     }
      // });



  </script>
@endsection

@endsection