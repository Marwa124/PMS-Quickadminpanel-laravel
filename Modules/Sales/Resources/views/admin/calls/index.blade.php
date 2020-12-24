@extends('layouts.admin')
@section('content')

@can('calls_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('sales.admin.calls.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.calls.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.calls.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-calls">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        
                        <th>
                            {{ trans('cruds.calls.fields.call_status_assgin') }}
                        </th>
                        <th>
                            {{ trans('cruds.calls.fields.data_contact') }}
                        </th>

                        <th>
                            {{ trans('cruds.calls.fields.lead_qualification') }}
                        </th>
                        <th>
                            {{ trans('cruds.calls.fields.call_breif') }}
                        </th>
                        <th>
                            {{ trans('cruds.calls.fields.nextaction') }}
                        </th>
                        <th>
                            {{ trans('cruds.calls.fields.nextactiondate') }}
                        </th>
                        <th>
                            {{ trans('cruds.calls.fields.leadcompany') }}
                        </th>
                        <th>
                            {{ trans('cruds.calls.fields.firstorsecond') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    {{-- <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr> --}}
                </thead>
                <tbody>
                   
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
@can('calls_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('sales.admin.calls.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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
          .done(function () { 
            //   location.reload() 
              })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan


// 
let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    scrollX:true,
    fixedHeader: true,
    aaSorting: [],
    ajax: {
        url: "{{ route('sales.admin.calls.getdata') }}",
        type: 'get',
            data: function (d) {
                
            }
    },
    // ajax: "{{ route('hr.admin.leave-applications.index') }}",
    columns: [
                    {data: 'id'},
                    { data:'result',name:'result.name' , orderable: false, searchable: false},
                    { data:'date'},
                    { data:'qualification'},
                    { data:'note'},
                    { data:'next_action'},
                    { data:'next_action_date'},
                    { data:'company',name:"lead.company"},
                    { data:'call'},
                    { data:'actions'},
    ],
    // orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
    createdRow: (row, data, dataIndex, cells) => {
        $(cells[6]).css('background-color', data.status_color)
    },
  };

 
  let table = $('.datatable-calls').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
// 

})
</script>

@endsection