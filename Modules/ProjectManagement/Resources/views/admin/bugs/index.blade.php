@extends('layouts.admin')
@section('content')
@can('bug_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('projectmanagement.admin.bugs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bug.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bug.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Bug">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th >
                            {{ trans('cruds.bug.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.fields.task') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.title_singular') }} {{ trans('cruds.bug.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.title_singular') }} {{ trans('cruds.bug.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.fields.priority') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.fields.severity') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.fields.reporter') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td >
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" >
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" >


                        </td>
                        <td >
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" >

                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">

                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                <option value="unconfirmed">Unconfirmed</option>
                                <option value="confirmed"  >Confirmed</option>
                                <option value="in progress">In Progress</option>
                                <option value="resolved"   >Resolved</option>
                                <option value="verified"   >Verified</option>
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                <option value="low"   >Low</option>
                                <option value="medium">Medium</option>
                                <option value="high"  >High</option>
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                <option value="minor"        >Minor</option>
                                <option value="major"        >Major</option>
                                <option value="show stopper" >Show Stopper</option>
                                <option value="must be fixed">Must be Fixed</option>
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" >

                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @if($bugs)
                        @forelse($bugs as $key => $bug)
                            <tr data-entry-id="{{ $bug->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $bug->id ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->project->name ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->task->name ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->name ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->status ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->priority ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->severity ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->reporterBy->name ?? '' }}
                                </td>
                                <td>
                                    @can('bug_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.bugs.show', $bug->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endcan

                                    @can('bug_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.bugs.edit', $bug->id) }}">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </a>
                                    @endcan
                                    @can('bug_assign_to')

                                        <a class="btn btn-xs btn-success {{$bug->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.bugs.getAssignTo', $bug->id) }}" title="{{$bug->project->department ? '' : 'add department to project'}}" >
                                            {{ trans('global.assign_to') }}
                                        </a>

                                    @endcan

                                    @can('bug_delete')
                                        <form action="{{ route('projectmanagement.admin.bugs.destroy', $bug->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bug_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('projectmanagement.admin.bugs.massDestroy') }}",
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
  let table = $('.datatable-Bug:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
