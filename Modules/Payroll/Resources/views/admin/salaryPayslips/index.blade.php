@extends('layouts.admin')
@section('content')
@can('salary_payslip_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('payroll.admin.salary-payslips.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salaryPayslip.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryPayslip.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryPayslip">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.salary_payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayslip.fields.payslip_generate_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaryPayslips as $key => $salaryPayslip)
                        <tr data-entry-id="{{ $salaryPayslip->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salaryPayslip->id ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayslip->salary_payment->payment_amount ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayslip->payslip_generate_date ?? '' }}
                            </td>
                            <td>
                                @can('salary_payslip_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('payroll.admin.salary-payslips.show', $salaryPayslip->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('salary_payslip_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('payroll.admin.salary-payslips.edit', $salaryPayslip->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('salary_payslip_delete')
                                    <form action="{{ route('payroll.admin.salary-payslips.destroy', $salaryPayslip->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('salary_payslip_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('payroll.admin.salary-payslips.massDestroy') }}",
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
  let table = $('.datatable-SalaryPayslip:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection