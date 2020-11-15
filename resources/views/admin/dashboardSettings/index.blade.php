@extends('layouts.admin')
@section('content')
@can('dashboard_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dashboard-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dashboardSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dashboardSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DashboardSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.col') }}
                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.order_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.report') }}
                        </th>
                        <th>
                            {{ trans('cruds.dashboardSetting.fields.for_staff') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dashboardSettings as $key => $dashboardSetting)
                        <tr data-entry-id="{{ $dashboardSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dashboardSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $dashboardSetting->name ?? '' }}
                            </td>
                            <td>
                                {{ $dashboardSetting->col ?? '' }}
                            </td>
                            <td>
                                {{ $dashboardSetting->order_no ?? '' }}
                            </td>
                            <td>
                                {{ $dashboardSetting->status ?? '' }}
                            </td>
                            <td>
                                {{ $dashboardSetting->report ?? '' }}
                            </td>
                            <td>
                                {{ $dashboardSetting->for_staff ?? '' }}
                            </td>
                            <td>


                                @can('dashboard_setting_delete')
                                    <form action="{{ route('admin.dashboard-settings.destroy', $dashboardSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dashboard_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dashboard-settings.massDestroy') }}",
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
  let table = $('.datatable-DashboardSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection