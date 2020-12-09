@extends('layouts.admin')
@section('content')
@can('project_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('projectmanagement.admin.projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Project">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.client') }}
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.progress') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.calculate_progress') }}--}}
{{--                        </th>--}}
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.end_date') }}
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.actual_completion') }}--}}
{{--                        </th>--}}
                        <th>
                            {{ trans('cruds.task.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.milestone.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.project_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.department.title_singular') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" style="width: 110px;">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" >
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($clients as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
{{--                        <td>--}}
{{--                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                        </td>--}}
                        <td>
                        </td>
                        <td>
                        </td>
{{--                        <td>--}}
{{--                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                        </td>--}}
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" style="width: 110px;">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}" >
                        </td>
{{--                        <td>--}}
{{--                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                        </td>--}}
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $project)
                        <tr data-entry-id="{{ $project->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $project->id ?? '' }}
                            </td>
                            <td>
                                {{ ucwords($project->name ?? '') }}<br>
                                <div class="progress" >
                                    <div class="progress-bar {{$project->calculate_progress < 50 ? 'bg-danger':'bg-success'}}" role="progressbar" style="width: {{$project->calculate_progress}}%; display: {{$project->calculate_progress?:'none'}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        {{$project->calculate_progress}}%
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $project->client->name ?? '' }}
                            </td>
{{--                            <td>--}}

{{--                                {{ $project->progress == 'through_tasks' ? 'Through Tasks' : '' }}--}}
{{--                                {{ $project->progress == 'project_hours' ? 'Project Hours' : '' }}--}}
{{--                            </td>--}}
{{--                                {{ $project->progress == 'through_tasks' ? 'Through Tasks' :  $project->progress == 'project_hours' ? 'Project Hours' : ''  }}--}}
{{--                            <td>--}}
{{--                                {{ $project->calculate_progress ? $project->calculate_progress .'%' : '' }}--}}
{{--                            </td>--}}
                            <td>
                                {{ $project->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $project->end_date ?? '' }}
                            </td>

                            <td>
{{--                                {{ $project->with_tasks ?? 'No' }}--}}
                                @if($project->with_tasks && $project->tasks)
                                    <a class="btn btn-info {{$project->tasks && $project->tasks->count()>0 ? '':'disabled'}}" >
                                        {{$project->tasks->count()>0 ? $project->tasks->count():'No Tasks'}}
                                    </a>
                                @else
                                    <a class="btn btn-info disabled" >
                                        No Tasks
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('projectmanagement.admin.milestones.index')}}" class="btn btn-info {{$project->milestones && $project->milestones->count()>0 ? '':'disabled'}}" >
                                    {{$project->milestones && $project->milestones->count()>0 ? $project->milestones->count():'No Milestone'}}
                                </a>
                            </td>
                            <td>
                                {{ $project->project_status ?? '' }}
                            </td>
                            <td>
                                {{ $project->department->department_name ?? '' }}
                            </td>
{{--                            <td>--}}
{{--                                @forelse($project->accountDetails as $accountDetail)--}}
{{--                                    {{ $accountDetail->fullname ?? '' }},--}}
{{--                                @empty--}}
{{--                                @endforelse--}}
{{--                            </td>--}}
                            <td>
                                @can('project_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.projects.show', $project->id) }}" title=" {{ trans('global.view') }}">
{{--                                        {{ trans('global.view') }}--}}
                                        <span class="fa fa-eye"></span>
                                    </a>
                                @endcan
                                @can('project_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.projects.edit', $project->id) }}" title="{{ trans('global.edit') }}">
{{--                                        {{ trans('global.edit') }}--}}
                                        <span class="fa fa-pencil-square-o"></span>
                                    </a>
                                @endcan

                                @can('project_assign_to')

                                    <a class="btn btn-xs btn-success {{$project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.projects.getAssignTo', $project->id) }}" title="{{$project->department ? '' : 'add department to project'}}" >
                                        {{ trans('global.assign_to') }}
                                    </a>

                                @endcan

                                @can('project_delete')
                                    <form action="{{ route('projectmanagement.admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('projectmanagement.admin.projects.massDestroy') }}",
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
  let table = $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
