

@extends('layouts.admin')
@section('content')
<div class="row">
   {{-- @can('leave_application_create') --}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success"  data-toggle="modal" data-target="#modal_Add">
                    {{ trans('global.add') }} {{ trans('cruds.lead.title_singular') }}
                </a>
            </div>
        </div>
   {{-- @endcan --}}


{{--***********************create model******************************--}}

    <!-- Modal -->

    <div class="modal fade bd-example-modal-lg" id="modal_Add" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{route('sales.admin.leads.store')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        @include('sales::admin.leads.form', ['codes' => $codes,'types'=>$types])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal -->

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{route('sales.admin.leads.update','')}}" method="post" id="leadedit">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        @include('sales::admin.leads.edit', ['codes' => $codes,'types'=>$types])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->


{{--***********************end create ******************************--}}


</div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.lead.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
      <div class="table-responsive" style="overflow-x: hidden !important;">
        <table class="display responsive nowrap table table-bordered table-striped table-hover  datatable datatable-leads ">
            <thead>
                <tr>
                        <th>  {{ trans('cruds.lead.fields.id') }}</th>
                        <th>  {{ trans('cruds.lead.fields.name') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Date') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Type') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Product') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Client_Name') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Company') }}</th>
                        <th>  {{ trans('cruds.lead.fields.WWW') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Phone_1') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Phone_2') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Email') }}</th>
                        <th>  {{ trans('cruds.lead.fields.first_call_By') }}</th>
                        <th>  {{ trans('cruds.lead.fields.WAY_OF_Communication') }}</th>
                        <th>  {{ trans('cruds.lead.fields.DATE_CONTACTED') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Contacted?') }}</th>
                        <th>  {{ trans('cruds.lead.fields.1st_assgin') }}</th>
                        <th>  {{ trans('cruds.lead.fields.2st_assgin') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Note') }}</th>
                        <th>  {{ trans('cruds.lead.fields.firstCall_result') }}</th>
                        <th>  {{ trans('cruds.lead.fields.secondCall') }}</th>
                        <th>  {{ trans('cruds.lead.fields.NEXT_ACTION_DATE') }}</th>
                        <th>  {{ trans('cruds.lead.fields.Priority') }}</th>
                        <th> &nbsp;</th>
                    
                </tr>
            </thead>
            <tbody>
                {{-- leads --}}
             @foreach($leads as $key => $lead)
            <tr data-entry-id="{{ $lead->id }}" class="{{$loop->iteration}}">
                    <td></td>
                    <td><a href="{{route('sales.admin.leads.show',$lead->id)}}">{{$lead->client_name}}</a></td>
                    <td>{{\Carbon\Carbon::parse($lead->created_at)->toDateString() ?? ''}}</td>
                    <td>{{$lead->type->name ?? ''}}</td>
                    <td>{{ $lead->product ?? ''}}</td>
                    <td><a href="{{route('sales.admin.leads.show',$lead->id)}}">{{$lead->client_name}}</a></td>
                    <td>{{$lead->company ?? ''}}</td>
                    <td>{{$lead->site_url ?? ''}}</td>
                    <td>{{$lead->phone1 ?? ''}}</td>
                    <td>{{$lead->phone2 ?? ''}}</td>
                    <td>{{$lead->email ?? ''}}</td>
                    <td>{{$lead->firstCall->call_by  ?? ''}}</td>
                    <td>{{$lead->way_of_communication ?? ''}}</td>
                    <td>{{$lead->contacted_date ?? ''}}</td>
                    <td>{{$lead->contracted ?? ''}}</td>
                    <td>{{$lead->addby->fullname ?? ''}}</td>
                    <td>{{$lead->secondassign->leadusersss->fullname ?? ''}}</td>
                    <td>{{$lead->notes ?? ''}}</td>
                    <td>{{$lead->next_action_date ?? ''}}</td>
                    <td>{{$lead->priority ?? ''}}</td>
                    <td>{{$lead->firstCall->result->name ?? ''}}</td>
                    <td>{{$lead->secondCall->call_by ?? ''}}</td>
                    <td> &nbsp;</td>
                </tr>
             @endforeach
             {{-- {{ $leads->links() }} --}}
            </tbody>
            <tfoot>
              
                    <tr>
                            <th>  {{ trans('cruds.lead.fields.id') }}</th>
                            <th>  {{ trans('cruds.lead.fields.name') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Date') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Type') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Product') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Client_Name') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Company') }}</th>
                            <th>  {{ trans('cruds.lead.fields.WWW') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Phone_1') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Phone_2') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Email') }}</th>
                            <th>  {{ trans('cruds.lead.fields.first_call_By') }}</th>
                            <th>  {{ trans('cruds.lead.fields.WAY_OF_Communication') }}</th>
                            <th>  {{ trans('cruds.lead.fields.DATE_CONTACTED') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Contacted?') }}</th>
                            <th>  {{ trans('cruds.lead.fields.1st_assgin') }}</th>
                            <th>  {{ trans('cruds.lead.fields.2st_assgin') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Note') }}</th>
                            <th>  {{ trans('cruds.lead.fields.firstCall_result') }}</th>
                            <th>  {{ trans('cruds.lead.fields.secondCall') }}</th>
                            <th>  {{ trans('cruds.lead.fields.NEXT_ACTION_DATE') }}</th>
                            <th>  {{ trans('cruds.lead.fields.Priority') }}</th>
                            <th> &nbsp;</th>
                        
                    </tr>
                
            </tfoot>
        </table>
      </div>
   </div>



@endsection
@section('scripts')
@parent
<script>

// var table = $('#example').DataTable();
 
// #myInput is a <input type="text"> element
$('#myInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );

    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('salary_template_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('payroll.admin.salary-templates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan


$.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
    paging: true,
    lengthMenu: [ [12, 25, 50, -1], [12, 25, 50, "All"] ],
    scrollX : true,
    search:       "Search:",
  });
  let table = $('.datatable-leads:not(.ajaxTable)').DataTable({
        buttons: [dtButtons, 'colvis'],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'ui table'
                } )
            }
        }
    });


 
  
})

</script>

@endsection