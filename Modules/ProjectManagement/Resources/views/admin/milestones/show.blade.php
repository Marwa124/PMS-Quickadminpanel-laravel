@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details"
                       role="tab" aria-controls="v-pills-details"
                       aria-selected="true">{{ trans('cruds.milestone.title') }} {{trans('global.details')}}</a>
                    <a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab"
                       aria-controls="v-pills-tasks" aria-selected="false"> {{ trans('cruds.task.title') }}<span
                            class="float-right">{{$milestone->tasks->count() > 0 ? $milestone->tasks->count() : ''}}</span></a>
                    {{--                    <a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">Comments</a>--}}
                </div>
            </div>
        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel"
                     aria-labelledby="v-pills-details-tab">
                    <div class="card">
                        <h5 class="card-header">{{ $milestone->{'name_'.app()->getLocale()} ?? '' }}
                            @can('milestone_edit')
                                <a class="float-right small"
                                   href="{{ route('projectmanagement.admin.milestones.edit', $milestone->id) }}">
                                    {{ trans('global.edit') }}  {{ trans('cruds.milestone.title_singular') }}
                                </a>
                            @endcan
                        </h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-4 border-right ">

                                    <div class="pl-1 ">
                                        <div class="row"><p
                                                class="font-bold col-md-6">{{ trans('cruds.milestone.fields.name') }}
                                                :</p> <span class="col-md-6">{{ $milestone->{'name_'.app()->getLocale()} ?? '' }}</span></div>
                                        <div class="row"><p
                                                class="font-bold col-md-6">{{ trans('cruds.project.title') }} {{ trans('cruds.project.fields.name') }}
                                                : </p><span class="col-md-6">{{ $milestone->project->{'name_'.app()->getLocale()} ?? '' }}</span>
                                        </div>
                                        <div class="row"><p
                                                class="font-bold col-md-6">{{ trans('cruds.milestone.fields.start_date') }}
                                                :</p> <span class="col-md-6">{{ $milestone->start_date ?? '' }}</span></div>
                                        <div class="row"><p
                                                class="font-bold col-md-6">{{ trans('cruds.milestone.fields.end_date') }}
                                                :</p> <span class="col-md-6">{{ $milestone->end_date ?? '' }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-task-tab" data-toggle="pill" href="#v-pills-task"
                                   role="tab" aria-controls="v-sub_pills-task"
                                   aria-selected="true">{{ trans('cruds.task.title') }}</a>
                                @can('task_create')
                                    <a class="nav-link" id="v-pills-new_task-tab"
                                       href="{{route('projectmanagement.admin.tasks.create_milestone_task',$milestone->id)}}"
                                       role="tab" aria-controls="v-pills-new_task"
                                       aria-selected="false">New {{ trans('cruds.task.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-task" role="tabpanel"
                         aria-labelledby="v-pills-task-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table
                                            class=" table table-bordered table-striped table-hover datatable datatable-Task">
                                            <thead>
                                            <tr>

                                                <th>
                                                    {{ trans('cruds.task.fields.id') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.task.fields.name') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.task.fields.status') }}
                                                </th>
                                                {{--                                                <th>--}}
                                                {{--                                                    {{ trans('cruds.task.fields.tag') }}--}}
                                                {{--                                                </th>--}}
                                                {{--                                                <th>--}}
                                                {{--                                                    {{ trans('cruds.task.fields.attachment') }}--}}
                                                {{--                                                </th>--}}
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

                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @if($milestone->tasks)
                                                @forelse($milestone->tasks as $key => $v_task)
                                                    <tr data-entry-id="{{ $v_task->id }}">

                                                        <td>
                                                            {{ $v_task->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('projectmanagement.admin.tasks.show', $v_task->id) }}"
                                                               title="edit">

                                                                {{ $v_task->{'name_'.app()->getLocale()} ?? '' }}
                                                            </a>
                                                            <div class="progress">
                                                                <div
                                                                    class="progress-bar {{$v_task->calculate_progress < 50 ? 'bg-danger':'bg-success'}}"
                                                                    role="progressbar"
                                                                    style="width: {{$v_task->calculate_progress}}%; display: {{$v_task->calculate_progress?:'none'}}"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                    {{$v_task->calculate_progress}}%
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            {{ $v_task->status ? trans('cruds.status.'.$v_task->status) : '' }}
                                                        </td>
                                                        {{--                                                        <td>--}}
                                                        {{--                                                            @forelse($v_task->tags as $key => $item)--}}
                                                        {{--                                                                <span class="badge badge-info">{{ $item->name }}</span>--}}
                                                        {{--                                                            @empty--}}
                                                        {{--                                                            @endforelse--}}
                                                        {{--                                                        </td>--}}
                                                        {{--                                                        <td>--}}
                                                        {{--                                                            @if($v_task->attachment)--}}
                                                        {{--                                                                <a href="{{ $v_task->attachment->getUrl() }}" target="_blank">--}}
                                                        {{--                                                                    {{ trans('global.view_file') }}--}}
                                                        {{--                                                                </a>--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                        </td>--}}
                                                        <td>
                                                            {{ $v_task->start_date ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $v_task->due_date ?? '' }}
                                                        </td>

                                                        <td>
                                                            {{ $v_task->project && $v_task->project->{'name_'.app()->getLocale()} ? $v_task->project->{'name_'.app()->getLocale()} : '' }}
                                                        </td>

                                                        <td>
                                                            @can('task_edit')
                                                                <a class="btn btn-xs btn-info"
                                                                   href="{{ route('projectmanagement.admin.tasks.edit', $v_task->id) }}"
                                                                   title="edit">
                                                                    <span class="fa fa-pencil-square-o"></span>
                                                                </a>
                                                            @endcan

                                                            @can('task_assign_to')

                                                                <a class="btn btn-xs btn-success {{ $v_task->project && $v_task->project->department ? '' : 'disabled'}}"
                                                                   href="{{ route('projectmanagement.admin.tasks.getAssignTo', $v_task->id) }}"
                                                                   title="{{ $v_task->project && $v_task->project->department ? '' : 'add department to project'}}">
                                                                    {{ trans('global.assign_to') }}
                                                                </a>

                                                            @endcan

                                                            @can('task_delete')
                                                                <form
                                                                    action="{{ route('projectmanagement.admin.tasks.destroy', $v_task->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                                    style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }}">
                                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                                           value="{{ trans('global.delete') }}">
                                                                </form>
                                                            @endcan

                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7">
                                                            {{trans('cruds.messages.no_tasks_found_in_milestone')}}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="7">
                                                        {{trans('cruds.messages.no_tasks_found_in_milestone')}}
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
                    ...
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    @parent

    {{--    For datatable of tasks--}}
    <script>

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[1, 'desc']],
            responsive: true,
            pageLength: 7,
            lengthMenu: [
                [7, 25, 50, -1],
                [7, 25, 50, "All"],
            ],
        });


        $('.datatable-Task').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

    </script>


@endsection

