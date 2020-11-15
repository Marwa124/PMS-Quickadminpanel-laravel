@extends('layouts.admin')
@section('content')
@can('lead_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.leads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.lead.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lead.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Lead">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.contact_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.interested') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.organization') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.lead_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.lead_source') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.lead_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.lead.fields.mobile') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($interested_ins as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($lead_statuses as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($lead_sources as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($lead_categories as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $key => $lead)
                        <tr data-entry-id="{{ $lead->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lead->id ?? '' }}
                            </td>
                            <td>
                                {{ $lead->name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->contact_name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->interested->name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->organization ?? '' }}
                            </td>
                            <td>
                                {{ $lead->lead_status->name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->lead_source->name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->lead_category->name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $lead->email ?? '' }}
                            </td>
                            <td>
                                {{ $lead->phone ?? '' }}
                            </td>
                            <td>
                                {{ $lead->mobile ?? '' }}
                            </td>
                            <td>
                                @can('lead_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.leads.show', $lead->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('lead_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.leads.edit', $lead->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('lead_delete')
                                    <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('lead_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.leads.massDestroy') }}",
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
  let table = $('.datatable-Lead:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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