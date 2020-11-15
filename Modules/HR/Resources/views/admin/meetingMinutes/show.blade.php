@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.meetingMinute.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meeting-minutes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.id') }}
                        </th>
                        <td>
                            {{ $meetingMinute->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.user') }}
                        </th>
                        <td>
                            {{ $meetingMinute->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.name') }}
                        </th>
                        <td>
                            {{ $meetingMinute->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.attendees') }}
                        </th>
                        <td>
                            {{ App\Models\MeetingMinute::ATTENDEES_SELECT[$meetingMinute->attendees] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.location') }}
                        </th>
                        <td>
                            {{ $meetingMinute->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.description') }}
                        </th>
                        <td>
                            {!! $meetingMinute->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meeting-minutes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection