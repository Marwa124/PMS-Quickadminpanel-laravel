@extends('layouts.admin')
@section('content')



<div class="mb-2">
    @if($proposal->status == 'accepted' || $proposal->status == 'Approved')

    <!-- Secondary, outline button -->
    <button type="button" class="btn  btn-xs btn-secondary" data-toggle="modal" data-target="#primaryModal">Clone</button>

    <!-- Indicates a successful or positive action -->
    <button type="button" class="btn  btn-xs btn-warning">Reminder </button>

    <!-- Indicates caution should be taken with this action -->
    <!-- /btn-group -->
        @if ($proposal->convert != 'Yes')
            
            <div class="btn-group">
                <button type="button" class="btn  btn-xs btn-success  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Convert To
                </button>
                <div class="dropdown-menu" x-placement="bottom-start"
                    style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#invoiceModal">Invoice</a>
                    <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#primaryModal">Estimate</a> -->
        
                </div>
            </div>  
                
        @else
        {{-- check if invoice or estmatied  --}}
        @if ($proposal->convert_module == 'invoice')
        <a class="btn btn-purple btn-xs" href="{{ route('finance.admin.invoices.show', $proposal->getinvioce->id) }}"><i  class="fa fa-hand-o-right"></i> {{  $proposal->getinvioce && $proposal->getinvioce->reference_no ? $proposal->getinvioce->reference_no : ''  }}</a>
        @endif
      
        @endif
    
   
    <!-- /btn-group -->
    <!-- /btn-group -->
    <div class="btn-group">
        <button type="button" class="btn  btn-xs btn-danger  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">More Actions
        </button>
        <div class="dropdown-menu" x-placement="bottom-start"
            style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">

            <a class="dropdown-item" href="http://localhost/PMS/admin/proposals/index/email_proposals/215"
                data-toggle="ajaxModal">{{trans('cruds.proposal.fields.Email_Proposal')}}</a>
            <a class="dropdown-item"
                href="{{ route('sales.admin.proposals.historyproposal',$proposal->id) }}">{{ trans('cruds.proposal.title_singular') }}
                {{ trans('cruds.proposal.fields.History') }}</a>
            <a class="dropdown-item changestatus" data-status="draft"
                title="unmark_as_draft">{{ trans('cruds.proposal.fields.Mark_As') }}
                {{trans('cruds.proposal.fields.draft')}}</a>
            <a class="dropdown-item changestatus" data-status="sent"
                title="Mark As Sent">{{ trans('cruds.proposal.fields.Mark_As') }}
                {{trans('cruds.proposal.fields.sent')}}</a>
            <a class="dropdown-item changestatus" data-status="revised"
                title="Mark as Revised">{{ trans('cruds.proposal.fields.Mark_As') }}
                {{trans('cruds.proposal.fields.revised')}}</a>
            <a class="dropdown-item changestatus" data-status="open"
                title="Mark as Open">{{ trans('cruds.proposal.fields.Mark_As') }}
                {{trans('cruds.proposal.fields.open')}} </a>
            <a class="dropdown-item changestatus" data-status="declined">{{ trans('cruds.proposal.fields.Mark_As') }}
                {{trans('cruds.proposal.fields.declined')}}</a>
            <a class="dropdown-item changestatus" data-status="accepted">{{ trans('cruds.proposal.fields.Mark_As') }}
                {{trans('cruds.proposal.fields.accepted')}}</a>
            <hr>
            <a class="dropdown-item" href="{{ route('sales.admin.proposals.edit', $proposal->id) }}">
                {{ trans('global.edit') }} {{ trans('cruds.proposal.title_singular') }}</a>
        </div>
    </div>
    <!-- /btn-group -->


    @else


    <!-- Indicates a successful or positive action -->
    <button type="button" class="btn btn-success changestatus"
        data-status="accepted">{{trans('cruds.proposal.fields.accepted')}}</button>

    <!-- Indicates caution should be taken with this action -->
    <button type="button" class="btn btn-danger changestatus"
        data-status="Rejected">{{trans('cruds.proposal.fields.Rejected')}}</button>


    @endif

    {{-- <div class="float-right "> --}}
    <div class="mb-2 float-right">
        <a href="#" data-toggle="tooltip" data-placement="top" title="" class="btn btn-xs btn-primary pull-right"
            data-original-title="Send Email">
            <i class="fa fa-envelope"></i>
        </a>
        <a onclick="javascript:window.print();" href="#" >
            <i class="fa fa-print"></i>
        </a>

        <a href="{{ route('sales.admin.proposals.pdf', $proposal->id) }}" data-toggle="tooltip" data-placement="top"
            title="" data-original-title="PDF Light Current" class="btn btn-xs btn-success pull-right ">
            <i class="fa fa-file-pdf-o"></i>
        </a>


        <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF Software Development"
            class="btn btn-xs btn-info pull-right ">
            <i class="fa fa-file-pdf-o"></i>
        </a> -->


    </div>
    {{-- </div> --}}
</div>






<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proposal.title') }}
        <strong># {{ $proposal->reference_no }}</strong>
        <!-- <a href="#" class="btn btn-sm btn-info float-right" onclick="javascript:window.print();"><i
                class="fa fa-print"></i> Print</a> -->
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
                <div>{{ trans('cruds.proposal.fields.subject') }} : {{ $proposal->subject }}</div>
                <div>{{ trans('cruds.proposal.fields.proposal_date') }} : {{ $proposal->proposal_date }}</div>
                <div>{{ trans('cruds.proposal.fields.expire_date') }} : {{ $proposal->expire_date }}</div>
                <div>{{ trans('cruds.proposal.fields.Sales_Agent') }}: {{ $proposal->user && $proposal->user->accountDetail ? $proposal->user->accountDetail->fullname :'' }}
                </div>
                <div>
                    {{ trans('cruds.proposal.fields.status') }}: <span class="btn btn-sm btn-primary">  {{ $proposal->status }} </span>
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
                <div>{{ trans('cruds.proposal.fields.companyaddress') }} : 8th Sector – Building 10 – Block 11 – Nasr
                    City - Cairo, Egypt</div>
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
                <div>{{ trans('cruds.proposal.fields.companyname') }}
                    :{{ $proposal->getclient && $proposal->getclient->name ? $proposal->getclient->name : '' }}</div>
                <div>{{ trans('cruds.proposal.fields.companyemail') }}:
                    {{ $proposal->getclient && $proposal->getclient->email ? $proposal->getclient->email : '' }} </div>
                <div>{{ trans('cruds.proposal.fields.companyaddress') }}
                    :{{ $proposal->getclient && $proposal->getclient->address ? $proposal->getclient->address : '' }}
                </div>
                <div>{{ trans('cruds.proposal.fields.companyphone') }}:
                    {{ $proposal->getclient && $proposal->getclient->phone ? $proposal->getclient->phone : '' }} </div>
                @endif
                @if($proposal->module =='opportunities')
                <div>
                    <strong>{{ trans('cruds.proposal.fields.Opportunity_INFO') }}</strong>
                </div>

                <div>{{ trans('cruds.proposal.fields.companyname') }}
                    :{{ $proposal->getopportunity && $proposal->getopportunity->name ? $proposal->getopportunity->name : '' }}
                </div>
                <div>{{ trans('cruds.proposal.fields.companyaddress') }} :
                    {{ $proposal->getopportunity && $proposal->getopportunity->address ? $proposal->getopportunity->address : '' }}
                </div>
                <div>{{ trans('cruds.proposal.fields.companyphone') }}:
                    {{ $proposal->getopportunity && $proposal->getopportunity->phone ? $proposal->getopportunity->phone : '' }}
                </div>

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
                        <th>Unit</th>
                        <th>Brand</th>
                        <th>Part</th>
                        <th>Delivery</th>
                        <th class="center">Quantity</th>
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
                        <td class="left">{{ $item->pivot->unit }}</td>
                        <td class="left">{{ $item->pivot->brand }}</td>
                        <td class="left">{{ $item->pivot->part }}</td>
                        <td class="left">{{ $item->pivot->delivery }}</td>
                        <td class="center">{{ $item->pivot->quantity }}</td>
                        <td class="right">{{ $item->pivot->selling_price  }}</td>
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
                            <td class="right">{{ $proposal->getSubtotal($proposal) }}</td>
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
                                <strong>Adjustment</strong>
                            </td>
                            <td class="right">{{ $proposal->adjustment }}</td>
                        </tr>
                        
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
                            <label class="required"
                                for="module ">{{ trans('cruds.proposal.fields.Related_To') }}</label>
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
                            <input class="form-control date {{ $errors->has('proposal_date') ? 'is-invalid' : '' }}"
                                type="text" name="proposal_date" id="proposal_date"
                                value="{{ old('proposal_date',$proposal->proposal_date) }}" required>
                            @if($errors->has('proposal_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('proposal_date') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.proposal_date_helper') }}</span>
                        </div>
                        <div class="col-md-6">
                            <label for="expire_date">{{ trans('cruds.proposal.fields.expire_date') }}</label>
                            <input class="form-control date {{ $errors->has('expire_date') ? 'is-invalid' : '' }}"
                                type="text" name="expire_date" id="expire_date"
                                value="{{ old('expire_date',$proposal->expire_date) }}">
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
  </div>
    <!-- /.modal-dialog -->
    <!-- ****************************************************/modal****************************************************** -->
    <!-- ****************************************************invoice_modal****************************************************** -->
    <!-- /.modal -->

  <div class="modal fade bd-example-modal-lg" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-info modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> {{ trans('global.clone') }}
                        {{ trans('cruds.customerGroup.title_singular') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('sales.admin.proposals.invoice', [$proposal->id]) }}" id="form3">
                    @csrf
                    <div class="modal-body">
                     @include('sales::admin.proposals.invoicemodels', ['proposal'=>$proposal,'taxRates' => $taxRates,'clients'=>$clients,'projects'=>$projects]) 
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="customgroupsubmit2">
                            {{ trans('global.save') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
    <!-- ****************************************************/invoice_modal****************************************************** -->
    @section('scripts')
    <script src="{{ asset('js/proposals.js') }}"></script>
    <script>
        $('#recu_div').hide();
        $('#projects_div').hide();
        var recu = false;

        $(document).ready(function () {


            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/invoices/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function () {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function () {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', {{$invoice-> id ?? 0}});
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });

    </script>

    <script>
        /**
         * function Change status of proposal
         * 
         * */
        $(document).ready(function () {
            $('.changestatus').click(function () {
                var currentstatus = $(this).data('status');
                var url = '/admin/sales/proposals/changestatus';
                var proposalId = "{{ $proposal->id }}"
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
