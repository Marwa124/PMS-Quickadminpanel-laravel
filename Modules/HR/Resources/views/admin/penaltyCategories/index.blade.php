@extends('layouts.admin')
@section('title')
| {{ trans('cruds.penaltyCategory.title_singular') }}
@endsection
@section('content')
@can('penalty_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.penalty-categories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.penaltyCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.penaltyCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PenaltyCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.fine_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.penelty_days') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penaltyCategories as $key => $penaltyCategory)
                        <tr data-entry-id="{{ $penaltyCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $penaltyCategory->type ?? '' }}
                            </td>
                            <td>
                                {{ $penaltyCategory->fine_amount ?? '' }}
                            </td>
                            <td>
                                {{ $penaltyCategory->penelty_days ?? '' }}
                            </td>
                            <td>

                                @can('penalty_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('hr.admin.penalty-categories.edit', $penaltyCategory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('penalty_category_delete')
                                    <form action="{{ route('hr.admin.penalty-categories.destroy', $penaltyCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('penalty_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.penalty-categories.massDestroy') }}",
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
          .done(function (data) { 
                for (let x = 0; x < data.ids.length; x++) {
                    $("tbody").find(`[data-entry-id='${data.ids[x]}']`).remove();
                }
           })
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
  let table = $('.datatable-PenaltyCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection