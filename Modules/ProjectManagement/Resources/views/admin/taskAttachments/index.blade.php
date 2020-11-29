@extends('layouts.admin')
@section('content')
@can('task_attachment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('projectmanagement.admin.task-attachments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.taskAttachment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.taskAttachment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TaskAttachment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.task') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.lead') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.opportunities') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskAttachment.fields.bug') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskAttachments as $key => $taskAttachment)
                        <tr data-entry-id="{{ $taskAttachment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $taskAttachment->id ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->task->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->lead->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->opportunities->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskAttachment->bug->issue_no ?? '' }}
                            </td>
                            <td>
                                @can('task_attachment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.task-attachments.show', $taskAttachment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('task_attachment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.task-attachments.edit', $taskAttachment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('task_attachment_delete')
                                    <form action="{{ route('projectmanagement.admin.task-attachments.destroy', $taskAttachment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('task_attachment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('projectmanagement.admin.task-attachments.massDestroy') }}",
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
  let table = $('.datatable-TaskAttachment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
