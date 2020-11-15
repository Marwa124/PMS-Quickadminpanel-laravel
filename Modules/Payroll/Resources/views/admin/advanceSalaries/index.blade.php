@extends('layouts.admin')
@section('content')
@can('advance_salary_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('payroll.admin.advance-salaries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.advanceSalary.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.advanceSalary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AdvanceSalary">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.advance_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.deduct_month') }}
                        </th>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.request_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.advanceSalary.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($advanceSalaries as $key => $advanceSalary)
                        <tr data-entry-id="{{ $advanceSalary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $advanceSalary->id ?? '' }}
                            </td>
                            <td>
                                {{ $advanceSalary->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $advanceSalary->advance_amount ?? '' }}
                            </td>
                            <td>
                                {{ $advanceSalary->deduct_month ?? '' }}
                            </td>
                            <td>
                                {{ $advanceSalary->request_date ?? '' }}
                            </td>
                            <td>
                                {{ $advanceSalary->status ?? '' }}
                            </td>
                            <td>
                                @can('advance_salary_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('payroll.admin.advance-salaries.show', $advanceSalary->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('advance_salary_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('payroll.admin.advance-salaries.edit', $advanceSalary->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('advance_salary_delete')
                                    <form action="{{ route('payroll.admin.advance-salaries.destroy', $advanceSalary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('advance_salary_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('payroll.admin.advance-salaries.massDestroy') }}",
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
  let table = $('.datatable-AdvanceSalary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
