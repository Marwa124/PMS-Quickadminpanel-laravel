@extends('layouts.admin')
@section('content')
@can('task_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('projectmanagement.admin.tasks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.task.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Task">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.task.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.attachment') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.due_date') }}
                        </th>

                        <th>
                            {{ trans('cruds.task.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.milestone') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" style="width: 100px">
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
                                @forelse($task_statuses as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @forelse($task_tags as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
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
                    @if($tasks)
                        @forelse($tasks as $key => $task)
                            <tr data-entry-id="{{ $task->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $task->id ?? '' }}
                                </td>
                                <td>
                                    {{ $task->name ?? '' }}
                                    <div class="progress" >
                                        <div class="progress-bar {{$task->calculate_progress < 50 ? 'bg-danger':'bg-success'}}" role="progressbar" style="width: {{$task->calculate_progress}}%; display: {{$task->calculate_progress?:'none'}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            {{$task->calculate_progress}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $task->description ?? '' }}
                                </td>
                                <td>
                                    {{ $task->status->name ?? '' }}
                                </td>
                                <td>
                                    @forelse($task->tags as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    @if($task->attachment)
                                        <a href="{{ $task->attachment->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $task->start_date ?? '' }}
                                </td>
                                <td>
                                    {{ $task->due_date ?? '' }}
                                </td>

                                <td>
                                    {{ $task->project->name ?? '' }}
                                </td>
                                <td>
                                    {{ $task->milestone->name ?? '' }}
                                </td>

                                <td>
                                    @can('task_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.tasks.show', $task->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endcan

                                    @can('task_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.tasks.edit', $task->id) }}">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </a>
                                    @endcan

                                    @can('task_assign_to')

                                        <a class="btn btn-xs btn-success {{$task->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.tasks.getAssignTo', $task->id) }}" title="{{$task->project->department ? '' : 'add department to project'}}" >
                                            {{ trans('global.assign_to') }}
                                        </a>

                                    @endcan

                                    @can('task_delete')
                                        <form action="{{ route('projectmanagement.admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @empty
                        @endforelse
                    @endif
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
@can('task_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('projectmanagement.admin.tasks.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Task:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
