@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dailyAttendance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.daily-attendances.update", [$dailyAttendance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.dailyAttendance.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $dailyAttendance->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clock_in">{{ trans('cruds.dailyAttendance.fields.clock_in') }}</label>
                <input class="form-control {{ $errors->has('clock_in') ? 'is-invalid' : '' }}" type="text" name="clock_in" id="clock_in" value="{{ old('clock_in', $dailyAttendance->clock_in) }}">
                @if($errors->has('clock_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clock_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.clock_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clock_out">{{ trans('cruds.dailyAttendance.fields.clock_out') }}</label>
                <input class="form-control {{ $errors->has('clock_out') ? 'is-invalid' : '' }}" type="text" name="clock_out" id="clock_out" value="{{ old('clock_out', $dailyAttendance->clock_out) }}">
                @if($errors->has('clock_out'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clock_out') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.clock_out_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="absent">{{ trans('cruds.dailyAttendance.fields.absent') }}</label>
                <input class="form-control {{ $errors->has('absent') ? 'is-invalid' : '' }}" type="number" name="absent" id="absent" value="{{ old('absent', $dailyAttendance->absent) }}" step="1">
                @if($errors->has('absent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('absent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.absent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vacation">{{ trans('cruds.dailyAttendance.fields.vacation') }}</label>
                <input class="form-control {{ $errors->has('vacation') ? 'is-invalid' : '' }}" type="number" name="vacation" id="vacation" value="{{ old('vacation', $dailyAttendance->vacation) }}" step="1">
                @if($errors->has('vacation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vacation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.vacation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holiday">{{ trans('cruds.dailyAttendance.fields.holiday') }}</label>
                <input class="form-control {{ $errors->has('holiday') ? 'is-invalid' : '' }}" type="number" name="holiday" id="holiday" value="{{ old('holiday', $dailyAttendance->holiday) }}" step="1">
                @if($errors->has('holiday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('holiday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.holiday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_day">{{ trans('cruds.dailyAttendance.fields.created_day') }}</label>
                <input class="form-control date {{ $errors->has('created_day') ? 'is-invalid' : '' }}" type="text" name="created_day" id="created_day" value="{{ old('created_day', $dailyAttendance->created_day) }}">
                @if($errors->has('created_day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dailyAttendance.fields.created_day_helper') }}</span>
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