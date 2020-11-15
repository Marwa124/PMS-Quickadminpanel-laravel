@extends('layouts.admin')
@section('content')
@can('tax_rate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tax-rates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.taxRate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.taxRate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TaxRate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.taxRate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.taxRate.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.taxRate.fields.rate_percent') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taxRates as $key => $taxRate)
                        <tr data-entry-id="{{ $taxRate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $taxRate->id ?? '' }}
                            </td>
                            <td>
                                {{ $taxRate->name ?? '' }}
                            </td>
                            <td>
                                {{ $taxRate->rate_percent ?? '' }}
                            </td>
                            <td>
                                @can('tax_rate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tax-rates.show', $taxRate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tax_rate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tax-rates.edit', $taxRate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tax_rate_delete')
                                    <form action="{{ route('admin.tax-rates.destroy', $taxRate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tax_rate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tax-rates.massDestroy') }}",
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
  let table = $('.datatable-TaxRate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection