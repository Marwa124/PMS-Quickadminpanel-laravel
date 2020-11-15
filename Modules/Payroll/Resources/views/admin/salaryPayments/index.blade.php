@extends('layouts.admin')
@section('content')
@can('salary_payment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.salary-payments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salaryPayment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryPayment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryPayment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.payment_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.fine_deductio') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.payment_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.paid_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaryPayments as $key => $salaryPayment)
                        <tr data-entry-id="{{ $salaryPayment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salaryPayment->id ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayment->payment_amount ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayment->fine_deductio ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayment->payment_type ?? '' }}
                            </td>
                            <td>
                                {{ $salaryPayment->paid_date ?? '' }}
                            </td>
                            <td>
                                @can('salary_payment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.salary-payments.show', $salaryPayment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('salary_payment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.salary-payments.edit', $salaryPayment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('salary_payment_delete')
                                    <form action="{{ route('admin.salary-payments.destroy', $salaryPayment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('salary_payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salary-payments.massDestroy') }}",
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
  let table = $('.datatable-SalaryPayment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection