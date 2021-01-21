@extends('layouts.admin')

@section('styles')
    <style>

        .progress {
            width: 250px;
            height: 250px;
            background: none;
            position: relative;
        }

        .progress::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 10px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress > span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 6px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 150px;
            border-bottom-right-radius: 150px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 150px;
            border-bottom-left-radius: 150px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
        }

        .progress .progress-value {
            position: absolute;
            top: 0;
            left: 0;
        }


    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details"
                       role="tab" aria-controls="v-pills-details"
                       aria-selected="true">{{ trans('cruds.workTracking.title') }} Details</a>
                    {{--<a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="false"> {{ trans('cruds.task.title') }}<span class="float-right">{{$workTracking->tasks->count() > 0 ? $workTracking->tasks->count() : ''}}</span></a>--}}
                    {{--                    <a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">Comments</a>--}}
                </div>
            </div>
        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel"
                     aria-labelledby="v-pills-details-tab">
                    <div class="card">
                        <h5 class="card-header">{{ $workTracking->subject }}
                            @can('work_tracking_edit')
                                <a class="float-right small"
                                   href="{{ route('projectmanagement.admin.work-trackings.edit', $workTracking->id) }}">
                                    {{ trans('global.edit') }}  {{ trans('cruds.workTracking.title_singular') }}
                                </a>
                            @endcan
                        </h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-6 border-right ">

                                    <div class="pl-1 ">
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.subject') }}
                                                :</p> <span class="col-md-6">{{ $workTracking->subject ?? '' }}</span>
                                        </div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.work_type') }}
                                                : </p><span class="col-md-6">{{ $workTracking->work_type ? $workTracking->work_type->name : '' }}</span>
                                        </div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.start_date') }}
                                                :</p> <span class="col-md-6">{{ $workTracking->start_date ?? '' }}</span></div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.end_date') }}
                                                :</p> <span class="col-md-6">{{ $workTracking->end_date ?? '' }}</span>
                                        </div>
                                        <div class="row" style="color:{{$color}}">

                                                <p class="font-bold col-md-6 " ><b>{{ trans('cruds.task.fields.status') }} :</b> </p>
                                                <span class="col-md-6 bold" ><b>{{ $workTrakingStatus ?? '' }}</b></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">

                                    <div class="pl-1 ">
                                        <div class="row"><p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.description') }}
                                                : </p><span class="col-md-6">{{ $workTracking->description ?? '' }}</span></div>
                                        {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.notify_work_achive') }} :</p> <span class="col-md-6">{{ $workTracking->notify_work_achive ? $workTracking->notify_work_achive : 'off' }}</span> </div>--}}
                                        {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.notify_work_not_achive') }}  : </p><span class="col-md-6">{{ $workTracking->notify_work_not_achive ? $workTracking->notify_work_not_achive : 'off' }}</span> </div>--}}
                                        {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.email_send') }}  : </p><span class="col-md-6">{{ $workTracking->email_send ?? '' }}</span> </div>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 pt-4 mb-4 text-center">
                                <h5 class=" font-weight-bold text-center mb-4">{{ trans('cruds.workTracking.fields.completed_achievement') }} : {{$result['achievement_WorkTracking']}}</h5>
                                <h6 class=" font-weight-bold text-center mb-4">{{ trans('cruds.workTracking.fields.target_achievement') }} : {{$workTracking->achievement ?? ''}} </h6>

                                <!-- Progress bar 1 -->
                                <div class="progress mx-auto" data-value='{{$result['progress_WorkTracking']}}'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-success"></span>
                                    </span>
                                    <span class="progress-right">
                                            <span class="progress-bar border-success"></span>
                                    </span>
                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                        <div class="h2 font-weight-bold"> {{$result['progress_WorkTracking']}} %</div>
                                    </div>
                                </div>
                                <!-- END -->

                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">--}}
                {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                {{--<div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">--}}
                {{--<a class="nav-link active" id="v-pills-task-tab" data-toggle="pill" href="#v-pills-task" role="tab" aria-controls="v-sub_pills-task" aria-selected="true">{{ trans('cruds.task.title') }}</a>--}}
                {{--@can('task_create')--}}
                {{--<a class="nav-link" id="v-pills-new_task-tab" href="{{route('projectmanagement.admin.tasks.create_milestone_task',$workTracking->id)}}" role="tab" aria-controls="v-pills-new_task" aria-selected="false">New {{ trans('cruds.task.title_singular') }}</a>--}}
                {{--@endcan--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade show active" id="v-pills-task" role="tabpanel" aria-labelledby="v-pills-task-tab">--}}
                {{--<div class="card">--}}
                {{--<div>--}}
                {{--<div class="card-header">--}}

                {{--<div class="table-responsive">--}}
                {{--<table class=" table table-bordered table-striped table-hover datatable datatable-Task">--}}
                {{--<thead>--}}
                {{--<tr>--}}

                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.id') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.name') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.status') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.tag') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.attachment') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.start_date') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.due_date') }}--}}
                {{--</th>--}}
                {{--<th>--}}
                {{--{{ trans('cruds.task.fields.project') }}--}}
                {{--</th>--}}
                {{--<th>--}}

                {{--</th>--}}
                {{--</tr>--}}

                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@if($milestone->tasks)--}}
                {{--@forelse($milestone->tasks as $key => $v_task)--}}
                {{--<tr data-entry-id="{{ $v_task->id }}">--}}

                {{--<td>--}}
                {{--{{ $v_task->id ?? '' }}--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--{{ $v_task->name ?? '' }}--}}
                {{--<div class="progress" >--}}
                {{--<div class="progress-bar {{$v_task->calculate_progress < 50 ? 'bg-danger':'bg-success'}}" role="progressbar" style="width: {{$v_task->calculate_progress}}%; display: {{$v_task->calculate_progress?:'none'}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">--}}
                {{--{{$v_task->calculate_progress}}%--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--{{ ucwords($v_task->status->name ?? '') }}--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--@forelse($v_task->tags as $key => $item)--}}
                {{--<span class="badge badge-info">{{ $item->name }}</span>--}}
                {{--@empty--}}
                {{--@endforelse--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--@if($v_task->attachment)--}}
                {{--<a href="{{ $v_task->attachment->getUrl() }}" target="_blank">--}}
                {{--{{ trans('global.view_file') }}--}}
                {{--</a>--}}
                {{--@endif--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--{{ $v_task->start_date ?? '' }}--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--{{ $v_task->due_date ?? '' }}--}}
                {{--</td>--}}

                {{--<td>--}}
                {{--{{ $v_task->project->name ?? '' }}--}}
                {{--</td>--}}

                {{--<td>--}}
                {{--@can('task_edit')--}}
                {{--<a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.tasks.edit', $v_task->id) }}" title="edit">--}}
                {{--<span class="fa fa-pencil-square-o"></span>--}}
                {{--</a>--}}
                {{--@endcan--}}

                {{--@can('task_assign_to')--}}

                {{--<a class="btn btn-xs btn-success {{$v_task->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.tasks.getAssignTo', $v_task->id) }}" title="{{$v_task->project->department ? '' : 'add department to project'}}"  >--}}
                {{--{{ trans('global.assign_to') }}--}}
                {{--</a>--}}

                {{--@endcan--}}

                {{--@can('task_delete')--}}
                {{--<form action="{{ route('projectmanagement.admin.tasks.destroy', $v_task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
                {{--<input type="hidden" name="_method" value="DELETE">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
                {{--</form>--}}
                {{--@endcan--}}

                {{--</td>--}}

                {{--</tr>--}}
                {{--@empty--}}
                {{--<tr>--}}
                {{--<td colspan="10">--}}
                {{--No Sub Tasks Found In This Tasks--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--@endforelse--}}
                {{--@else--}}
                {{--<tr>--}}
                {{--<td colspan="10" >--}}
                {{--No Sub Tasks Found In This Tasks--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--@endif--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
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


        $(function () {

            $(".progress").each(function () {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

            })

            function percentageToDegrees(percentage) {

                return percentage / 100 * 360

            }

        });
    </script>


@endsection

@section('content123')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.workTracking.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('projectmanagement.admin.work-trackings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.id') }}
                        </th>
                        <td>
                            {{ $workTracking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.work_type') }}
                        </th>
                        <td>
                            {{ $workTracking->work_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.achievement') }}
                        </th>
                        <td>
                            {{ $workTracking->achievement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.start_date') }}
                        </th>
                        <td>
                            {{ $workTracking->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.end_date') }}
                        </th>
                        <td>
                            {{ $workTracking->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.description') }}
                        </th>
                        <td>
                            {{ $workTracking->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.notify_work_achive') }}
                        </th>
                        <td>
                            {{ $workTracking->notify_work_achive }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.notify_work_not_achive') }}
                        </th>
                        <td>
                            {{ $workTracking->notify_work_not_achive }}
                        </td>
                    </tr>
                    {{--<tr>--}}
                    {{--<th>--}}
                    {{--{{ trans('cruds.workTracking.fields.permissions') }}--}}
                    {{--</th>--}}
                    {{--<td>--}}
                    {{--@foreach($workTracking->permissions as $key => $permissions)--}}
                    {{--<span class="label label-info">{{ $permissions->title }}</span>--}}
                    {{--@endforeach--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.workTracking.fields.email_send') }}
                        </th>
                        <td>
                            {{ $workTracking->email_send }}
                        </td>
                    </tr>
                    {{--<tr>--}}
                    {{--<th>--}}
                    {{--{{ trans('cruds.workTracking.fields.account') }}--}}
                    {{--</th>--}}
                    {{--<td>--}}
                    {{--{{ $workTracking->account->name ?? '' }}--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('projectmanagement.admin.work-trackings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
