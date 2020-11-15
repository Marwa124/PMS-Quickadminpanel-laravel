@extends('layouts.admin')
@section('content')
@can('transfer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transfers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transfer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transfer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Transfer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.to_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.from_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfer.fields.type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transfers as $key => $transfer)
                        <tr data-entry-id="{{ $transfer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transfer->id ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->to_account ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->from_account ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->amount ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->payment_method->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Transfer::STATUS_SELECT[$transfer->status] ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->date ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->type ?? '' }}
                            </td>
                            <td>
                                @can('transfer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transfers.show', $transfer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transfer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transfers.edit', $transfer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transfer_delete')
                                    <form action="{{ route('admin.transfers.destroy', $transfer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('transfer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transfers.massDestroy') }}",
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
  let table = $('.datatable-Transfer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection