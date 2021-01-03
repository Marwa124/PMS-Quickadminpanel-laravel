@extends('layouts.admin')
@section('content')
@can('attendances_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.attendances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.attendances.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.attendances.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-attendances">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.leave_application') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.date_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.date_out') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.attendance_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $key => $attendances)
                        <tr data-entry-id="{{ $attendances->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $attendances->id ?? '' }}
                            </td>
                            <td>
                                {{ $attendances->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $attendances->leave_application->leave_type ?? '' }}
                            </td>
                            <td>
                                {{ $attendances->date_in ?? '' }}
                            </td>
                            <td>
                                {{ $attendances->date_out ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\attendances::ATTENDANCE_STATUS_SELECT[$attendances->attendance_status] ?? '' }}
                            </td>
                            <td>
                                @can('attendances_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.attendances.show', $attendances->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('attendances_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.attendances.edit', $attendances->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('attendances_delete')
                                    <form action="{{ route('hr.admin.attendances.destroy', $attendances->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('attendances_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.attendances.massDestroy') }}",
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
  let table = $('.datatable-attendances:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
