@extends('layouts.admin')
@section('content')

    <div class=" row">

        {{--            <div class="card col-sm-2 ">--}}
        {{--                <div class="card-body ">--}}
        {{--                    <a class="float-left" id="all" type="button" >--}}
        {{--                        All--}}
        {{--                    </a>--}}
        {{--                    <span class="float-right">{{$tasks->count()}}</span><br>--}}
        {{--                    <div class="progress" style="width: auto" >--}}
        {{--                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">--}}

        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        <div class="card col-sm-2 mr-1">
            <a class="float-left" id="not_started" type="button">
                <div class="card-body ">
                    {{trans('cruds.status.not_started')}}
                    <span class="float-right">{{$tasks->where('status','Not Started')->count().'/'.$tasks->count()}}</span><br>
                    @if($tasks->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-info" role="progressbar"
                                 style="width: {{$tasks->where('status','Not Started')->count()/$tasks->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 mr-1">
            <a class="float-left" id="in_progress" type="button">
                <div class="card-body ">
                    {{trans('cruds.status.in_progress')}}
                    <span class="float-right">{{$tasks->where('status','In Progress')->count().'/'.$tasks->count()}}</span><br>
                    @if($tasks->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-warning" role="progressbar"
                                 style="width: {{$tasks->where('status','In Progress')->count()/$tasks->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 mr-1">
            <a class="float-left" id="completed" type="button">
                <div class="card-body ">
                    {{trans('cruds.status.completed')}}
                    <span class="float-right">{{$tasks->where('status','Completed')->count().'/'.$tasks->count()}}</span><br>
                    @if($tasks->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: {{$tasks->where('status','Completed')->count()/$tasks->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 mr-1">
            <a class="float-left" id="deffered" type="button">
                <div class="card-body ">
                    {{trans('cruds.status.deffered')}}
                    <span class="float-right">{{$tasks->where('status','Deffered')->count().'/'.$tasks->count()}}</span><br>
                    @if($tasks->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-danger" role="progressbar"
                                 style="width: {{$tasks->where('status','Deffered')->count()/$tasks->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-3 ">
            <a class="float-left" id="waiting_someone" type="button">
                <div class="card-body ">
                    {{trans('cruds.status.waiting_someone')}}
                    <span class="float-right">{{$tasks->where('status','Waiting For Someone')->count().'/'.$tasks->count()}}</span><br>
                    @if($tasks->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-dark" role="progressbar"
                                 style="width: {{$tasks->where('status','Waiting For Someone')->count()/$tasks->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>




{{--        <input type="hidden" id="status" value="{{$task_statuses}}">--}}
{{--        @if($task_statuses)--}}
{{--            @forelse($task_statuses as $status)--}}

{{--                <div class="card col-sm-2">--}}
{{--                    <a class="float-left" id="{{$status->id}}" type="button">--}}
{{--                        <div class="card-body ">--}}
{{--                            {{ucwords($status->name)}}--}}
{{--                            <span--}}
{{--                                class="float-right">{{$tasks->where('status_id',$status->id)->count().'/'.$tasks->count()}}</span><br>--}}
{{--                            @if($tasks->count() >0)--}}
{{--                                <div class="progress" style="width: auto">--}}
{{--                                    <div class="progress-bar bg-info" role="progressbar"--}}
{{--                                         style="width: {{$tasks->where('status_id',$status->id)->count()/$tasks->count()*100}}%; "--}}
{{--                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--            @endforelse--}}
{{--        @endif--}}
    </div>

    <div style="margin-bottom: 10px;" class="row">
        @can('task_create')
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('projectmanagement.admin.tasks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
                </a>
            </div>
        @endcan
        @can('task_delete')
            <div style="margin: 10px;" class="row d-flex ml-auto">
                <div class="col-lg-6 ">
                    <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                       href="{{$trashed ? route('projectmanagement.admin.tasks.index') : route('projectmanagement.admin.tasks.trashed.index')}}">

                        {{ $trashed ? trans('cruds.status.active') : trans('cruds.status.trashed') }} {{ trans('cruds.task.title') }}

                    </a>

                </div>
            </div>
        @endcan
    </div>
    <div class="card">
        <div class="card-header">
            <a id="all" type="button">

                {{ trans('cruds.task.title') }} {{ trans('global.list') }}
            </a>
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
                            {{ trans('cruds.task.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.tag') }}
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
                            &nbsp;
                        </th>
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
                                    <a href="{{ route('projectmanagement.admin.tasks.show', $task->id) }}">

                                        {{ $task->name ?? '' }}
                                    </a>
                                    <div class="progress">
                                        <div
                                            class="progress-bar {{$task->calculate_progress < 50 ? 'bg-danger':'bg-success'}}"
                                            role="progressbar"
                                            style="width: {{$task->calculate_progress}}%; display: {{$task->calculate_progress?:'none'}}"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            {{$task->calculate_progress}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $task->status ?? '' }}
                                </td>
                                <td>
                                    @forelse($task->tags as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @empty
                                    @endforelse
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
                                    @if(!$trashed)
                                        @can('task_show')
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('projectmanagement.admin.tasks.show', $task->id) }}">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        @endcan

                                        @can('task_edit')
                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('projectmanagement.admin.tasks.edit', $task->id) }}">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </a>
                                        @endcan
                                        @can('task_create')
                                            <a class="btn btn-xs btn-secondary"
                                               href="{{ route('projectmanagement.admin.tasks.clone', $task->id) }}"
                                               onclick="return confirm('Are you sure to clone task with Sub tasks ?');"
                                               title="{{ trans('global.clone') }}">
                                                <span class="fa fa-copy"></span>
                                            </a>
                                        @endcan

                                        @can('task_assign_to')

                                            <a class="btn btn-xs btn-success {{$task->project->department ? '' : 'disabled'}}"
                                               href="{{ route('projectmanagement.admin.tasks.getAssignTo', $task->id) }}"
                                               title="{{$task->project->department ? '' : trans('cruds.messages.add_department_to_project')}}">
                                                {{ trans('global.assign_to') }}
                                            </a>

                                        @endcan

                                        @can('task_delete')
                                            <form
                                                action="{{ route('projectmanagement.admin.tasks.destroy', $task->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger"
                                                       value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan
                                    @else
                                        @can('task_delete')
                                            <form
                                                action="{{ route('projectmanagement.admin.tasks.forceDestroy', $task->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="restore">
                                                <input type="submit" class="btn btn-xs btn-success"
                                                       value="{{ trans('global.restore') }}">
                                            </form>
                                            <form
                                                action="{{ route('projectmanagement.admin.tasks.forceDestroy', $task->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ trans('cruds.messages.sub_tasks_in_task_force_delete') }} \n{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="force_delete">
                                                <input type="submit" class="btn btn-xs btn-danger"
                                                       value="{{ trans('global.forcedelete') }}">
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
                @can('task_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('projectmanagement.admin.tasks.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
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
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan
            @endif

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
            });
            let table = $('.datatable-Task:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
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

            //statistics

            // var allstatus = document.getElementById('status').value;
            // var status = JSON.parse(allstatus);
            //
            // status.filter(function (value, key) {
            //     $('#' + value.id).on('click', function () {
            //         table
            //             .columns(3)
            //             .search(value.name)
            //             .draw()
            //     })
            // })

            $('#all').on('click', function () {
                table
                    .columns(3)
                    .search('')
                    .draw()
            })

            $('#not_started').on('click', function () {
                table
                    .columns(3)
                    .search('Not Started')
                    .draw()
            })

            $('#in_progress').on('click', function () {
                table
                    .columns(3)
                    .search('In Progress')
                    .draw()
            })

            $('#completed').on('click', function () {
                table
                    .columns(3)
                    .search('Completed')
                    .draw()
            })

            $('#deffered').on('click', function () {
                table
                    .columns(3)
                    .search('Deffered')
                    .draw()
            })

            $('#waiting_someone').on('click', function () {
                table
                    .columns(3)
                    .search('Waiting For Someone')
                    .draw()
            })

            // $('#softdelete').on('change',function () {
            //     var softdelete = document.getElementById('softdelete').value;
            //     if (softdelete == 'Active') {
            //
            //         table
            //             .columns( 4 )
            //             .search( '/' )
            //             .draw()
            //     }else {
            //
            //         table
            //             .columns( 4 )
            //             .search( '-' )
            //             .draw()
            //     }
            // })


        })

    </script>
@endsection
