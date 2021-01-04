@extends('layouts.admin')
@section('content')
    @php
        $trashed = request()->segment(count(request()->segments())) == 'trashed'?true :false;
    @endphp
    <div class="row">
        @can('milestone_create')
            <div style="margin: 10px;" class="row">
                <div class="col-lg-8">
                    <a class="btn btn-success" href="{{ route('projectmanagement.admin.milestones.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.milestone.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        @can('milestone_delete')
            <div style="margin: 10px;" class="row d-flex ml-auto">
                <div class="col-md-6">
                    <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                       href="{{$trashed ? route('projectmanagement.admin.milestones.index') : route('projectmanagement.admin.milestones.trashed.index')}}">

                        {{ $trashed ? 'Active milestones' : 'Trashed milestones' }}

                    </a>
                </div>
            </div>
        @endcan
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.milestone.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Milestone">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.milestone.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.milestone.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.milestone.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.milestone.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.milestone.fields.end_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($milestones)
                        @forelse($milestones as $key => $milestone)
                            <tr data-entry-id="{{ $milestone->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $milestone->id ?? '' }}
                                </td>

                                <td>
                                    <a  href="{{ route('projectmanagement.admin.milestones.show', $milestone->id) }}">
                                        {{ $milestone->name ?? '' }}
                                    </a>
                                </td>
                                <td>
                                    {{ $milestone->project->name ?? '' }}
                                </td>
                                <td>
                                    {{ $milestone->start_date ?? '' }}
                                </td>
                                <td>
                                    {{ $milestone->end_date ?? '' }}
                                </td>

                                <td>
                                    @if(!$trashed)
                                        @can('milestone_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.milestones.show', $milestone->id) }}">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        @endcan

                                        @can('milestone_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.milestones.edit', $milestone->id) }}">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </a>
                                        @endcan

                                        @can('milestone_assign_to')

                                            <a class="btn btn-xs btn-success" href="{{ route('projectmanagement.admin.milestones.getAssignTo', $milestone->id) }}" >
                                                {{ trans('global.assign_to') }}
                                            </a>

                                        @endcan

                                        @can('milestone_delete')
                                            <form action="{{ route('projectmanagement.admin.milestones.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan
                                    @else
                                        @can('milestone_delete')
                                            <form action="{{ route('projectmanagement.admin.milestones.forceDestroy', $milestone->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="restore">
                                                <input type="submit" class="btn btn-xs btn-success" value="{{ trans('global.restore') }}">
                                            </form>
                                            <form action="{{ route('projectmanagement.admin.milestones.forceDestroy', $milestone->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="force_delete">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.forcedelete') }}">
                                            </form>
                                        @endcan
                                    @endif

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
        @if(!$trashed)
@can('milestone_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
{{--      @if(!$trashed)--}}
        url: "{{ route('projectmanagement.admin.milestones.massDestroy') }}",
{{--      @else--}}
{{--        url: "{{ route('projectmanagement.admin.milestones.massForceDestroy') }}",--}}
{{--      @endif--}}
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
@endif
    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 25,
    });
    let table = $('.datatable-Milestone:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
