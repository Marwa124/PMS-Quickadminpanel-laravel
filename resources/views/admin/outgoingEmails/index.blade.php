@extends('layouts.admin')
@section('content')
@can('outgoing_email_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.outgoing-emails.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.outgoingEmail.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.outgoingEmail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OutgoingEmail">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.send_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.send_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.delivered') }}
                        </th>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outgoingEmails as $key => $outgoingEmail)
                        <tr data-entry-id="{{ $outgoingEmail->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $outgoingEmail->id ?? '' }}
                            </td>
                            <td>
                                {{ $outgoingEmail->send_to ?? '' }}
                            </td>
                            <td>
                                {{ $outgoingEmail->send_from ?? '' }}
                            </td>
                            <td>
                                {{ $outgoingEmail->delivered ?? '' }}
                            </td>
                            <td>
                                {{ $outgoingEmail->created_at ?? '' }}
                            </td>
                            <td>
                                @can('outgoing_email_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.outgoing-emails.show', $outgoingEmail->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('outgoing_email_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.outgoing-emails.edit', $outgoingEmail->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('outgoing_email_delete')
                                    <form action="{{ route('admin.outgoing-emails.destroy', $outgoingEmail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('outgoing_email_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.outgoing-emails.massDestroy') }}",
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
  let table = $('.datatable-OutgoingEmail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection