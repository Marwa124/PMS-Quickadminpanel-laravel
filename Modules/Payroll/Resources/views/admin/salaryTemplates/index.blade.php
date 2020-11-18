@extends('layouts.admin')
@section('content')
@can('salary_template_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('payroll.admin.salary-templates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salaryTemplate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryTemplate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryTemplate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.salary_grade') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.basic_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryTemplate.fields.overtime_salary') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaryTemplates as $key => $salaryTemplate)
                        <tr data-entry-id="{{ $salaryTemplate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salaryTemplate->id ?? '' }}
                            </td>
                            <td>
                                {{ $salaryTemplate->salary_grade ?? '' }}
                            </td>
                            <td>
                                <?php echo 'EGP '.number_format($salaryTemplate->basic_salary, 2); ?>
                                {{-- {{ $salaryTemplate->basic_salary ?? '' }} --}}
                            </td>
                            <td>
                                <?php echo 'EGP '.number_format($salaryTemplate->overtime_salary, 2); ?>
                                {{-- {{ $salaryTemplate->overtime_salary ?? '' }} --}}
                            </td>
                            <td>
                                <div class="defaultBtns">

                                    @can('salary_template_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('payroll.admin.salary-templates.show', $salaryTemplate->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('salary_template_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('payroll.admin.salary-templates.edit', $salaryTemplate->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('salary_template_delete')
                                        <form action="{{ route('payroll.admin.salary-templates.destroy', $salaryTemplate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </div>
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
@can('salary_template_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('payroll.admin.salary-templates.massDestroy') }}",
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
  let table = $('.datatable-SalaryTemplate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection