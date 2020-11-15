@extends('layouts.admin')
@section('content')
@can('salary_payment_allowance_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('payroll.admin.salary-payment-allowances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salaryPaymentAllowance.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryPaymentAllowance.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryPaymentAllowance">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.salary_payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentAllowance.fields.value') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaryPaymentAllowances as $key => $salaryPaymentAllowance)
                        <tr data-entry-id="{{ $salaryPaymentAllowance->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salaryPaymentAllowance->id ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPaymentAllowance->salary_payment->payment_amount ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPaymentAllowance->name ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPaymentAllowance->value ?? '' }}
                            </td>
                            <td>


                                @can('salary_payment_allowance_delete')
                                    <form action="{{ route('payroll.admin.salary-payment-allowances.destroy', $salaryPaymentAllowance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('salary_payment_allowance_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('payroll.admin.salary-payment-allowances.massDestroy') }}",
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
  let table = $('.datatable-SalaryPaymentAllowance:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection