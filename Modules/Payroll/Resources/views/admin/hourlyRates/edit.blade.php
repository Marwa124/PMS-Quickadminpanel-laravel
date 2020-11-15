@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hourlyRate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.hourly-rates.update", [$hourlyRate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="hourly_grade">{{ trans('cruds.hourlyRate.fields.hourly_grade') }}</label>
                <input class="form-control {{ $errors->has('hourly_grade') ? 'is-invalid' : '' }}" type="text" name="hourly_grade" id="hourly_grade" value="{{ old('hourly_grade', $hourlyRate->hourly_grade) }}" required>
                @if($errors->has('hourly_grade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hourly_grade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hourlyRate.fields.hourly_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hourly_rate">{{ trans('cruds.hourlyRate.fields.hourly_rate') }}</label>
                <input class="form-control {{ $errors->has('hourly_rate') ? 'is-invalid' : '' }}" type="text" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate', $hourlyRate->hourly_rate) }}" required>
                @if($errors->has('hourly_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hourly_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hourlyRate.fields.hourly_rate_helper') }}</span>
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