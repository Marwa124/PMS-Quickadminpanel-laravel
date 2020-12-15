@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.milestone.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.milestones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.id') }}
                        </th>
                        <td>
                            {{ $milestone->id }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.milestone.fields.user') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $milestone->user->name ?? '' }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.project') }}
                        </th>
                        <td>
                            {{ $milestone->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.name') }}
                        </th>
                        <td>
                            {{ $milestone->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.start_date') }}
                        </th>
                        <td>
                            {{ $milestone->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.end_date') }}
                        </th>
                        <td>
                            {{ $milestone->end_date }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.milestone.fields.client_visible') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $milestone->client_visible }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                </tbody>
            </table>
            <div class="form-group float-right">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.milestones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                @can('milestone_edit')
                    <a class="btn btn-info " href="{{ route('projectmanagement.admin.milestones.edit', $milestone->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
            </div>
            <div class="form-group">

            </div>
        </div>
    </div>
</div>



@endsection
