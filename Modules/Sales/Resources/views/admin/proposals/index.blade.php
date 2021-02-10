@extends('layouts.admin')
@section('content')
@can('proposal_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('sales.admin.proposals.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.proposal.title_singular') }}
        </a>
    </div>
</div>
@endcan
<!-- ***************************************monay calculation *****************************************-->
<div class="row">
      <!--/.col-->
      <div class="col-sm-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="h4 m-0">{{ $Waiting_approval }}</div>
                <div>{{trans('cruds.proposal.fields.Waiting_approval')}}</div>
                <div class="progress progress-xs my-3">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
      <!--/.col-->

    <div class="col-sm-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="h4 m-0">{{ $draft }}</div>
                <div>{{trans('cruds.proposal.fields.draft')}}</div>
                <div class="progress progress-xs my-3">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="h4 m-0">{{ $sent }}</div>
                <div>{{trans('cruds.proposal.fields.sent')}}</div>
                <div class="progress progress-xs my-3">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="h4 m-0">{{ $expired ?? '' }}</div>
                <div>{{trans('cruds.proposal.fields.expired')}}</div>
                <div class="progress progress-xs my-3">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="h4 m-0">{{ $declined }}</div>
                <div>{{trans('cruds.proposal.fields.declined')}}</div>
                <div class="progress progress-xs my-3">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="h4 m-0">{{ $accepted }}</div>
                <div>{{trans('cruds.proposal.fields.accepted')}}</div>
                <div class="progress progress-xs my-3">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->
</div>
<!-- ***************************************monay calculation *****************************************-->
<!-- *************************************** propsal counter  *****************************************-->
<!--/.row-->

<div class="row">

    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-cogs bg-gray-100 p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">{{trans('global.all')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-cogs bg-primary p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','Waiting_approval')->count() }}
                </div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    {{trans('cruds.proposal.fields.Waiting_approval')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>

    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-moon-o bg-warning p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','Approved')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    {{trans('cruds.proposal.fields.Approved')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-laptop bg-success p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','Rejected')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    {{trans('cruds.proposal.fields.Rejected')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-bell bg-danger p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','draft')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">{{trans('cruds.proposal.fields.draft')}}
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-cogs bg-orange p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','sent')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">{{trans('cruds.proposal.fields.sent')}}
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-laptop bg-green p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','open')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">{{trans('cruds.proposal.fields.open')}}
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-moon-o bg-orange p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','revised')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    {{trans('cruds.proposal.fields.revised')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-bell bg-blue p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','declined')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    {{trans('cruds.proposal.fields.declined')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
    <!--/.col-->
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 clearfix">
                <i class="fa fa-moon-o bg-red p-3 font-2xl mr-3 float-left"></i>
                <div class="h5 text-primary mt-2 mb-0">{{ $proposals->where('status','accepted')->count() }}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs">
                    {{trans('cruds.proposal.fields.accepted')}}</div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="font-weight-bold font-xs btn-block text-muted" href="#">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
<!-- *************************************** propsal conter  *****************************************-->
<!-- *************************************** Filter card  *****************************************-->
<form action="{{ route('sales.admin.proposals.filter') }}" method="post">
    @csrf
<div class="card">
    <div class="card-body">
        <div class="row">
         
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Date <span class="text-danger"></span></h5>
                    <div class="controls">

                        <input type="date"  name="proposal_date" id="proposal_date" value="{{ $proposal_date ?? '' }}"
                            class="form-control datepicker-autoclose" placeholder="Please select date">
                    </div>
                </div>
            </div>

      
            <div class="col-md-4">
                <h5>Year<span class="text-danger"></span></h5>
                <div class="form-group">
                    <select class="form-control" id="Year" name="year">
                        <option value=" " selected></option>
                        @foreach($years as $yearall) 
                        <option value="{{ $yearall }}" {{ isset($year) ? ($year==$yearall ? 'selected':''):'' }}>{{ $yearall }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Trashed<span class="text-danger"></span></h5>
                <div class="form-group">
                    <select class="form-control" id="delete" name="delete">
                        <option value="untrashed" {{ isset($delete) ? ($delete == 'untrashed' ? 'selected':''):'' }}>Untrashed</option>
                        <option value="trashed" {{ isset($delete) ? ($delete == 'trashed' ? 'selected':''):'' }}>Trashed</option>
                    </select>
                </div>
            </div>
         
         
        
            <div class="col-md-4">
                <h5>status<span class="text-danger"></span></h5>
                <div class="form-group">
                    <select class="form-control" id="statusfilter" name="status">
                        <option value=" " selected></option>
                        <option value="all" {{ isset($status) ? ($status == 'all' ? 'selected':''):'' }}>{{trans('global.all')}}</option>
                        <option value="draft"  {{ isset($status) ? ($status == 'draft' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.draft')}}</option>
                        <option value="expired" {{ isset($status) ? ($status == 'expired' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.expired')}}</option>
                        <option value="open" {{ isset($status) ? ($status == 'open' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.open')}}</option>
                        <option value="declined" {{ isset($status) ? ($status == 'declined' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.declined')}}</option>
                        <option value="accepted" {{ isset($status) ? ($status == 'accepted' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.accepted')}}</option>
                        <option value="approve" {{ isset($status) ? ($status == 'approve' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.Approved')}}</option>
                        <option value="Rejected" {{ isset($status) ? ($status == 'Rejected' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.Rejected')}}</option>
                        <option value="Waiting_approval" {{ isset($status) ? ($status == 'Waiting_approval' ? 'selected':''):'' }}>{{trans('cruds.proposal.fields.Waiting_approval')}}</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">


                <div class="text-left" style=" margin-left: 15px;">
                    <button type="submit"  class="btn btn-info">Submit</button>
                    <a type="button" href="{{ route('sales.admin.proposals.index') }}" class="btn btn-default">Reset</a>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>
</form>
<!-- *************************************** Filter card  *****************************************-->

<div class="card">
    <div class="card-header">
        {{ trans('cruds.proposal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
     
    <!-- /btn-group -->
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Proposal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.subject') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.expire_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposal.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                
                </thead>
                <tbody>
                    @foreach($proposals as $key => $proposal)
                    <tr data-entry-id="{{ $proposal->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $proposal->id ?? '' }}
                        </td>
                        <td>
                            {{ $proposal->subject ?? '' }}
                        </td>
                        <td>
                            {{ $proposal->proposal_date ?? '' }}
                        </td>
                        <td>
                            {{ $proposal->expire_date ?? '' }}
                        </td>
                        <td>
                            {{ $proposal->status ?? '' }}
                        </td>
                        <td>

                            @if(!isset($delete))
                            @can('proposal_show')
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('sales.admin.proposals.show', $proposal->id) }}"
                                   title=" {{ trans('global.view') }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                            @endcan
                            @can('proposal_edit')
                                <a class="btn btn-xs btn-info"
                                   href="{{ route('sales.admin.proposals.edit', $proposal->id) }}"
                                   title="{{ trans('global.edit') }}">
                                    <span class="fa fa-pencil-square-o"></span>
                                </a>
                            @endcan
                            @can('proposal_create')
                            <form action="{{ route('sales.admin.proposals.cloneproposal', $proposal->id) }}"
                                method="POST"
                                onsubmit="return confirm('{{ trans('cruds.messages.sure_clone_proposal') }}');"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-secondary"
                                title="{{ trans('global.clone') }}"> <span class="fa fa-copy"></span> </button>
                               </form>      
                              
                            @endcan

                        
                            @can('proposal_delete')
                                <form action="{{ route('sales.admin.proposals.destroy', $proposal->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger"
                                           value="{{ trans('global.delete') }}">
                                </form>
                            @endcan
                        @else
                            @can('proposal_delete')
                                <form action="#"
                                      method="POST"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="action" value="restore">
                                    <input type="submit" class="btn btn-xs btn-success"
                                           value="{{ trans('global.restore') }}">
                                </form>
                                <form action="#"
                                      method="POST"
                                      onsubmit="return confirm('{{trans('cruds.messages.proposal_force_delete')}} \n{{ trans('global.areYouSure') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="action" value="force_delete">
                                    <input type="submit" class="btn btn-xs btn-danger"
                                           value="{{ trans('global.forcedelete') }}">
                                </form>
                            @endcan
                        @endif
                          

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('proposal_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('sales.admin.proposals.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected ') }}')

                    return
                }

                if (confirm('{{ trans('global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function () {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [
                [1, 'desc']
            ],
            pageLength: 25,
        });
        let table = $('.datatable-Proposal:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
        $('.datatable thead').on('input', '.search', function () {
            let strict = $(this).attr('strict') || false
            let value = strict && this.value ? "^" + this.value + "$" : this.valuetable.column($(this).parent().index()).search(value, strict) .draw()
        });

        // $('#statusfilter').on('change', function () {
        // table
        //     .column(5)
        //     .search($(this).val())
        //     .draw()
        // });
        
    })

</script>
@endsection
