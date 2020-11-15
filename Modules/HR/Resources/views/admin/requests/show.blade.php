@extends('layouts.admin')
@section('content')
@inject('clientMeetingModel', 'Modules\HR\Entities\ClientMeeting')


<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientMeeting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.client-meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.id') }}
                        </th>
                        <td>
                            {{ $clientMeeting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.user') }}
                        </th>
                        <td>
                            {{ $clientMeeting->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.day') }}
                        </th>
                        <td>
                            {{ $clientMeeting->day ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.day_hour') }}
                        </th>
                        <td>
                            {{ $clientMeetingModel::MEETING_STATUS_SELECT[$clientMeeting->day_hour] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.from_time') }}
                        </th>
                        <td>
                            {{ $clientMeeting->from_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.to_time') }}
                        </th>
                        <td>
                            {{ $clientMeeting->to_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.status') }}
                        </th>
                        <td>
                            {{ $clientMeetingModel::STATUS_SELECT[$clientMeeting->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.comments') }}
                        </th>
                        <td>
                            {!! $clientMeeting->comments !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $clientMeeting->approved_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.client-meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
