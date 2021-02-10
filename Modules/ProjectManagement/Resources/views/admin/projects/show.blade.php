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
            background: -webkit-gradient(linear, left top, left bottom, color-stop(20%, white), to(rgba(255, 255, 255, 0)));
            background: linear-gradient(to bottom, white 20%, rgba(255, 255, 255, 0) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 );
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
    <div class="flash-message">
        @if(Session::has('messages'))
            <p class="alert alert-danger">{{ Session::get('messages') }}</p>
        @endif
    </div>
    <div class="row">
        <div class="col-12 pb-1">
            <div class="col-3">
                <span class="float-right ">
                    @can('project_create')
                        <a class="btn btn-secondary " href="{{ route('projectmanagement.admin.projects.clone', $project->id) }}" id="clone" onclick="return confirm('Are you sure to clone Project with milestone and tasks ?');" title="{{ trans('global.clone') }}">
                            <span class="fa fa-copy"  aria-hidden="true"></span>
                        </a>
                    @endcan
                    <a class="btn btn-danger mr-3" href="{{route('projectmanagement.admin.projects.project_pdf',$project->id)}}" title="pdf">
                        <i class="fa fa-file-pdf  " aria-hidden="true" ></i>

                    </a>
                </span>
            </div>

        </div>
        <div class="col-3">
            <div class="card">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">{{trans('cruds.project.title_singular')}} {{trans('global.details')}}</a>
                    <a class="nav-link" id="v-pills-milestones-tab"     data-toggle="pill" href="#v-pills-milestones" role="tab" aria-controls="v-pills-milestones" aria-selected="false">{{ trans('cruds.milestone.title') }} <span class="float-right">              {{$project->milestones && $project->milestones()->count() > 0 ? $project->milestones()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-tasks-tab"          data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="false">{{ trans('cruds.task.title') }}<span class="float-right">                              {{$project->tasks && $project->tasks()->count() > 0 ? $project->tasks()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-bugs-tab"           data-toggle="pill" href="#v-pills-bugs" role="tab" aria-controls="v-pills-bugs" aria-selected="false">{{ trans('cruds.bug.title') }}<span class="float-right">                                 {{$project->bugs && $project->bugs()->count() > 0 ? $project->bugs()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-notes-tab"          data-toggle="pill" href="#v-pills-notes" role="tab" aria-controls="v-pills-notes" aria-selected="false">{{ trans('cruds.project.fields.notes') }}</a>
                    <a class="nav-link" id="v-pills-tickets-tab"        data-toggle="pill" href="#v-pills-tickets" role="tab" aria-controls="v-pills-tickets" aria-selected="false">{{ trans('cruds.ticket.title') }}<span class="float-right">                        {{$project->tickets && $project->tickets()->count() > 0 ? $project->tickets()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-invoices-tab"       data-toggle="pill" href="#v-pills-invoices" role="tab" aria-controls="v-pills-invoices" aria-selected="false">{{ trans('cruds.invoice.title') }}<span class="float-right">                     {{$project->invoices && $project->invoices()->count() > 0 ? $project->invoices()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-time_sheets-tab"    data-toggle="pill" href="#v-pills-time_sheets" role="tab" aria-controls="v-pills-time_sheets" aria-selected="false">{{ trans('cruds.project.fields.time_sheet') }}<span class="float-right">   {{$project->TimeSheet && $project->TimeSheet()->count() > 0 ? $project->TimeSheet()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-calendar-tab"       data-toggle="pill" href="#v-pills-calendar" role="tab" aria-controls="v-pills-calendar" aria-selected="false" onclick="generateCalendar()">{{ trans('cruds.tasksCalendar.title') }}</a>
                    <a class="nav-link" id="v-pills-activities-tab"     data-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">{{ trans('cruds.activities.title') }}<span class="float-right">              {{$project->activities && $project->activities()->count() > 0 ? $project->activities()->count() : ''}}</span></a>
{{--                    <a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">Comments</a>--}}
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-details-tab">
                    <div class="card">
                        <h5 class="card-header">{{ $project->{'name_'.app()->getLocale()} }}
                        @can('project_edit')
                                <a class="float-right small" href="{{ route('projectmanagement.admin.projects.edit', $project->id) }}">
                                    {{ trans('global.edit') }}  {{ trans('cruds.project.title_singular') }}
                                </a>
                        @endcan
                        </h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-4 border-right ">

                                    <div class="pl-1 ">

                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.name') }}            :</p> <span class="col-md-6">{{ $project->{'name_'.app()->getLocale()} ?? ''  }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.client') }}          : </p><span class="col-md-6">{{ $project->client && $project->client->name ? $project->client->name : '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.start_date') }}      :</p> <span class="col-md-6">{{ $project->start_date ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.end_date') }}        :</p> <span class="col-md-6">{{ $project->end_date ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.demo_url') }}        :</p> <span class="col-md-6">{{ $project->demo_url ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.project_status') }}  : </p><span class="col-md-6">{{ $project->project_status ? trans("cruds.status.".$project->project_status)  : '' }}</span> </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 border-right ">
                                    <div class=" pl-1">
                                        @if($project->TimeSheetOn->first())
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.timer_status') }} :</p> <span class="col-md-6"><a class="btn-sm {{ $project->TimeSheetOn && $project->TimeSheetOn->first()->timer_status == 'on' ? 'btn-success' : 'btn-danger'}}" style="color: #ffffff">{{trans('global.on')}}</a> <a href="{{route('projectmanagement.admin.projects.update_project_timer',$project->id)}}" class="btn btn-sm {{$project->TimeSheetOn && $project->TimeSheetOn->first()->timer_status == 'on' ? 'btn-danger' : 'btn-success'}}">{{$project->TimeSheetOn && $project->TimeSheetOn->first()->timer_status == 'on' ? trans('cruds.project.fields.stop_time') : trans('cruds.project.fields.start_time')}}</a></span> </div>
                                        @else
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.timer_status') }} :</p> <span class="col-md-6"><a class="btn-sm btn-danger" style="color: #ffffff">{{trans('global.off')}}</a> <a href="{{route('projectmanagement.admin.projects.update_project_timer',$project->id)}}" class="btn btn-sm btn-success"> {{trans('cruds.project.fields.start_time')}}</a></span> </div>
                                        @endif
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.estimate_hours') }} :</p> <span class="col-md-6">{{ $project->estimate_hours ? $project->estimate_hours.' Hour' : '' }} </span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.department.title_singular') }} {{ trans('cruds.project.fields.name') }} :</p> <span class="col-md-6">{{ $project->department && $project->department->department_name ? $project->department->department_name : '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.project_cost') }} :</p> <span class="col-md-6">{{ $project->project_cost?? 0 }} EGP</span> </div>
                                        <div class="row"> <p class="font-bold col-md-5">{{ trans('global.assign_to') }} :</p> <span class="col-md-6">
                                                @if($project->accountDetails)
                                                    @forelse($project->accountDetails as $account)
                                                        <img class="img-thumbnail rounded-circle" title="{{ $account->fullname }}" width="30%" src="{{ $account->avatar ? str_replace('storage', 'storage', $account->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $account->fullname }}">
                                                    @empty
                                                        {{trans('cruds.messages.not_assign_anyone')}}
                                                    @endforelse
                                                @else
                                                    {{trans('cruds.messages.not_assign_anyone')}}
                                                @endif
                                            </span> </div>
                                    </div>
                                </div>
                                <div class="col-sm-4  ">
                                    <div class=" pl-1">
                                        <div class="row"> <p class="font-bold col-md-8"> {{trans('cruds.project.fields.total_expense')}}        :</p> <span class="col-md-4"> {{$total_expense ? $total_expense.' EGP': '' }} </span> </div>
                                        <div class="row"> <p class="font-bold col-md-8"> {{trans('cruds.project.fields.billable_expense')}}     :</p> <span class="col-md-4"> {{$billable_expense ? $billable_expense.' EGP': '' }} </span> </div>
                                        <div class="row"> <p class="font-bold col-md-8"> {{trans('cruds.project.fields.non_billable_expense')}} :</p> <span class="col-md-4"> {{$not_billable_expense ? $not_billable_expense.' EGP': '' }} </span> </div>
                                        <div class="row"> <p class="font-bold col-md-8"> {{trans('cruds.project.fields.billed_expense')}}       :</p> <span class="col-md-4"> {{$paid_expense ? $paid_expense.' EGP': '' }} </span> </div>
                                        <div class="row"> <p class="font-bold col-md-8"> {{trans('cruds.project.fields.unbilled_expense')}}     :</p> <span class="col-md-4"> {{($billable_expense - $paid_expense) ? ($billable_expense - $paid_expense).' EGP': '' }} </span> </div>

                                        <h3 class="row"> <p class="font-bold col-md-6"> {{trans('cruds.project.fields.total_bill')}}            :</p> <span class="col-md-6"> {{$project->project_cost ? $project->project_cost.' EGP': '' }} </span> </h3>

                                    </div>
                                </div>

                            </div>
                            <div class="progress" style="width: auto" >
                                <div class="progress-bar {{$project->calculate_progress >= 50 ? 'bg-success' : 'bg-danger'}}" role="progressbar" style="width: {{$project->calculate_progress}}%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{$project->calculate_progress}}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-milestones" role="tabpanel" aria-labelledby="v-pills-milestones-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-milestone-tab" data-toggle="pill" href="#v-pills-milestone" role="tab" aria-controls="v-pills-milestone" aria-selected="true">{{ trans('cruds.milestone.title') }}</a>
                                @can('milestone_create')
                                    <a class="nav-link" id="v-pills-new_milestone-tab" href="{{route('projectmanagement.admin.milestones.create_project_milestone',$project->id)}}" role="tab" aria-controls="v-pills-new_milestone" aria-selected="false">New {{ trans('cruds.milestone.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-milestone" role="tabpanel" aria-labelledby="v-pills-milestone-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-Milestone">
                                            <thead>
                                            <tr>
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
                                                @canany(['milestone_edit' , 'milestone_assign_to','milestone_delete'])
                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                @endcanany
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($project->milestones)
                                                @forelse($project->milestones as $key => $milestone)
                                                    <tr data-entry-id="{{ $milestone->id }}">
                                                        <td>
                                                            {{ $milestone->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            <a  href="{{ route('projectmanagement.admin.milestones.show', $milestone->id) }}">
                                                                {{ $milestone->{'name_'.app()->getLocale()} ?? '' }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{ $milestone->project->{'name_'.app()->getLocale()} ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $milestone->start_date ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $milestone->end_date ?? '' }}
                                                        </td>
                                                        @canany(['milestone_edit' , 'milestone_assign_to','milestone_delete'])
                                                            <td>
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
                                                            </td>
                                                        @endcanany

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" >
                                                                  {{trans('cruds.messages.no_milestones_found_in_project')}}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="6" >
                                                        {{trans('cruds.messages.no_milestones_found_in_project')}}
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
                <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-task-tab" data-toggle="pill" href="#v-pills-task" role="tab" aria-controls="v-pills-task" aria-selected="true">{{ trans('cruds.task.title') }}</a>
                                @can('task_create')
                                    <a class="nav-link" id="v-pills-new_task-tab" href="{{route('projectmanagement.admin.tasks.create_project_task',$project->id)}}" role="tab" aria-controls="v-pills-new_task" aria-selected="false">New {{ trans('cruds.task.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-task" role="tabpanel" aria-labelledby="v-pills-task-tab">
                        <div class="card">
                            <div >
                                <div class="card-header" >

                                    <div class="table-responsive"  >
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-Task " >
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
                                                    {{ trans('cruds.task.fields.milestone') }}
                                                </th>
                                                @canany(['task_edit' , 'task_assign_to' , 'task_delete'])
                                                    <th>

                                                    </th>
                                                @endcanany
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @if($project->tasks)
                                                @forelse($project->tasks as $key => $task)
                                                    <tr data-entry-id="{{ $task->id }}">

                                                        <td>
                                                            {{ $task->id ?? '' }}
                                                        </td>
                                                        <td>
                                                            <a  href="{{ route('projectmanagement.admin.tasks.show', $task->id) }}">
                                                                {{ $task->{'name_'.app()->getLocale()} ?? '' }}
                                                            </a>
                                                            <div class="progress" >
                                                                <div class="progress-bar {{$task->calculate_progress < 50 ? 'bg-danger':'bg-success'}}" role="progressbar" style="width: {{$task->calculate_progress}}%; display: {{$task->calculate_progress?:'none'}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                    {{$task->calculate_progress}}%
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $task->status ? trans('cruds.status.'.$task->status) : '' }}
                                                        </td>
                                                        <td>
                                                            {{ $task->start_date ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $task->due_date ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $task->milestone && $task->milestone->{'name_'.app()->getLocale()} ? $task->milestone->{'name_'.app()->getLocale()} : '' }}
                                                        </td>

                                                        @canany(['task_edit' , 'task_assign_to' , 'task_delete'])

                                                            <td>
                                                                @can('task_edit')
                                                                    <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.tasks.edit', $task->id) }}">
                                                                        <span class="fa fa-pencil-square-o"></span>
                                                                    </a>
                                                                @endcan

                                                                @can('task_assign_to')

                                                                    <a class="btn btn-xs btn-success {{$task->project && $task->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.tasks.getAssignTo', $task->id) }}" title="{{$task->project && $task->project->department ? '' : trans('cruds.messages.add_department_to_project')}}" >
                                                                        {{ trans('global.assign_to') }}
                                                                    </a>

                                                                @endcan

                                                                @can('task_delete')
                                                                    <form action="{{ route('projectmanagement.admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                    </form>
                                                                @endcan

                                                            </td>
                                                        @endcanany

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" >
                                                            {{trans('cruds.messages.no_tasks_found_in_project')}}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="7" >
                                                        {{trans('cruds.messages.no_tasks_found_in_project')}}
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
                                    <a class="nav-link" id="v-pills-new_bug-tab" href="{{route('projectmanagement.admin.bugs.create_project_bug',$project->id)}}" role="tab" aria-controls="v-pills-new_bug" aria-selected="false">New {{ trans('cruds.bug.title_singular') }}</a>
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
                                                    @canany(['bug_edit' , 'bug_assign_to' , 'bug_delete'])
                                                        <th>
                                                            &nbsp;
                                                        </th>
                                                    @endcanany
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($project->bugs)
                                                    @forelse($project->bugs as $key => $bug)
                                                        <tr data-entry-id="{{ $bug->id }}">
                                                            <td>
                                                                {{ $bug->id ?? '' }}
                                                            </td>
                                                            <td>
                                                                <a  href="{{ route('projectmanagement.admin.bugs.show', $bug->id) }}">
                                                                    {{ $bug->{'name_'.app()->getLocale()} ?? '' }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ $bug->project && $bug->project->{'name_'.app()->getLocale()} ? $bug->project->{'name_'.app()->getLocale()} : '' }}
                                                            </td>
                                                            <td>
                                                                {{ $bug->status ? trans('cruds.status.'.$bug->status) : '' }}
                                                            </td>
                                                            <td>
                                                                {{ $bug->priority ? trans('cruds.status.'.$bug->priority) :  '' }}
                                                            </td>
                                                            <td>
                                                                {{ $bug->severity ? trans('cruds.status.'.$bug->severity) :  '' }}
                                                            </td>
                                                            <td>
                                                                {{ $bug->reporterBy && $bug->reporterBy->name ? $bug->reporterBy->name : '' }}
                                                            </td>
                                                            @canany(['bug_edit' , 'bug_assign_to' , 'bug_delete'])
                                                                <td>
                                                                    @can('bug_edit')
                                                                        <a class="btn btn-xs btn-info" href="{{ route('projectmanagement.admin.bugs.edit', $bug->id) }}">
                                                                            <span class="fa fa-pencil-square-o"></span>
                                                                        </a>
                                                                    @endcan
                                                                    @can('bug_assign_to')

                                                                        <a class="btn btn-xs btn-success {{$bug->project && $bug->project->department ? '' : 'disabled'}}" href="{{ route('projectmanagement.admin.bugs.getAssignTo', $bug->id) }}" title="{{$bug->project && $bug->project->department ? '' :  trans('cruds.messages.add_department_to_project') }}" >
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
                                                            @endcanany

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8"> {{trans('cruds.messages.no_bugs_found_in_project')}}</td>
                                                        </tr>
                                                    @endforelse
                                                @else
                                                    <tr>
                                                        <td colspan="8"> {{trans('cruds.messages.no_bugs_found_in_project')}}</td>
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
                            <form method="POST" action="{{ route("projectmanagement.admin.projects.update_note", [$project->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="notes">{{ trans('cruds.project.fields.notes') }}</label>
                                    <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes',$project->notes) !!}</textarea>
                                    @if($errors->has('notes'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('notes') }}
                                        </div>
                                    @endif
            {{--                        <span class="help-block">{{ trans('cruds.project.fields.note_helper') }}</span>--}}
                                </div>
                                <input type="hidden" name="project_id" value="{{$project->id}}" />
                                <div class="form-group col-md-12">
                                    <button class="btn btn-danger float-right" type="submit">
                                        {{ trans('global.update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-tickets" role="tabpanel" aria-labelledby="v-pills-tickets-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-ticket-tab" data-toggle="pill" href="#v-pills-ticket" role="tab" aria-controls="v-pills-ticket" aria-selected="true">{{ trans('cruds.ticket.title') }}</a>
                                @can('ticket_create')
                                    <a class="nav-link" id="v-pills-new_ticket-tab" href="{{route('projectmanagement.admin.tickets.create_project_ticket',$project->id) }}" role="tab" aria-controls="v-pills-new_ticket" aria-selected="false">New {{ trans('cruds.ticket.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-ticket" role="tabpanel" aria-labelledby="v-pills-ticket-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-Ticket">
                                            <thead>
                                                <tr>
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
                                                    @canany(['ticket_show' , 'ticket_edit' , 'ticket_delete'])
                                                        <th>
                                                            &nbsp;
                                                        </th>
                                                    @endcanany
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($project->tickets)
                                                    @forelse($project->tickets as $key => $ticket)
                                                        <tr data-entry-id="{{ $ticket->id }}">

                                                            <td>
                                                                {{ $ticket->id ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $ticket->ticket_code ?? '' }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('projectmanagement.admin.tickets.show', $ticket->id) }}">
                                                                    {{ $ticket->{'subject_'.app()->getLocale()} ?? '' }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ $ticket->project && $ticket->project->{'name_'.app()->getLocale()} ? $ticket->project->{'name_'.app()->getLocale()} : '' }}
                                                            </td>
                                                            <td>
                                                                {{ $ticket->status ? trans('cruds.status.'.$ticket->status) : '' }}
                                                            </td>
                                                            @canany(['ticket_show' , 'ticket_edit' , 'ticket_delete'])
                                                                <td>
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

                                                                    @can('ticket_delete')
                                                                        <form action="{{ route('projectmanagement.admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                            <input type="hidden" name="_method" value="DELETE">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                        </form>
                                                                    @endcan

                                                                </td>
                                                            @endcanany

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6"> {{trans('cruds.messages.no_tickets_found_in_project')}}</td>
                                                        </tr>
                                                    @endforelse
                                                @else
                                                    <tr>
                                                        <td colspan="6"> {{trans('cruds.messages.no_tickets_found_in_project')}}</td>
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
                <div class="tab-pane fade" id="v-pills-invoices" role="tabpanel" aria-labelledby="v-pills-invoices-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-invoice-tab" data-toggle="pill" href="#v-pills-invoice" role="tab" aria-controls="v-pills-invoice" aria-selected="true">{{ trans('cruds.invoice.title') }}</a>
                                @can('invoice_create')
                                    <a class="nav-link" id="v-pills-new_invoice-tab" href="{{route('admin.invoices.create') }}" role="tab" aria-controls="v-pills-new_invoice" aria-selected="false">New {{ trans('cruds.invoice.title_singular') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-invoice" role="tabpanel" aria-labelledby="v-pills-invoice-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-Invoice">
                                            <thead>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.id') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.recur_start_date') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.recur_end_date') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.client') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.invoice_date') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.discount_percent') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.currerncy') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.invoice.fields.status') }}
                                                </th>
                                                @canany(['invoice_show' , 'invoice_edit' , 'invoice_delete'])
                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                @endcanany
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($project->invoices))
                                                    @foreach($project->invoices as $invoice)
                                                        <tr data-entry-id="{{ $invoice->id }}">
                                                            <td>
                                                                {{ $invoice->id ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $invoice->recur_start_date ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $invoice->recur_end_date ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $invoice->client->primary_contact ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $invoice->invoice_date ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $invoice->discount_percent ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ $invoice->currerncy ?? '' }}
                                                            </td>
                                                            <td>
                                                                {{ App\Models\Invoice::STATUS_SELECT[$invoice->status] ?? '' }}
                                                            </td>
                                                            @canany(['invoice_show' , 'invoice_edit' , 'invoice_delete'])
                                                                <td>
                                                                    @can('invoice_show')
                                                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.invoices.show', $invoice->id) }}">
                                                                            {{ trans('global.view') }}
                                                                        </a>
                                                                    @endcan

                                                                    @can('invoice_edit')
                                                                        <a class="btn btn-xs btn-info" href="{{ route('admin.invoices.edit', $invoice->id) }}">
                                                                            {{ trans('global.edit') }}
                                                                        </a>
                                                                    @endcan

                                                                    @can('invoice_delete')
                                                                        <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                            <input type="hidden" name="_method" value="DELETE">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                                        </form>
                                                                    @endcan

                                                                </td>
                                                            @endcanany

                                                        </tr>

                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="9"> {{trans('cruds.messages.no_invoices_found_in_project')}}</td>
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
                                                @if($project->TimeSheet)
                                                    @forelse($project->TimeSheet as $key => $timer)
                                                        <tr data-entry-id="{{ $timer->id }}">
                                                            <td>
                                                                {{ $timer->id ?? '' }}
                                                            </td>
                                                            <td>
{{--                                                                {{ $timer->user->accountDetail->fullname ?? '' }}--}}
                                                                @if( $timer->user->accountDetail)

                                                                    <img class="img-thumbnail rounded-circle" title="{{ $timer->user->accountDetail->fullname ?? $timer->user->name}}" width="50%" src="{{ $timer->user->accountDetail->avatar ? str_replace('storage', 'storage', $timer->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $timer->user->accountDetail->fullname ?? $timer->user->name }}">
                                                                @else
                                                                    <img class="img-thumbnail rounded-circle" title="{{ $timer->user && $timer->user->name ?  $timer->user->name:  ''}}" width="50%" src="{{ asset('images/default.png') }}" alt="{{ $timer->user && $timer->user->name ?  $timer->user->name:  '' }}">

                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="btn-success btn-sm">{{ $timer->start_time ? date("F j, Y, g:i a",$timer->start_time): '' }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="btn-danger btn-sm">{{ $timer->end_time ? date("F j, Y, g:i a",$timer->end_time): '' }}</span>
                                                            </td>
                                                            <td>
                                                                <a  href="{{ route('projectmanagement.admin.projects.show', $timer->project->id) }}" title=" {{ trans('global.view') }}">
                                                                    {{ $timer->project && $timer->project->{'name_'.app()->getLocale()} ? $timer->project->{'name_'.app()->getLocale()} : '' }}
                                                                </a>
                                                                @if($timer->edited_by)
                                                                    <span class="small" style="color: red"> {{trans('global.edited')}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
{{--                                                                get_time_spent_result in file global_helper --}}
                                                                @if($timer->end_time && $timer->start_time)
                                                                    {{ get_time_spent_result($timer->end_time - $timer->start_time)  }}
                                                                @endif
                                                            </td>
                                                            @canany(['time_sheet_edit','time_sheet_delete'])
                                                                <td>
                                                                    @can('time_sheet_edit')
                                                                        <input type="hidden" name="timesheets" id="timesheets" value="{{$project->TimeSheet}}">
                                                                        <a class="btn btn-xs btn-info tablinks"  onclick="showEditTime('{{$timer->id}}')" data-id="{{$timer->id}}"  id="edit_timesheet" title=" {{ trans('global.edit') }}">
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
                                                            @endcanany

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7"> {{trans('cruds.messages.no_time_sheet_found_in_project')}}</td>
                                                        </tr>
                                                    @endforelse
                                                @else
                                                    <tr>
                                                        <td colspan="7"> {{trans('cruds.messages.no_time_sheet_found_in_project')}} </td>
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
                                            <input type="hidden" name="module_field_id" value="{{$project->id}}">
                                            <input type="hidden" name="timesheet_id" value="">
                                            <input type="hidden" name="module" value="project">

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
                <div class="tab-pane fade" id="v-pills-calendar" role="tabpanel" aria-labelledby="v-pills-calendar-tab">

                    <div class="card">
                        <div class="card-header">
                            {{ trans('cruds.tasksCalendar.title') }}
                        </div>

                        <div class="card-body">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
                            <div id="calendar"></div>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-activities" role="tabpanel" aria-labelledby="v-pills-activities-tab">
                    <div class="card">
                        <h5 class="card-header">
                               {{ trans('cruds.activities.title') }}

                        </h5>

                        <div class="tab-pane fade show active" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                        @if($project->activities()->count() > 0)
                            <div class="card-body">

                                <div class="item">
                                    <div id="timeline">
                                        <div>
                                            @forelse($project->activities as $activity)
                                            <section class="year">
    {{--                                                   time_ago in file global_helper --}}
                                                <section>
                                                    <ul>
                                                        <small title="{{$activity->activity_date ?? ''}}">{{time_ago($activity->activity_date ?? '')}}</small>
                                                        <li><a href="{{route('admin.users.show',$activity->user->id)}}">{{$activity->user && $activity->user->name ? $activity->user->name : ''}}</a> {{$activity->{'activity_'.app()->getLocale()} ?? ''}} <strong> {{$activity->{'value1_'.app()->getLocale()} ?? ''}} </strong></li>
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

    @parent

    {{--    For datatable of tasks--}}
    <script>

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 0, 'desc' ]],
            responsive: true,
            pageLength: 7,
            lengthMenu: [
                [7, 25, 50, -1],
                [7, 25, 50, "All"],
            ],
        });

        $('.datatable-Milestone').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Task').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Bug').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Ticket').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Invoice').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

    </script>

{{--    For editor in texteara notes--}}
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/projectmanagement/projects/ckmedia', true);
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
                                        data.append('crud_id', {{ $project->id ?? 0 }});
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

            {{--$('#calendar').fullCalendar({--}}
            {{--    // put your options and callbacks here--}}
            {{--    events : [--}}
            {{--            @if($project->end_date && $project->start_date)--}}
            {{--        {--}}
            {{--            title : '{{ $project->name }}',--}}
            {{--            start : '{{ \Carbon\Carbon::createFromFormat(config('panel.date_format'),$project->start_date)->format('Y-m-d') }}',--}}
            {{--            end   : '{{ \Carbon\Carbon::createFromFormat(config('panel.date_format'),$project->end_date)->format('Y-m-d') }}',--}}
            {{--            url   : '{{ route('projectmanagement.admin.projects.edit',$project->id) }}',--}}
            {{--            color : '#f05050',--}}
            {{--        },--}}
            {{--        @endif--}}
            {{--    ]--}}
            {{--})--}}


        });


    </script>

{{--    For Calendar --}}

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href") // activated tab

        });

        function generateCalendar() {


                $('#calendar').fullCalendar({
                    // put your options and callbacks here
                    events : [
                            @if($project->end_date && $project->start_date)
                        {
                            title : '{{ $project->{'name_'.app()->getLocale()} }}',
                            start : '{{ \Carbon\Carbon::createFromFormat(config('panel.date_format'),$project->start_date)->format('Y-m-d') }}',
                            end   : '{{ \Carbon\Carbon::createFromFormat(config('panel.date_format'),$project->end_date)->format('Y-m-d') }}',
                            url   : '{{ route('projectmanagement.admin.projects.edit',$project->id) }}',
                            color : '#f05050',
                            dispaly: 'auto',
                            timeZone: 'UTC',
                            // initialDate: new Date(Date.UTC(2018, 8, 1))
                        },
                        @endif
                    ],
                })
        }




        function displayTimesheet (tab)
        {
            if(tab == 'new_time_sheet')
            {
                document.getElementById('v-pills-time_sheet').style.display = "none" ;
            }else{
                document.getElementById('v-pills-time_sheet').style.display = "block" ;
            }
        }


        function showEditTime(timer_id) {
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

        //session flash message timeout after 5 sec
        $("document").ready(function(){
            setTimeout(function(){
                $(".flash-message").remove();
            }, 5000 ); // 5 secs

        });

    </script>

@endsection
