@extends('layouts.admin')
@section('content')

<div class=" card">
    <div class=" d-flex">

{{--        <div class=" col-sm-2 pb-3">--}}
{{--            <div class="card-body ">--}}
{{--                <span >{{$tickets->count()}}</span><br>--}}
{{--                <a class="float-left" id="all" type="button" >--}}
{{--                    All--}}
{{--                </a>--}}

{{--            </div>--}}
{{--        </div>--}}

        <div class=" col-sm-2 pb-3">
            <div class="card-body ">
                <span >{{$tickets->where('status','answered')->count()}}</span><br>
                <a class="float-left" id="answered" type="button" >
                    Answered Tickets
                </a>

            </div>
        </div>

        <div class=" col-sm-2 pb-3">
            <div class="card-body ">
                <span >{{$tickets->where('status','in_progress')->count()}}</span><br>
                <a class="float-left" id="in_progress" type="button" >
                    In Progress Tickets
                </a>

            </div>
        </div>

        <div class=" col-sm-2 pb-3">
            <div class="card-body ">
                <span >{{$tickets->where('status','opened')->count()}}</span><br>
                <a class="float-left" id="opened" type="button" >
                    Open Tickets
                </a>

            </div>
        </div>

        <div class=" col-sm-2 pb-3">
            <div class="card-body ">
                <span >{{$tickets->where('status','closed')->count()}}</span><br>
                <a class="float-left" id="closed" type="button" >
                    Close Tickets
                </a>

            </div>
        </div>

        <div class=" col-sm-2 pb-3">
            <div class="card-body ">
                <span >{{$tickets->where('status','reopen')->count()}}</span><br>
                <a class="float-left" id="reopen" type="button" >
                    Reopen Tickets
                </a>

            </div>
        </div>

    </div>
</div>

    <div style="margin-bottom: 10px;" class="row">
        @can('ticket_create')
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('projectmanagement.admin.tickets.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ticket.title_singular') }}
                </a>
            </div>
        @endcan
        @can('task_delete')
            <div style="margin: 10px;" class="row d-flex ml-auto">
                <div class="col-lg-6 ">
                    <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                       href="{{$trashed ? route('projectmanagement.admin.tickets.index') : route('projectmanagement.admin.tickets.trashed.index')}}">

                        {{ $trashed ? 'Active ' : 'Trashed ' }} {{ trans('cruds.ticket.title') }}

                    </a>

                </div>
            </div>
        @endcan
    </div>
<div class="card">
    <div class="card-header">
        <a class="float-left" id="all" type="button" >
            {{ trans('cruds.ticket.title') }} {{ trans('global.list') }}
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ticket">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ticket.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticket.fields.ticket_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticket.fields.subject') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticket.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticket.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticket.fields.reporter') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $key => $ticket)
                        <tr data-entry-id="{{ $ticket->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ticket->id ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('projectmanagement.admin.tickets.show', $ticket->id) }}">

                                    {{ $ticket->ticket_code ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('projectmanagement.admin.tickets.show', $ticket->id) }}">
                                    {{ $ticket->subject ?? '' }}

                                </a>
                            </td>
                            <td>
                                {{ $ticket->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $ticket->status ? ucfirst($ticket->status) : '' }}
                            </td>
                            <td>
                                {{ $ticket->reporterBy ? $ticket->reporterBy->name : '' }}
                            </td>

                            <td>
                                @if(!$trashed)
                                    @can('ticket_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.tickets.show', $ticket->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endcan

                                    @can('ticket_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.tickets.edit', $ticket->id) }}">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </a>
                                    @endcan
                                    @can('ticket_assign_to')

                                        <a class="btn btn-xs btn-success {{$ticket->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.tickets.getAssignTo', $ticket->id) }}" title="{{$ticket->project->department ? '' : 'add department to project'}}" >
                                            {{ trans('global.assign_to') }}
                                        </a>

                                    @endcan

                                    @can('ticket_delete')
                                        <form action="{{ route('projectmanagement.admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @else
                                    @can('ticket_delete')
                                        <form action="{{ route('projectmanagement.admin.tickets.forceDestroy', $ticket->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="restore">
                                            <input type="submit" class="btn btn-xs btn-success" value="{{ trans('global.restore') }}">
                                        </form>
                                        <form action="{{ route('projectmanagement.admin.tickets.forceDestroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Ticket and Replay Will Force Delete Too ..! \n{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="force_delete">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.forcedelete') }}">
                                        </form>
                                    @endcan
                                @endif

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
    @if(!$trashed)
        @can('ticket_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('projectmanagement.admin.tickets.massDestroy') }}",
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
  let table = $('.datatable-Ticket:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
                .columns( 5 )
                .search( '' )
                .draw()
        })

        $('#answered').on('click',function () {
            table
                .columns( 5 )
                .search( 'answered' )
                .draw()
        })

        $('#in_progress').on('click',function () {
            table
                .columns( 5 )
                .search( 'in progress' )
                .draw()
        })

        $('#opened').on('click',function () {
            table
                .columns( 5 )
                .search( 'opened' )
                .draw()
        })

        $('#closed').on('click',function () {
            table
                .columns( 5 )
                .search( 'closed' )
                .draw()
        })

        $('#reopen').on('click',function () {
            table
                .columns( 5 )
                .search( 'reopen' )
                .draw()
        })
})

</script>
@endsection
