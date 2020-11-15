@extends('layouts.admin')
@section('content')
@can('set_time_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.set-times.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.setTime.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.setTime.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SetTime">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.setTime.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.setTime.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.setTime.fields.in_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.setTime.fields.out_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.setTime.fields.allow_clock_in_late') }}
                        </th>
                        <th>
                            {{ trans('cruds.setTime.fields.allow_leave_early') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($setTimes as $key => $setTime)
                        <tr data-entry-id="{{ $setTime->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $setTime->id ?? '' }}
                            </td>
                            <td>
                                {{ $setTime->name ?? '' }}
                            </td>
                            <td>
                                {{ $setTime->in_time ?? '' }}
                            </td>
                            <td>
                                {{ $setTime->out_time ?? '' }}
                            </td>
                            <td>
                                {{ $setTime->allow_clock_in_late ?? '' }}
                            </td>
                            <td>
                                {{ $setTime->allow_leave_early ?? '' }}
                            </td>
                            <td>
                                @can('set_time_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('hr.admin.set-times.show', $setTime->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('set_time_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('hr.admin.set-times.edit', $setTime->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('set_time_delete')
                                    <form action="{{ route('hr.admin.set-times.destroy', $setTime->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('set_time_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.set-times.massDestroy') }}",
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
  let table = $('.datatable-SetTime:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
