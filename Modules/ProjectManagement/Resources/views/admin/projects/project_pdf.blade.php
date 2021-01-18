@extends('layouts.pdf_layout')
@section('title'){{$project->name ?? '' }} @endsection
@section('content')
    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.project.fields.name') }} : <span > {{ $project->name ?? ''  }}</span></p>

    {{--project details--}}
    <table>
        <tr>
            <td  >
                <p >{{ trans('cruds.project.fields.start_date') }} : <span >{{ $project->start_date ?? '' }}</span></p>
            </td>
            <td  >
                <p>{{ trans('cruds.project.fields.estimate_hours') }} : <span>{{ $project->estimate_hours ? $project->estimate_hours.' Hour' : '' }} </span></p>
            </td>
            <td  >
                <b>{{ trans('cruds.project.fields.client') }} Info</b>
                <p >{{ trans('cruds.project.fields.client') }} : <span >{{ $project->client->name ?? '' }}</span> </p>
            </td>
        </tr>
        <tr>
            <td  >
                <p >{{ trans('cruds.project.fields.end_date') }} : <span >{{ $project->end_date ?? '' }}</span></p>
            </td>
            <td  >
                <p >Total Expense : <span > {{$total_expense ? $total_expense.' EGP': '' }} </span></p>            </td>
            <td  >
                <p >{{ trans('cruds.client.fields.address') }} : <span >{{ $project->client->address ?? '' }}</span> </p>
            </td>

        </tr>
        <tr>
            <td  >
                <p >{{ trans('cruds.department.title_singular') }} {{ trans('cruds.project.fields.name') }} :  <span>{{ $project->department->department_name ?? '' }} </span></p>
            </td>
            <td  >
                <p >Billable Expense : <span > {{$billable_expense ? $billable_expense.' EGP': '' }} </span></p>
            </td>
            <td  >
                <p >{{ trans('cruds.client.fields.city') }} : <span >{{ $project->client->city ?? '' }}</span> </p>
            </td>

        </tr>
        <tr>
            <td  >
                <p >{{ trans('cruds.project.fields.demo_url') }} : <span >{{ $project->demo_url ?? '' }}</span></p>
            </td>
            <td  >
                <p >Non Billable Expense :  <span > {{$not_billable_expense ? $not_billable_expense.' EGP': '' }} </span></p>
            </td>

            <td  >
                <p >{{ trans('cruds.client.fields.country') }} : <span >{{ $project->client->country ?? '' }}</span> </p>
            </td>

        </tr>
        <tr>
            <td  >
                <p >{{ trans('cruds.project.fields.project_status') }} : <span >{{ ucwords(str_replace('_',' ',$project->project_status ?? '' )) }}</span></p>
            </td>
            <td  >
                <p >Billed Expense :  <span > {{$paid_expense ? $paid_expense.' EGP': '' }} </span> </p>
            </td>
            <td  >
                <p >{{ trans('cruds.client.fields.phone') }} : <span >{{ $project->client->phone ?? '' }}</span> </p>
            </td>

        </tr>
        <tr>
            <td  >
                <p >{{ trans('cruds.project.fields.calculate_progress') }} : <span > {{ $project->calculate_progress ? $project->calculate_progress.'%': ''  }}</span></p>

            </td>
            <td  >
                <p >Unbilled Expense : <span > {{($billable_expense - $paid_expense) ? ($billable_expense - $paid_expense).' EGP': '' }} </span> </p>
            </td>

        </tr>
        <tr>
            <td >
                <p >{{ trans('cruds.project.fields.project_cost') }} :  <span>{{ $project->project_cost?? 0 }} EGP</span></p>

            </td>

            <td >
                <p >Total Bill : <span >  {{$project->project_cost ? $project->project_cost.' EGP': '' }} </span></p>
            </td>

        </tr>

    </table>
    <hr>

    {{-- Project Members Assign --}}

    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.user.title') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>
        <tr>
            <th>
                {{ trans('cruds.user.fields.name') }}
            </th>
            <th>
                {{ trans('cruds.project.fields.total_tasks_assign') }}
            </th>
            <th>
                {{ trans('cruds.project.fields.total_bugs_assign') }}
            </th>
            <th>
                {{ trans('cruds.project.fields.time_spend') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @if($project->accountDetails)
            @forelse($project->accountDetails as $key => $account)
                <tr data-entry-id="{{ $account->id }}">

                    <td>
                        {{ $account->fullname ?? '' }}
                    </td>
                    <td>
                        {{ $account->tasks ? $account->tasks->where('project_id',$project->id)->count() : '' }}
                    </td>
                    <td>
                        {{ $account->bugs ? $account->bugs->where('project_id',$project->id)->count() : '' }}
                    </td>
                    <td>

                        @php
                            $tasks = $project->tasks;
                            $timeProject = $account->user->TimeSheet->where('module','project')
                                    ->where("module_field_id",$project->id);

                            $timeTasks = $account->user->TimeSheet->where('module','task')
                                    ->whereIn("module_field_id",$tasks->pluck('id'));
                        @endphp

                        @php
                            $total_spend = 0;
                        @endphp
                        {{--get user time spend in project--}}
                        @forelse($timeProject as $timer)

                            @if($timer->end_time && $timer->start_time)
                                @php
                                    $total_spend += ($timer->end_time - $timer->start_time);
                                @endphp
                            @endif
                        @empty
                        @endforelse

                        {{--get user time spend in tasks of project --}}

                        @forelse($timeTasks as $timer)


                            @if($timer->end_time && $timer->start_time)
                                @php
                                    $total_spend += ($timer->end_time - $timer->start_time);
                                @endphp
                            @endif
                        @empty
                        @endforelse

                        {{--    get_time_spent_result in file global_helper     --}}
                        {{ get_time_spent_result($total_spend)  }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" >
                        {{ucwords('Project not assign to anyone')}}
                    </td>
                </tr>
            @endforelse
        @else
            <tr>
                <td colspan="5" >
                    {{ucwords('Project not assign to anyone')}}
                </td>
            </tr>
        @endif
        </tbody>

    </table>

    {{--project Milestones--}}

    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.milestone.title') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>
            <tr>
                <th>
                    {{ trans('cruds.milestone.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.milestone.fields.start_date') }}
                </th>
                <th>
                    {{ trans('cruds.milestone.fields.end_date') }}
                </th>
                <th>
                    {{ trans('cruds.project.fields.total_member_assigned') }}
                </th>
                <th>
                    {{ trans('cruds.task.title') }} Count
                </th>
            </tr>
        </thead>
        <tbody>
            @if($project->milestones)
                @forelse($project->milestones as $key => $milestone)
                    <tr data-entry-id="{{ $milestone->id }}">

                        <td>
                           {{ $milestone->name ?? '' }}
                        </td>
                        <td>
                            {{ $milestone->start_date ?? '' }}
                        </td>
                        <td>
                            {{ $milestone->end_date ?? '' }}
                        </td>
                        <td>
                            {{ $milestone->accountDetails ? $milestone->accountDetails->count() : '' }}
                        </td>
                        <td>
                            {{ $milestone->tasks ? $milestone->tasks->count() : '' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" >
                            No Milestone Found In This Project
                        </td>
                    </tr>
                @endforelse
            @else
                <tr>
                    <td colspan="5" >
                        No Milestone Found In This Project
                    </td>
                </tr>
            @endif
        </tbody>

    </table>

    {{--project Tasks--}}

    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.task.title') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>
        <tr>
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
                {{ trans('cruds.project.fields.total_member_assigned') }}
            </th>
            <th>
                {{ trans('cruds.project.fields.time_spend') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @if($project->tasks)
            @forelse($project->tasks as $key => $task)
                <tr data-entry-id="{{ $task->id }}">

                    <td>
                        {{ $task->name ?? '' }}
                    </td>
                    <td>
                        {{ $task->status->name ?? '' }}
                    </td>
                    <td>
                        {{ $task->start_date ?? '' }}
                    </td>
                    <td>
                        {{ $task->due_date ?? '' }}
                    </td>
                    <td>
                        {{ $task->accountDetails ? $task->accountDetails->count() : '' }}
                    </td>
                    <td>
                        @php
                            $total_spend = 0;
                        @endphp
                        @forelse($task->TimeSheet as $timer)

                            {{--    get_time_spent_result in file global_helper     --}}
                            @if($timer->end_time && $timer->start_time)
                                @php
                                    $total_spend += ($timer->end_time - $timer->start_time);
                                @endphp
                            @endif
                        @empty
                        @endforelse
                        {{ get_time_spent_result($total_spend)  }}
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" >
                        No Tasks Found In This Project
                    </td>
                </tr>
            @endforelse
        @else
            <tr>
                <td colspan="6" >
                    No Tasks Found In This Project
                </td>
            </tr>
        @endif
        </tbody>

    </table>

    {{--project Bugs--}}

    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.bug.title') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>
            <tr>

                <th>
                   {{ trans('cruds.bug.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.bug.fields.status') }}
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
                    {{ trans('cruds.project.fields.total_member_assigned') }}
                </th>

            </tr>
        </thead>
        <tbody>
            @if($project->bugs)
                @forelse($project->bugs as $key => $bug)
                    <tr data-entry-id="{{ $bug->id }}">

                        <td>
                            {{ $bug->name ?? '' }}
                        </td>
                        <td>
                            {{ $bug->status ?? '' }}
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
                            {{ $bug->accountDetails ? $bug->accountDetails->count() : '' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"> No bug  Found In This Project</td>
                    </tr>
                @endforelse
            @else
                <tr>
                    <td colspan="6"> No bug  Found In This Project</td>
                </tr>
            @endif
        </tbody>

    </table>

    {{--project Time Sheet--}}

    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.project.fields.time_sheet') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>
            <tr>
                <th>
                    {{ trans('cruds.user.title_singular') }}
                </th>
                <th>
                    {{ trans('cruds.project.fields.start_time') }}
                </th>
                <th>
                    {{ trans('cruds.project.fields.stop_time') }}
                </th>
                <th>
                    {{ trans('cruds.project.fields.reason') }}
                </th>
                <th>
                    {{ trans('cruds.project.fields.time_spend') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @if($project->TimeSheet)
                @forelse($project->TimeSheet as $key => $timer)
                    <tr data-entry-id="{{ $timer->id }}">

                        <td>
                            {{--                                                                {{ $timer->user->accountDetail->fullname ?? '' }}--}}
                            @if($timer->user->accountDetail)
                                {{ $timer->user->accountDetail->fullname ?? $timer->user->name}}
                                {{--<img class="img-thumbnail rounded-circle" title="{{ $timer->user->accountDetail->fullname ?? $timer->user->name}}" width="50%" src="{{ $timer->user->accountDetail->avatar ? str_replace('storage', 'storage', $timer->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $timer->user->accountDetail->fullname ?? $timer->user->name }}">--}}
                            @else
                                {{ $timer->user->name ?? ''}}
                                {{--<img class="img-thumbnail rounded-circle" title="{{ $timer->user->name ?? ''}}" width="50%" src="{{ asset('images/default.png') }}" alt="{{ $timer->user->name ?? '' }}">--}}

                            @endif
                        </td>
                        <td>
                            <span>{{ $timer->start_time ? date("F j, Y, g:i a",$timer->start_time): '' }}</span>
                        </td>
                        <td>
                            <span >{{ $timer->end_time ? date("F j, Y, g:i a",$timer->end_time): '' }}</span>
                        </td>
                        <td>
                           {{ $timer->reason ?? '' }}
                        </td>
                        <td>
                            {{--     get_time_spent_result in file global_helper --}}
                            @if($timer->end_time && $timer->start_time)
                                {{ get_time_spent_result($timer->end_time - $timer->start_time)  }}
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5"> No Time Sheet Found In This Project</td>
                    </tr>
                @endforelse
            @else
                <tr>
                    <td colspan="5"> No Time Sheet Found In This Project</td>
                </tr>
            @endif
        </tbody>

    </table>

    {{-- Project Tickets    --}}

    <p >{{ trans('cruds.project.title_singular') }}  {{ trans('cruds.ticket.title_singular') }} </p>

    <table class="table table-bordered tbl_header">
        <thead>
            <tr>

                <th>
                    {{ trans('cruds.ticket.fields.ticket_code') }}
                </th>
                <th>
                    {{ trans('cruds.ticket.fields.subject') }}
                </th>
                <th>
                    {{ trans('cruds.ticket.fields.created_at') }}
                </th>
                <th>
                    {{ trans('cruds.ticket.fields.status') }}
                </th>
                <th>
                    {{ trans('cruds.ticket.fields.reporter') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @if($project->tickets)
                @forelse($project->tickets as $key => $ticket)
                    <tr data-entry-id="{{ $ticket->id }}">

                        <td>
                            {{ $ticket->ticket_code ?? '' }}
                        </td>
                        <td>
                            {{ $ticket->subject ?? '' }}
                        </td>
                        <td>

                            {{ $ticket->created_at ?? '' }}
                        </td>
                        <td>
                            {{ $ticket->status ?? '' }}
                        </td>
                        <td>
                            {{ $ticket->reporterBy ? $ticket->reporterBy->name : '' }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6"> No Tickets Found In This Project</td>
                    </tr>
                @endforelse
            @else
                <tr>
                    <td colspan="6"> No Tickets Found In This Project</td>
                </tr>
            @endif
        </tbody>

    </table>
@endsection

