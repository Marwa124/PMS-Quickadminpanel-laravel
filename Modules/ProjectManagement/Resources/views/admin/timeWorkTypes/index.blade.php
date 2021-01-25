@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    @can('time_work_type_create')
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{ route('projectmanagement.admin.time-work-types.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timeWorkType.title_singular') }}
            </a>
        </div>
    @endcan

    @can('time_work_type_delete')
        <div style="margin: 10px;" class="row d-flex ml-auto">
            <div class="col-lg-6 ">
                <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                   href="{{$trashed ? route('projectmanagement.admin.time-work-types.index') : route('projectmanagement.admin.time-work-types.trashed.index')}}">

                    {{ $trashed ? 'Active ' : 'Trashed ' }} {{ trans('cruds.timeWorkType.title') }}

                </a>

            </div>
        </div>
    @endcan
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeWorkType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TimeWorkType">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.timeWorkType.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeWorkType.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeWorkType.fields.tbl_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeWorkType.fields.query') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeWorkTypes as $key => $timeWorkType)
                        <tr data-entry-id="{{ $timeWorkType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timeWorkType->id ?? '' }}
                            </td>
                            <td>
                                {{ $timeWorkType->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeWorkType->tbl_name ?? '' }}
                            </td>
                            <td>
                                {{ $timeWorkType->query ?? '' }}
                            </td>
                            <td>
                                @if(!$trashed)
                                    @can('time_work_type_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.time-work-types.show', $timeWorkType->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endcan

                                    @can('time_work_type_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.time-work-types.edit', $timeWorkType->id) }}">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </a>
                                    @endcan

                                    @can('time_work_type_delete')
                                        <form action="{{ route('projectmanagement.admin.time-work-types.destroy', $timeWorkType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @else
                                    @can('time_work_type_delete')
                                        <form action="{{ route('projectmanagement.admin.time-work-types.forceDestroy', $timeWorkType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="restore">
                                            <input type="submit" class="btn btn-xs btn-success" value="{{ trans('global.restore') }}">
                                        </form>
                                        <form action="{{ route('projectmanagement.admin.time-work-types.forceDestroy', $timeWorkType->id) }}" method="POST" onsubmit="return confirm('Time Work Type Will Force Delete ..! \n{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        @can('time_work_type_delete')
          let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
          let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('projectmanagement.admin.time-work-types.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-TimeWorkType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection