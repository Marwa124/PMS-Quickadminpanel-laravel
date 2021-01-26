@extends('layouts.admin')
@section('styles')
    <style>
        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Fira+Sans:200,400,500);
        * {
            border: 0;
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        /*body {*/
        /*    height: inherit;*/
        /*    display: -webkit-box;*/
        /*    display: -ms-flexbox;*/
        /*    display: flex;*/
        /*    -webkit-box-orient: vertical;*/
        /*    -webkit-box-direction: normal;*/
        /*    -ms-flex-direction: column;*/
        /*    flex-direction: column;*/
        /*    font-family: 'Fira Sans', sans-serif;*/
        /*    -webkit-font-smoothing: antialiased;*/
        /*    -moz-osx-font-smoothing: grayscale;*/
        /*    color: #79838c;*/
        /*}*/

        /*a {*/
        /*    color: #50585f;*/
        /*    text-decoration: none;*/
        /*}*/

        a:hover {
            color: #383e44;
        }

        div.container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            max-height: 100%;
        }

        div.header {
            height: auto;
            text-align: center;
            background: slategrey;
            color: ghostwhite;
            padding: 2.3rem 1rem 2.3rem 1rem;
            position: relative;
        }

        div.header:after {
            content: '';
            position: absolute;
            bottom: -5rem;
            left: 0rem;
            height: 5.1rem;
            display: block;
            width: 100%;
            z-index: 300;
            /* FF3.6-15 */
            /* Chrome10-25,Safari5.1-6 */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(20%, white), to(rgba(255, 255, 255, 0)));
            background: linear-gradient(to bottom, white 20%, rgba(255, 255, 255, 0) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 );
            /* IE6-9 */
        }

        div.header h1 {
            margin-top: .8rem;
            margin-bottom: .5rem;
            font-weight: 200;
            font-size: 1.6em;
            letter-spacing: 0.1rem;
            text-transform: uppercase;
        }

        @media (min-width: 62em) {
            div.header h1 {
                font-size: 1.9em;
                letter-spacing: 0.2rem;
            }
        }

        div.header h2 {
            font-size: 1.1em;
            font-weight: 400;
            color: #cfd7de;
            max-width: 30rem;
            margin: auto;
        }

        div.item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            overflow-y: auto;
            padding: 0rem 1rem 0rem 1rem;
        }

        #timeline {
            position: relative;
            display: table;
            height: 100%;
            margin-left: -2rem;
            margin-right: 2rem;
            margin-top: 3rem;
            margin-bottom: 2rem;
        }

        #timeline div:after {
            content: '';
            width: 2px;
            position: absolute;
            top: -1.2rem;
            bottom: 0rem;
            left: 58px;
            z-index: 1;
            background: #C5C5C5;
        }

        #timeline h3 {
            position: -webkit-sticky;
            position: sticky;
            top: 5rem;
            color: #888;
            margin: 0;
            font-size: 1em;
            font-weight: 400;
        }

        @media (min-width: 62em) {
            #timeline h3 {
                font-size: 1.1em;
            }
        }

        #timeline section.year {
            position: relative;
        }

        #timeline section.year:first-child section {
            margin-top: -1.3em;
            padding-bottom: 0px;
        }

        #timeline section.year section {
            position: relative;
            padding-bottom: 1.25em;
            margin-bottom: 2.2em;
        }

        #timeline section.year section h4 {
            position: absolute;
            bottom: 0;
            font-size: .9em;
            font-weight: 400;
            line-height: 1.2em;
            margin: 0;
            padding: 0 0 0 89px;
            color: #C5C5C5;
        }

        @media (min-width: 62em) {
            #timeline section.year section h4 {
                font-size: 1em;
            }
        }

        #timeline section.year section ul {
            list-style-type: none;
            padding: 0 0 0 75px;
            margin: -1.35rem 0 1em;
            max-width: 32rem;
            font-size: 1em;
        }

        @media (min-width: 62em) {
            #timeline section.year section ul {
                font-size: 1.1em;
                padding: 0 0 0 81px;
            }
        }

        #timeline section.year section ul:last-child {
            margin-bottom: 0;
        }

        #timeline section.year section ul:first-of-type:after {
            content: '';
            width: 10px;
            height: 10px;
            background: #C5C5C5;
            border: 2px solid #FFFFFF;
            border-radius: 50%;
            position: absolute;
            left: 54px;
            top: 3px;
            z-index: 2;
        }

        #timeline section.year section ul li {
            margin-left: .5rem;
        }

        #timeline section.year section ul li:before {
            content: '·';
            margin-left: -.5rem;
            padding-right: .3rem;
        }

        #timeline section.year section ul li:not(:first-child) {
            margin-top: .5rem;
        }

        #timeline section.year section ul li span.price {
            color: mediumturquoise;
            font-weight: 500;
        }

        #price {
            display: inline;
        }

        svg {
            border: 3px solid white;
            border-radius: 50%;
            -webkit-box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
        /*# sourceMappingURL=index.css.map */
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 pb-1">
            <div class="col-3">
                <span class="float-right ">
                    @can('task_create')
                        <a class="btn btn-secondary mr-3" href="{{ route('projectmanagement.admin.tasks.clone', $task->id) }}" id="clone" onclick="return confirm('Are you sure to clone task with Sub tasks ?');" title="{{ trans('global.clone') }}">
                            <span class="fa fa-copy" aria-hidden="true"></span>
                        </a>
                    @endcan
                </span>
            </div>

        </div>
        <div class="col-3">
            <div class="card">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">{{trans('cruds.task.title_singular')}} {{trans('global.details')}}</a>
                    <a class="nav-link" id="v-pills-sub_tasks-tab"      data-toggle="pill" href="#v-pills-sub_tasks" role="tab" aria-controls="v-pills-sub_tasks" aria-selected="false">{{ trans('cruds.task.fields.sub_task') }}<span class="float-right">         {{$task->subTasks()->count() > 0 ? $task->subTasks()->count() : ''}}</span></a>
{{--                    <a class="nav-link" id="v-pills-bugs-tab" data-toggle="pill" href="#v-pills-bugs" role="tab" aria-controls="v-pills-bugs" aria-selected="false">{{ trans('cruds.bug.title') }}<span class="float-right">{{$task->bugs()->count() > 0 ? $task->bugs()->count() : ''}}</span></a>--}}
                    <a class="nav-link" id="v-pills-notes-tab"          data-toggle="pill" href="#v-pills-notes" role="tab" aria-controls="v-pills-notes" aria-selected="false">{{ trans('cruds.task.fields.notes') }}</a>
                    <a class="nav-link" id="v-pills-time_sheets-tab"    data-toggle="pill" href="#v-pills-time_sheets" role="tab" aria-controls="v-pills-time_sheets" aria-selected="false">{{ trans('cruds.project.fields.time_sheet') }}<span class="float-right">{{$task->TimeSheet()->count() > 0 ? $task->TimeSheet()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-activities-tab"     data-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">{{ trans('cruds.activities.title') }}<span class="float-right">           {{$task->activities()->count() > 0 ? $task->activities()->count() : ''}}</span></a>
                    {{--                    <a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">Comments</a>--}}
                </div>
            </div>
        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-details-tab">
                    <div class="card">
                        <h5 class="card-header">{{ $task->name }}
                            @can('task_edit')
                                <a class="float-right small" href="{{ route('projectmanagement.admin.tasks.edit', $task->id) }}">
                                    {{ trans('global.edit') }}  {{ trans('cruds.task.title_singular') }}
                                </a>
                            @endcan
                        </h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-4 border-right ">

                                    <div class="pl-1 ">
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.name') }} :</p> <span class="col-md-6">{{ $task->name ?? ''  }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.title') }} {{ trans('cruds.project.fields.name') }}  : </p><span class="col-md-6">{{ $task->project->name ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.milestone.title') }} {{ trans('cruds.milestone.fields.name') }} : </p><span class="col-md-6">{{ $task->milestone->name ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.start_date') }} :</p> <span class="col-md-6">{{ $task->start_date ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.due_date') }} :</p> <span class="col-md-6">{{ $task->due_date ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.status') }} : </p><span class="col-md-6">{{ $task->status ?? '' }}</span> </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 border-right ">
                                    <div class=" pl-1">
                                        @if($task->TimeSheetOn->first())
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.timer_status') }} :</p> <span class="col-md-6"><a class="btn-sm {{$task->TimeSheetOn->first()->timer_status == 'on' ? 'btn-success' : 'btn-danger'}}" style="color: #ffffff">{{trans('global.on')}}</a> <a href="{{route('projectmanagement.admin.tasks.update_task_timer',$task->id)}}" class="btn btn-sm {{$task->TimeSheetOn->first()->timer_status == 'on' ? 'btn-danger' : 'btn-success'}}">{{$task->TimeSheetOn->first()->timer_status == 'on' ? trans('cruds.project.fields.stop_time') : trans('cruds.project.fields.start_time')}}</a></span> </div>
                                        @else
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.timer_status') }} :</p> <span class="col-md-6"><a class="btn-sm btn-danger" style="color: #ffffff">{{trans('global.off')}}</a> <a href="{{route('projectmanagement.admin.tasks.update_task_timer',$task->id)}}" class="btn btn-sm btn-success"> {{trans('cruds.project.fields.start_time')}}</a></span> </div>
                                        @endif
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.task_hours') }} :</p> <span class="col-md-6">{{ $task->task_hours ?? ''  }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.created_by') }} :</p> <span class="col-md-6">{{ $task->createBy->name ?? ''  }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.calculate_progress') }} :</p> <span class="col-md-6">{{ $task->calculate_progress ? $task->calculate_progress.'%':'' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.fields.tag') }} :</p>
                                            <span class="col-md-6">
                                             @if($task->tags)
                                                    @forelse($task->tags as $key => $tag)
                                                        <span class="label label-info">{{ $tag->name ? $tag->name.',' :'' }}</span>
                                                    @empty
                                                        {{trans('cruds.messages.no_tags_found_in_task')}}
                                                    @endforelse
                                                @endif
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4  ">
                                    <div class=" pl-1">
                                        <div class="row"> <p class="font-bold col-md-5">{{ trans('cruds.task.fields.attachment') }} :</p>
                                            <span class="col-md-7">
                                                @if($task->attachment)
                                                    <a href="{{ $task->attachment->getUrl() ?? '' }}" target="_blank">
                                                        {{ trans('global.view_file') }}
                                                    </a>
                                                @else
                                                    {{trans('cruds.messages.no_attachment_found_in_task')}}
                                                @endif
                                            </span>
                                        </div>

                                        <div class="row"> <p class="font-bold col-md-5">{{ trans('global.assign_to') }} :</p>
                                            <span class="col-md-7">
                                                @if($task->accountDetails)
                                                    @forelse($task->accountDetails as $account)
                                                        <img class="img-thumbnail rounded-circle" title="{{ $account->fullname ?? ''  }}" width="30%" src="{{ $account->avatar ? str_replace('storage', 'storage', $account->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $account->fullname ?? ''  }}">
                                                    @empty
                                                        {{trans('cruds.messages.not_assign_anyone')}}
                                                    @endforelse
                                                @else
                                                    {{trans('cruds.messages.not_assign_anyone')}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-sub_tasks" role="tabpanel" aria-labelledby="v-pills-sub_tasks-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-sub_task-tab" data-toggle="pill" href="#v-pills-sub_task" role="tab" aria-controls="v-sub_pills-sub_task" aria-selected="true">Sub {{ trans('cruds.task.title') }}</a>
                                @can('task_create')
{{--                                    <a class="nav-link" id="v-pills-new_sub_task-tab" data-toggle="pill" href="#v-pills-new_sub_task" role="tab"  aria-controls="v-pills-new_sub_task" aria-selected="false">New {{ trans('cruds.task.title_singular') }}</a>--}}
                                    <a class="nav-link" id="v-pills-new_task-tab" href="{{route('projectmanagement.admin.tasks.create_sub_task',$task->id)}}" role="tab" aria-controls="v-pills-new_task" aria-selected="false">New Sub {{ trans('cruds.task.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-sub_task" role="tabpanel" aria-labelledby="v-pills-sub_task-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-SubTask">
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
                                                <th>
                                                    {{ trans('cruds.task.fields.start_date') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.task.fields.due_date') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.task.fields.project') }}
                                                </th>
                                                @canany(['task_edit' , 'task_assign_to' , 'task_delete'])
                                                    <th>

                                                    </th>
                                                @endcanany
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @if($task->subTasks)
                                                @forelse($task->subTasks as $key => $v_task)
                                                    <tr data-entry-id="{{ $v_task->id }}">

                                                        <td>
                                                            {{ $v_task->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('projectmanagement.admin.tasks.show', $v_task->id) }}">

                                                                {{ $v_task->name ?? '' }}
                                                            </a>
                                                            <div class="progress" >
                                                                <div class="progress-bar {{$v_task->calculate_progress < 50 ? 'bg-danger':'bg-success'}}" role="progressbar" style="width: {{$v_task->calculate_progress}}%; display: {{$v_task->calculate_progress?:'none'}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                    {{$v_task->calculate_progress}}%
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ ucwords($v_task->status ?? '') }}
                                                        </td>
                                                        <td>
                                                            {{ $v_task->start_date ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $v_task->due_date ?? '' }}
                                                        </td>

                                                        <td>
                                                            {{ $v_task->project->name ?? '' }}
                                                        </td>

                                                        @canany(['task_edit' , 'task_assign_to' , 'task_delete'])

                                                            <td>
                                                                @can('task_edit')
                                                                    <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.tasks.edit', $v_task->id) }}" title="edit">
                                                                        <span class="fa fa-pencil-square-o"></span>
                                                                    </a>
                                                                @endcan

                                                                @can('task_assign_to')

                                                                    <a class="btn btn-xs btn-success {{$v_task->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.tasks.getAssignTo', $v_task->id) }}" title="{{$v_task->project->department ? '' : trans('cruds.messages.add_department_to_project')}}"  >
                                                                        {{ trans('global.assign_to') }}
                                                                    </a>

                                                                @endcan

                                                                @can('task_delete')
                                                                    <form action="{{ route('projectmanagement.admin.tasks.destroy', $v_task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                    </form>
                                                                @endcan

                                                            </td>
                                                        @endcan

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7">
                                                            {{trans('cruds.messages.no_sub_tasks_found_in_task')}}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="7" >
                                                        {{trans('cruds.messages.no_sub_tasks_found_in_task')}}
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
                <div class="tab-pane fade" id="v-pills-bugs" role="tabpanel" aria-labelledby="v-pills-bugs-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-bug-tab" data-toggle="pill" href="#v-pills-bug" role="tab" aria-controls="v-pills-bug" aria-selected="true">{{ trans('cruds.bug.title') }}</a>
                                @can('bug_create')
                                    <a class="nav-link" id="v-pills-new_bug-tab" href="{{route('projectmanagement.admin.bugs.create_task_bug',$task->id)}}" role="tab" aria-controls="v-pills-new_bug" aria-selected="false">New {{ trans('cruds.bug.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-bug" role="tabpanel" aria-labelledby="v-pills-bug-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-Bug">
                                            <thead>
                                            <tr>

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
                                                    {{ trans('cruds.bug.fields.task') }}
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

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($task->bugs)

{{--                                                @dd($task->bugs()->count())--}}
                                                @forelse($task->bugs as $key => $bug)
                                                    <tr data-entry-id="{{ $bug->id }}">

                                                        <td>
                                                            {{ $bug->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $bug->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $bug->project->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $bug->task->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ ucwords($bug->status ?? '')  }}
                                                        </td>
                                                        <td>
                                                            {{ ucwords($bug->priority ?? '') }}
                                                        </td>
                                                        <td>
                                                            {{ ucwords($bug->severity ?? '') }}
                                                        </td>
                                                        <td>
                                                            {{ $bug->reporterBy->name ?? '' }}
                                                        </td>
                                                        <td>
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
                                                    <tr>
                                                        <td colspan="9"> No bug  Found In This Project</td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="9"> No bug  Found In This Project</td>
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
                <div class="tab-pane fade" id="v-pills-notes" role="tabpanel" aria-labelledby="v-pills-notes-tab">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route("projectmanagement.admin.tasks.update_note", [$task->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="notes">{{ trans('cruds.task.fields.notes') }}</label>
                                    <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $task->notes) !!}</textarea>
                                    @if($errors->has('notes'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('notes') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.task.fields.notes_helper') }}</span>
                                </div>
                                <input type="hidden" name="task_id" value="{{$task->id}}" />
                                <div class="form-group col-md-12">
                                    <button class="btn btn-danger float-right" type="submit">
                                        {{ trans('global.update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-time_sheets" role="tabpanel" aria-labelledby="v-pills-time_sheets-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-time_sheet-tab" data-toggle="pill" href="#v-pills-time_sheet" role="tab" aria-controls="v-pills-time_sheet" aria-selected="true" onclick="displayTimesheet('time_sheet')">{{ trans('cruds.project.fields.time_sheet') }}</a>
                                @canany(['time_sheet_create' , 'time_sheet_edit'])
                                    <a class="nav-link " id="v-pills-new_time_sheet-tab" data-toggle="pill" href="#v-pills-new_time_sheet" role="tab" aria-controls="v-pills-new_time_sheet" aria-selected="true" onclick="displayTimesheet('new_time_sheet')">New {{ trans('cruds.project.fields.time_sheet') }}</a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-time_sheet" role="tabpanel" aria-labelledby="v-pills-time_sheet-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-TimeSheet">
                                            <thead>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.project.fields.id') }}
                                                </th>
                                                <th width="100">
                                                    {{ trans('cruds.user.title_singular') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.project.fields.start_time') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.project.fields.stop_time') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.project.title_singular') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.project.fields.time_spend') }}
                                                </th>
                                                @canany(['time_sheet_edit','time_sheet_delete'])
                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                @endcanany
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($task->TimeSheet)
                                                @forelse($task->TimeSheet as $key => $timer)
                                                    <tr data-entry-id="{{ $timer->id }}">
                                                        <td>
                                                            {{ $timer->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{--{{ $timer->user->accountDetail->fullname ?? '' }}--}}
                                                            @if($timer->user->accountDetail)

                                                                <img class="img-thumbnail rounded-circle" title="{{ $timer->user->accountDetail->fullname ?? $timer->user->name}}" width="50%" src="{{ $timer->user->accountDetail->avatar ? str_replace('storage', 'storage', $timer->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $timer->user->accountDetail->fullname ?? $timer->user->name }}">
{{--                                                                <img class="img-thumbnail rounded-circle" title="{{ $timer->user->accountDetail->fullname }}" width="50%" src="{{ $timer->user->accountDetail->avatar ? str_replace('storage', 'storage', $timer->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $timer->user->accountDetail->fullname }}">--}}
                                                            @else
                                                                <img class="img-thumbnail rounded-circle" title="{{ $timer->user->name ?? ''}}" width="50%" src="{{ asset('images/default.png') }}" alt="{{ $timer->user->name ?? '' }}">

                                                            @endif

                                                        </td>
                                                        <td>
                                                            <span class="btn-success btn-sm">{{ $timer->start_time ? date("F j, Y, g:i a",$timer->start_time): '' }}</span>
                                                        </td>
                                                        <td>
                                                            <span class="btn-danger btn-sm">{{ $timer->end_time ? date("F j, Y, g:i a",$timer->end_time): '' }}</span>
                                                        </td>
                                                        <td>
                                                            <a  href="{{ route('projectmanagement.admin.tasks.show', $timer->task->id) }}" title=" {{ trans('global.view') }}">
                                                                {{ $timer->task->name ?? '' }}
                                                            </a>
                                                            @if($timer->edited_by)
                                                                <span class="small" style="color: red"> edited</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{--   get_time_spent_result in file global_helper --}}
                                                            {{ get_time_spent_result($timer->end_time - $timer->start_time) }}
                                                        </td>
                                                        @canany(['time_sheet_edit','time_sheet_delete'])
                                                            <td>
                                                                 @can('time_sheet_edit')
                                                                    <input type="hidden" name="timesheets" id="timesheets" value="{{$task->TimeSheet}}">
                                                                    <a class="btn btn-xs btn-info tablinks"  onclick="showEditTime(event, '{{$timer->id}}')" data-id="{{$timer->id}}"  id="edit_timesheet" >
                                                                        <span class="fa fa-pencil-square-o"></span>
                                                                    </a>
                                                                 @endcan

                                                                 @can('time_sheet_delete')
                                                                    <form action="{{route('projectmanagement.admin.time-sheets.destroy',$timer->id)}}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                    </form>
                                                                @endcan

                                                            </td>
                                                        @endcan

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7">
                                                            {{trans('cruds.messages.no_time_sheet_found_in_task')}}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="7">
                                                        {{trans('cruds.messages.no_time_sheet_found_in_task')}}
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
                    @canany(['time_sheet_create' , 'time_sheet_edit'])
                        <div class="tab-pane fade " id="v-pills-new_time_sheet" role="tabpanel" aria-labelledby="v-pills-new_time_sheet-tab" >
                            <div class="card">
                                <div>
                                    <div class="card-header">
                                        <form method="POST" action="{{ route("projectmanagement.admin.time-sheets.store") }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="module_field_id" value="{{$task->id}}">
                                            <input type="hidden" name="timesheet_id" value="">
                                            <input type="hidden" name="module" value="task">

                                            <div class="col-12">
                                                <div class="col-6 float-left">
                                                    <div class="form-group">
                                                        <label class="required" for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                                                        <input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="date" name="start_date" id="start_date" value="{{ old('start_date', '') }}" required>
                                                        @if($errors->has('start_date'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('start_date') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="required" for="end_date">{{ trans('cruds.project.fields.end_date') }}</label>
                                                        <input class="form-control {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="date" name="end_date" id="end_date" value="{{ old('end_date', '') }}" required>
                                                        @if($errors->has('end_date'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('end_date') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-6 float-right">
                                                    <div class="form-group">
                                                        <label class="required" for="start_time">{{ trans('cruds.project.fields.start_time') }}</label>
                                                        <input class="form-control {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="time" name="start_time" id="start_time" value="{{ old('start_time', '') }}" required>
                                                        @if($errors->has('start_time'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('start_time') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="required" for="end_time">{{ trans('cruds.project.fields.stop_time') }}</label>
                                                        <input class="form-control {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="time" name="end_time" id="end_time" value="{{ old('end_time', '') }}" required>
                                                        @if($errors->has('end_time'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('end_time') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="required" for="reason">{{ trans('cruds.leaveApplication.fields.reason') }}</label>
                                                <textarea class="form-control  {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason">{!! old('reason') !!}</textarea>
                                                @if($errors->has('reason'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('reason') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group col-12 pb-4 ">
                                                <button class="btn btn-danger float-right" type="submit">
                                                    {{ trans('global.save') }}
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcanany
                </div>
                <div class="tab-pane fade" id="v-pills-activities" role="tabpanel" aria-labelledby="v-pills-activities-tab">
                    <div class="card">
                        <div class="card-header">
                                {{ trans('cruds.activities.title') }}
                        </div>

                        <div class="tab-pane fade show active" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                        @if($task->activities()->count() > 0)
                            <div class="card-body">

                                <div class="item">
                                    <div id="timeline">
                                        <div>
                                            @forelse($task->activities as $activity)
                                                <section class="year">
                                                    {{--                                                   time_ago in file global_helper --}}
                                                    <section>
                                                        <ul>
                                                            <small title="{{$activity->activity_date}}">{{time_ago($activity->activity_date)}}</small>
                                                            <li><a href="{{route('admin.users.show',$activity->user->id)}}">{{$activity->user->name}}</a> {{$activity->activity}} <strong> {{$activity->value1}} </strong></li>
                                                        </ul>
                                                    </section>
                                                </section>
                                            @empty
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">...</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')



    <script>


        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            responsive: true,
            pageLength: 7,
            lengthMenu: [
                [7, 25, 50, -1],
                [7, 25, 50, "All"],
            ],
        });
        {{--    For datatable Bug--}}

        $('.datatable-Bug').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        {{--    For datatable sub task--}}

        $('.datatable-SubTask').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });
    </script>
    <script>
        $(document).ready(function () {

            {{--    For editor in texteara notes--}}

            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/projectmanagement/tasks/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', {{ $task->id ?? 0 }});
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });


        function displayTimesheet (tab)
        {
            if(tab == 'new_time_sheet')
            {
                document.getElementById('v-pills-time_sheet').style.display = "none" ;
            }else{
                document.getElementById('v-pills-time_sheet').style.display = "block" ;
            }
        }


        function showEditTime(evt, timer_id) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementById("v-pills-time_sheet-tab");

            tabcontent.classList.remove('active');
            tabcontent.classList.remove('show');
            // tabcontent.style.display = "none";
            document.getElementById('v-pills-time_sheet').classList.remove('active');
            document.getElementById('v-pills-time_sheet').classList.remove('show');
            document.getElementById('v-pills-time_sheet').style.display = "none" ;


            document.getElementById('v-pills-new_time_sheet-tab').classList.add('active');
            document.getElementById('v-pills-new_time_sheet-tab').classList.add('show');

            document.getElementById('v-pills-new_time_sheet').classList.add('active');
            document.getElementById('v-pills-new_time_sheet').classList.add('show');
            document.getElementById('v-pills-new_time_sheet').style.display = "block";

            var alltimesheets = document.getElementById('timesheets').value;
            var timesheets = JSON.parse(alltimesheets);
            timesheets.filter(function(value,key){

                //var time = $(this).data('id');
                if(timer_id == value.id){

                    $('textarea[name="reason"]').val(value.reason);
                    $('input[name="timesheet_id"]').val(value.id);

                    // start time and start date
                    let start_timestamp = value.start_time
                    var start = new Date(start_timestamp * 1000);
                    var months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                    var year = start.getFullYear();
                    var month = months[start.getMonth()];
                    //var month = start.getMonth()+1;
                    var date = start.getDate();
                    var hour = start.getHours();
                    var min = start.getMinutes();

                    if(min.toString().length==1){
                        min = '0'+min;
                    }
                    if(hour.toString().length==1){
                        hour = '0'+hour;
                    }
                    if(date.toString().length==1){
                        date = '0'+date;
                    }

                    var time = hour + ':' + min ;
                    var dateValue = year + '-' + month + '-' + date;

                    $('input[name="start_time"]').val(time);
                    $('input[name="start_date"]').val(dateValue);

                    // start time and start date
                    let end_timestamp = value.end_time

                    var end = new Date(end_timestamp * 1000);
                    //var months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                    var year = end.getFullYear();
                    var month = months[end.getMonth()];
                    //var month = end.getMonth()+1;
                    var date = end.getDate();
                    var hour = end.getHours();
                    var min = end.getMinutes();

                    if(min.toString().length==1){
                        min = '0'+min;
                    }
                    if(hour.toString().length==1){
                        hour = '0'+hour;
                    }
                    if(date.toString().length==1){
                        date = '0'+date;
                    }
                    var time = hour + ':' + min ;
                    var dateValue = year + '-' + month + '-' + date;

                    $('input[name="end_time"]').val(time);
                    $('input[name="end_date"]').val(dateValue);
                }
            })

        }
    </script>

@endsection

