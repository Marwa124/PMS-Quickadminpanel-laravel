@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    @can('work_tracking_create')
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{ route('projectmanagement.admin.work-trackings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.workTracking.title_singular') }}
            </a>
        </div>
    @endcan

    @can('work_tracking_delete')
        <div style="margin: 10px;" class="row d-flex ml-auto">
            <div class="col-lg-6 ">
                <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                   href="{{$trashed ? route('projectmanagement.admin.work-trackings.index') : route('projectmanagement.admin.work-trackings.trashed.index')}}">

                    {{ $trashed ? trans('cruds.status.active') : trans('cruds.status.trashed') }} {{ trans('cruds.workTracking.title') }}

                </a>

            </div>
        </div>
    @endcan
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.workTracking.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WorkTracking">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.workTracking.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.workTracking.fields.subject') }}
                        </th>
                        <th>
                            {{ trans('cruds.workTracking.fields.work_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.workTracking.fields.achievement') }}
                        </th>
                        <th>
                            {{ trans('cruds.workTracking.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.workTracking.fields.end_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workTrackings as $key => $workTracking)
                        <tr data-entry-id="{{ $workTracking->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $workTracking->id ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('projectmanagement.admin.work-trackings.show', $workTracking->id) }}">
                                    {{ $workTracking->subject ?? '' }}
                                </a>

                            </td>
                            <td>
                                {{ $workTracking->work_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $workTracking->achievement ?? '' }}
                            </td>
                            <td>
                                {{ $workTracking->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $workTracking->end_date ?? '' }}
                            </td>
                            <td>
                                @if(!$trashed)
                                    @can('work_tracking_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.work-trackings.show', $workTracking->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endcan

                                    @can('work_tracking_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.work-trackings.edit', $workTracking->id) }}">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </a>
                                    @endcan

                                    @can('work_tracking_delete')
                                        <form action="{{ route('projectmanagement.admin.work-trackings.destroy', $workTracking->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @else
                                    @can('work_tracking_delete')
                                        <form action="{{ route('projectmanagement.admin.work-trackings.forceDestroy', $workTracking->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="restore">
                                            <input type="submit" class="btn btn-xs btn-success" value="{{ trans('global.restore') }}">
                                        </form>
                                        <form action="{{ route('projectmanagement.admin.work-trackings.forceDestroy', $workTracking->id) }}" method="POST" onsubmit="return confirm('{{trans('cruds.messages.work_tracking_force_delete')}} \n{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="force_delete">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.forcedelete') }}">
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

    @if(!$trashed)
        @can('work_tracking_delete')
          let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
          let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('projectmanagement.admin.work-trackings.massDestroy') }}",
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
    @endif

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-WorkTracking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
