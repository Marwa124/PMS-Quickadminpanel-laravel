@extends('layouts.admin')
@section('content')
@can('proposals_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('sales.admin.proposals-items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.proposalsItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.proposalsItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ProposalsItem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.proposals') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.group_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.part') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.tax_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsItem.fields.unit') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($proposals as $key => $item)
                                    <option value="{{ $item->reference_no }}">{{ $item->reference_no }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proposalsItems as $key => $proposalsItem)
                        <tr data-entry-id="{{ $proposalsItem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $proposalsItem->id ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->proposals->reference_no ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->name ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->group_name ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->brand ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->part ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->tax_name ?? '' }}
                            </td>
                            <td>
                                {{ $proposalsItem->unit ?? '' }}
                            </td>
                            <td>
                                @can('proposals_item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('sales.admin.proposals-items.show', $proposalsItem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('proposals_item_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('sales.admin.proposals-items.edit', $proposalsItem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('proposals_item_delete')
                                    <form action="{{ route('sales.admin.proposals-items.destroy', $proposalsItem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('proposals_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('sales.admin.proposals-items.massDestroy') }}",
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
  let table = $('.datatable-ProposalsItem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection