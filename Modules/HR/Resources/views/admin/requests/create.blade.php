@extends('layouts.admin')
@section('content')
@inject('clientMeetingModel', 'Modules\HR\Entities\ClientMeeting')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clientMeeting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.meetingMinute.fields.attendees') }}</label>
                <select class="form-control" name="users[]" id="attendees" multiple="multiple">
                    @foreach($users as $label)
                        @foreach ($label as $key => $item)
                           @if ($key != 0)
                            <option value="{{ $key }}" {{ old('users') === (string) $key ? 'selected' : '' }} {{ $key == 0 ? 'disabled' : '' }}>{{ $item }}</option>
                           @endif
                        @endforeach
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meetingMinute.fields.attendees_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">Request Type</label>
                <select class="form-control" name="request_type" id="request_type">
                    <option value disabled {{ old('request_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($clientMeetingModel::REQUEST_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('request_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('request_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_type') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="day">{{ trans('cruds.clientMeeting.fields.day') }}</label>
                <input class="form-control date {{ $errors->has('day') ? 'is-invalid' : '' }}" type="text" name="day" id="day" value="{{ old('day') }}">
                @if($errors->has('day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientMeeting.fields.day_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.clientMeeting.fields.day_hour') }}</label>
                <select class="form-control {{ $errors->has('day_hour') ? 'is-invalid' : '' }}" name="day_hour" id="day_hour" required>
                    <option value disabled {{ old('day_hour', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($clientMeetingModel::MEETING_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('day_hour', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('day_hour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('day_hour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientMeeting.fields.day_hour_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_time">{{ trans('cruds.clientMeeting.fields.from_time') }}</label>
                <input class="form-control {{ $errors->has('from_time') ? 'is-invalid' : '' }}" type="time" name="from_time" id="from_time" value="{{ old('from_time', '') }}">
                @if($errors->has('from_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientMeeting.fields.from_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_time">{{ trans('cruds.clientMeeting.fields.to_time') }}</label>
                <input class="form-control {{ $errors->has('to_time') ? 'is-invalid' : '' }}" type="time" name="to_time" id="to_time" value="{{ old('to_time', '') }}">
                @if($errors->has('to_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientMeeting.fields.to_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.clientMeeting.fields.comments') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{!! old('comments') !!}</textarea>
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientMeeting.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#attendees').select2();
        })
    </script>

@endsection
