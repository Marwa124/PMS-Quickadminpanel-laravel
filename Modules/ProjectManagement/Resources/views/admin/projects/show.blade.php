@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group ">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.client') }}
                        </th>
                        <td>
                            {{ $project->client->name ?? '' }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.progress') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->progress }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.calculate_progress') }}
                        </th>
                        <td>
                            {{ $project->calculate_progress }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <td>
                            {{ $project->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.end_date') }}
                        </th>
                        <td>
                            {{ $project->end_date }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.actual_completion') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->actual_completion }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.alert_overdue') }}
                        </th>
                        <td>
                            {{ $project->alert_overdue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_cost') }}
                        </th>
                        <td>
                            {{ $project->project_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.demo_url') }}
                        </th>
                        <td>
                            {{ $project->demo_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_status') }}
                        </th>
                        <td>
                            {{ $project->project_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {!! $project->description !!}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.notify_client') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ Modules\ProjectManagement\Entities\Project::NOTIFY_CLIENT_RADIO[$project->notify_client] ?? 'No' }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.timer_status') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ Modules\ProjectManagement\Entities\Project::TIMER_STATUS_RADIO[$project->timer_status] ?? '' }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.timer_started_by') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->timer_started_by }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.start_time') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->start_time }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.logged_time') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->logged_time }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}

                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.notes') }}
                        </th>
                        <td>
                            {!! $project->notes !!}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.hourly_rate') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->hourly_rate }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.project.fields.fixed_rate') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $project->fixed_rate }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.with_tasks') }}
                        </th>
                        <td>
                            {{ Modules\ProjectManagement\Entities\Project::WITH_TASKS_RADIO[$project->with_tasks] ?? 'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.estimate_hours') }}
                        </th>
                        <td>
                            {{ $project->estimate_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.title_singular') }}
                        </th>
                        <td>
                            @if($project->department)
                                {{  $project->department->department_name  }}
{{--                                <a class="btn btn-xs btn-primary" href="{{ route('projectmanagement.admin.project_specifications.show', $project->project_specification->id) }}">--}}
{{--                                    {{  $project->project_specification->name  }}--}}
{{--                                </a>--}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group float-right">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                @can('project_edit')
                    <a class="btn btn-info " href="{{ route('projectmanagement.admin.projects.edit', $project->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>



@endsection
