@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        @can('task_status_create')
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('projectmanagement.admin.task-statuses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.taskStatus.title_singular') }}
                </a>
            </div>
        @endcan
        @can('task_status_delete')
            <div style="margin: 10px;" class="row d-flex ml-auto">
                <div class="col-lg-6 ">
                    <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                       href="{{$trashed ? route('projectmanagement.admin.task-statuses.index') : route('projectmanagement.admin.task-statuses.trashed.index')}}">

                        {{ $trashed ? 'Active ' : 'Trashed ' }} {{ trans('cruds.taskStatus.title') }}

                    </a>

                </div>
            </div>
        @endcan
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.taskStatus.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-TaskStatus">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.taskStatus.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskStatus.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taskStatuses as $key => $taskStatus)
                        <tr data-entry-id="{{ $taskStatus->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $taskStatus->id ?? '' }}
                            </td>
                            <td>
                                {{ $taskStatus->name ?? '' }}
                            </td>
                            <td>
                                @if(!$trashed)
                                    {{--                                    @can('task_status_show')--}}
                                    {{--                                        <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.task-statuses.show', $taskStatus->id) }}">--}}
                                    {{--                                            <span class="fa fa-eye"></span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    @endcan--}}

                                    @can('task_status_edit')
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('projectmanagement.admin.task-statuses.edit', $taskStatus->id) }}">
                                            <span class="fa fa-pencil-square-o"></span>
                                        </a>
                                    @endcan

                                    @can('task_status_delete')
                                        <form
                                            action="{{ route('projectmanagement.admin.task-statuses.destroy', $taskStatus->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                   value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @else
                                    @can('task_status_delete')
                                        <form
                                            action="{{ route('projectmanagement.admin.task-statuses.forceDestroy', $taskStatus->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="action" value="restore">
                                            <input type="submit" class="btn btn-xs btn-success"
                                                   value="{{ trans('global.restore') }}">
                                        </form>
                                        <form
                                            action="{{ route('projectmanagement.admin.task-statuses.forceDestroy', $taskStatus->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Task Status Will Force Delete ..! \n{{ trans('global.areYouSure') }}');"
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
                @can('task_status_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('projectmanagement.admin.task-statuses.massDestroy') }}",
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
                pageLength: 100,
            });
            let table = $('.datatable-TaskStatus:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
