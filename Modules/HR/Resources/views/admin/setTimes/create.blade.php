@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setTime.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.set-times.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.setTime.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setTime.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label for="in_time">{{ trans('cruds.setTime.fields.in_time') }}</label>
                <input class="form-control {{ $errors->has('in_time') ? 'is-invalid' : '' }}" type="time" name="in_time" id="in_time" value="{{ old('in_time', '') }}">
                @if($errors->has('in_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setTime.fields.in_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="out_time">{{ trans('cruds.setTime.fields.out_time') }}</label>
                <input class="form-control {{ $errors->has('out_time') ? 'is-invalid' : '' }}" type="time" name="out_time" id="out_time" value="{{ old('out_time', '') }}">
                @if($errors->has('out_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('out_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setTime.fields.out_time_helper') }}</span>
            </div>
            <div class="form-group">
              <label for="allow_clock_in_late">{{ trans('cruds.setTime.fields.allow_clock_in_late') }}</label>
              <input class="form-control {{ $errors->has('allow_clock_in_late') ? 'is-invalid' : '' }}" type="time" name="allow_clock_in_late" id="allow_clock_in_late" value="{{ old('allow_clock_in_late', '') }}">
              @if($errors->has('allow_clock_in_late'))
                  <div class="invalid-feedback">
                      {{ $errors->first('allow_clock_in_late') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.setTime.fields.allow_clock_in_late_helper') }}</span>
          </div>
          <div class="form-group">
              <label for="allow_leave_early">{{ trans('cruds.setTime.fields.allow_leave_early') }}</label>
              <input class="form-control {{ $errors->has('allow_leave_early') ? 'is-invalid' : '' }}" type="time" name="allow_leave_early" id="allow_leave_early" value="{{ old('allow_leave_early', '') }}">
              @if($errors->has('allow_leave_early'))
                  <div class="invalid-feedback">
                      {{ $errors->first('allow_leave_early') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.setTime.fields.allow_leave_early_helper') }}</span>
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