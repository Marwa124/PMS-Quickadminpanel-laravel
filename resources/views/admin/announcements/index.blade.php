@extends('layouts.admin')
@section('content')
@can('announcement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.announcements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.announcement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.announcement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Announcement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.announcement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.announcement.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.announcement.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.announcement.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.announcement.fields.end_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $key => $announcement)
                        <tr data-entry-id="{{ $announcement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $announcement->id ?? '' }}
                            </td>
                            <td>
                                {{ $announcement->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Announcement::STATUS_SELECT[$announcement->status] ?? '' }}
                            </td>
                            <td>
                                {{ $announcement->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $announcement->end_date ?? '' }}
                            </td>
                            <td>
                                @can('announcement_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.announcements.show', $announcement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('announcement_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.announcements.edit', $announcement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('announcement_delete')
                                    <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('announcement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.announcements.massDestroy') }}",
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
  let table = $('.datatable-Announcement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection