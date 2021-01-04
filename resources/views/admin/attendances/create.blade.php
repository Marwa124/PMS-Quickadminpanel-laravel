@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.attendances.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.attendances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.attendances.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leave_application_id">{{ trans('cruds.attendances.fields.leave_application') }}</label>
                <select class="form-control select2 {{ $errors->has('leave_application') ? 'is-invalid' : '' }}" name="leave_application_id" id="leave_application_id">
                    @foreach($leave_applications as $id => $leave_application)
                        <option value="{{ $id }}" {{ old('leave_application_id') == $id ? 'selected' : '' }}>{{ $leave_application }}</option>
                    @endforeach
                </select>
                @if($errors->has('leave_application'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_application') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.leave_application_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_in">{{ trans('cruds.attendances.fields.date_in') }}</label>
                <input class="form-control date {{ $errors->has('date_in') ? 'is-invalid' : '' }}" type="text" name="date_in" id="date_in" value="{{ old('date_in') }}">
                @if($errors->has('date_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.date_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_out">{{ trans('cruds.attendances.fields.date_out') }}</label>
                <input class="form-control date {{ $errors->has('date_out') ? 'is-invalid' : '' }}" type="text" name="date_out" id="date_out" value="{{ old('date_out') }}">
                @if($errors->has('date_out'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_out') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.date_out_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.attendances.fields.attendance_status') }}</label>
                <select class="form-control {{ $errors->has('attendance_status') ? 'is-invalid' : '' }}" name="attendance_status" id="attendance_status">
                    <option value disabled {{ old('attendance_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\attendances::ATTENDANCE_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('attendance_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('attendance_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attendance_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.attendance_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clocking_status">{{ trans('cruds.attendances.fields.clocking_status') }}</label>
                <input class="form-control {{ $errors->has('clocking_status') ? 'is-invalid' : '' }}" type="number" name="clocking_status" id="clocking_status" value="{{ old('clocking_status', '') }}" step="1">
                @if($errors->has('clocking_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clocking_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.clocking_status_helper') }}</span>
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