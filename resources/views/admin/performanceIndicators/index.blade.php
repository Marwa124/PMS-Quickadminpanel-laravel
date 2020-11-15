@extends('layouts.admin')
@section('content')
@can('performance_indicator_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.performance-indicators.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.performanceIndicator.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.performanceIndicator.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PerformanceIndicator">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.designation') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.customer_technical_experience') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.marketing') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.management') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.administration') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.presentation_skill') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.quantity_of_work') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.efficiency') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.integrity') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.profissionalism') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.team_work') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.critical_thinking') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.conflict_management') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.attendance') }}
                        </th>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.ability_to_meet_deadline') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($performanceIndicators as $key => $performanceIndicator)
                        <tr data-entry-id="{{ $performanceIndicator->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $performanceIndicator->id ?? '' }}
                            </td>
                            <td>
                                {{ $performanceIndicator->designation->designation_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::CUSTOMER_TECHNICAL_EXPERIENCE_SELECT[$performanceIndicator->customer_technical_experience] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::MARKETING_SELECT[$performanceIndicator->marketing] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::MANAGEMENT_SELECT[$performanceIndicator->management] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::ADMINISTRATION_SELECT[$performanceIndicator->administration] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::PRESENTATION_SKILL_SELECT[$performanceIndicator->presentation_skill] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::QUANTITY_OF_WORK_SELECT[$performanceIndicator->quantity_of_work] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::EFFICIENCY_SELECT[$performanceIndicator->efficiency] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::INTEGRITY_SELECT[$performanceIndicator->integrity] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::PROFISSIONALISM_SELECT[$performanceIndicator->profissionalism] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::TEAM_WORK_SELECT[$performanceIndicator->team_work] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::CRITICAL_THINKING_SELECT[$performanceIndicator->critical_thinking] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::CONFLICT_MANAGEMENT_SELECT[$performanceIndicator->conflict_management] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerformanceIndicator::ATTENDANCE_SELECT[$performanceIndicator->attendance] ?? '' }}
                            </td>
                            <td>
                                {{ $performanceIndicator->ability_to_meet_deadline ?? '' }}
                            </td>
                            <td>
                                @can('performance_indicator_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.performance-indicators.show', $performanceIndicator->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('performance_indicator_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.performance-indicators.edit', $performanceIndicator->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('performance_indicator_delete')
                                    <form action="{{ route('admin.performance-indicators.destroy', $performanceIndicator->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('performance_indicator_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.performance-indicators.massDestroy') }}",
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
  let table = $('.datatable-PerformanceIndicator:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection