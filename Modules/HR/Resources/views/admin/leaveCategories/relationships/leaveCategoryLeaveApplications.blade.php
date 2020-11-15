@can('leave_application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.leave-applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.leaveApplication.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.leaveApplication.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-leaveCategoryLeaveApplications">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.hours') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_end_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveApplications as $key => $leaveApplication)
                        <tr data-entry-id="{{ $leaveApplication->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $leaveApplication->id ?? '' }}
                            </td>
                            <td>
                                {{ $leaveApplication->leave_category->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LeaveApplication::LEAVE_TYPE_SELECT[$leaveApplication->leave_type] ?? '' }}
                            </td>
                            <td>
                                {{ $leaveApplication->hours ?? '' }}
                            </td>
                            <td>
                                {{ $leaveApplication->leave_start_date ?? '' }}
                            </td>
                            <td>
                                {{ $leaveApplication->leave_end_date ?? '' }}
                            </td>
                            <td>
                                @can('leave_application_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('hr.admin.leave-applications.show', $leaveApplication->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('leave_application_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('hr.admin.leave-applications.edit', $leaveApplication->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('leave_application_delete')
                                    <form action="{{ route('hr.admin.leave-applications.destroy', $leaveApplication->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('leave_application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.leave-applications.massDestroy') }}",
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
  });
  let table = $('.datatable-leaveCategoryLeaveApplications:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection