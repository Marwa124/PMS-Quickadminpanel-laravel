@extends('layouts.admin')
@section('content')

    <div class=" row">

{{--        <div class="card col-sm-2 ">--}}
{{--            <div class="card-body ">--}}
{{--                <a class="float-left" id="all" type="button" >--}}
{{--                    All--}}
{{--                </a>--}}
{{--                <span class="float-right">{{$bugs->count()}}</span><br>--}}
{{--                <div class="progress" style="width: auto" >--}}
{{--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="card col-sm-2 ">
            <div class="card-body ">
                <a class="float-left" id="unconfirm" type="button" >
                    Unconfirm
                </a>
                <span class="float-right">{{$bugs->where('status','unconfirm')->count().'/'.$bugs->count()}}</span><br>
                @if($bugs->count() > 0)
                    <div class="progress" style="width: auto" >
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$bugs->where('status','unconfirm')->count()/$bugs->count()*100}}%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card col-sm-2 ">
            <div class="card-body">
                <a class="float-left" id="confirmed" type="button" >
                    Confirmed
                </a>
                <span class="float-right">{{$bugs->where('status','confirmed')->count().'/'.$bugs->count()}}</span><br>
                @if($bugs->count() > 0)
                    <div class="progress" style="width: auto" >
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$bugs->where('status','confirmed')->count()/$bugs->count()*100}}%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card col-sm-2 ">
            <div class="card-body">

                <a class="float-left" id="in_progress" type="button" >
                    In Progress
                </a>
                <span class="float-right">{{$bugs->where('status','in_progress')->count().'/'.$bugs->count()}}</span><br>
                @if($bugs->count() > 0)
                    <div class="progress" style="width: auto" >
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$bugs->where('status','in_progress')->count()/$bugs->count()*100}}%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="card col-sm-2 ">
            <div class="card-body">

                <a class="float-left" id="resolved" type="button" >
                    Resolved
                </a>
                <span class="float-right">{{$bugs->where('status','resolved')->count().'/'.$bugs->count()}}</span><br>
                @if($bugs->count() > 0)
                    <div class="progress" style="width: auto" >
                        <div class="progress-bar bg-cover" role="progressbar" style="width: {{$bugs->where('status','resolved')->count()/$bugs->count()*100}}%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card col-sm-2 ">
            <div class="card-body">

                <a class="float-left" id="verified" type="button" >
                    Verified
                </a>
                <span class="float-right">{{$bugs->where('status','verified')->count().'/'.$bugs->count()}}</span><br>
                @if($bugs->count() > 0)
                    <div class="progress" style="width: auto" >
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$bugs->where('status','verified')->count()/$bugs->count()*100}}%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

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
                            {{ trans('cruds.bug.title_singular') }} {{ trans('cruds.bug.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bug.fields.project') }}
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
                                    <a  href="{{ route('projectmanagement.admin.bugs.show', $bug->id) }}">
                                        {{ $bug->name ?? '' }}
                                    </a>

                                </td>
                                <td>
                                    {{ $bug->project->name ?? '' }}
                                </td>
                                <td>
                                    {{ $bug->status ? ucwords($bug->status) :'' }}
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

        $('#all').on('click',function () {
            table
                .columns( 4 )
                .search( '' )
                .draw()
        })

        $('#unconfirm').on('click',function () {
            table
                .columns( 4 )
                .search( 'unconfirm' )
                .draw()
        })

        $('#confirmed').on('click',function () {
            table
                .columns( 4 )
                .search( 'confirmed' )
                .draw()
        })

        $('#in_progress').on('click',function () {
            table
                .columns( 4 )
                .search( 'in progress' )
                .draw()
        })

        $('#resolved').on('click',function () {
            table
                .columns( 4 )
                .search( 'resolved' )
                .draw()
        })

        $('#verified').on('click',function () {
            table
                .columns( 4 )
                .search( 'verified' )
                .draw()
        })
})

</script>
@endsection
