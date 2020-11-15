@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.monthlyAttendance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.monthly-attendances.update", [$monthlyAttendance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="total_hours">{{ trans('cruds.monthlyAttendance.fields.total_hours') }}</label>
                <input class="form-control {{ $errors->has('total_hours') ? 'is-invalid' : '' }}" type="number" name="total_hours" id="total_hours" value="{{ old('total_hours', $monthlyAttendance->total_hours) }}" step="1">
                @if($errors->has('total_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.monthlyAttendance.fields.total_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_absence">{{ trans('cruds.monthlyAttendance.fields.total_absence') }}</label>
                <input class="form-control {{ $errors->has('total_absence') ? 'is-invalid' : '' }}" type="number" name="total_absence" id="total_absence" value="{{ old('total_absence', $monthlyAttendance->total_absence) }}" step="1">
                @if($errors->has('total_absence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_absence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.monthlyAttendance.fields.total_absence_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_vacation">{{ trans('cruds.monthlyAttendance.fields.total_vacation') }}</label>
                <input class="form-control {{ $errors->has('total_vacation') ? 'is-invalid' : '' }}" type="number" name="total_vacation" id="total_vacation" value="{{ old('total_vacation', $monthlyAttendance->total_vacation) }}" step="1">
                @if($errors->has('total_vacation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_vacation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.monthlyAttendance.fields.total_vacation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holidays">{{ trans('cruds.monthlyAttendance.fields.holidays') }}</label>
                <input class="form-control {{ $errors->has('holidays') ? 'is-invalid' : '' }}" type="number" name="holidays" id="holidays" value="{{ old('holidays', $monthlyAttendance->holidays) }}" step="1">
                @if($errors->has('holidays'))
                    <div class="invalid-feedback">
                        {{ $errors->first('holidays') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.monthlyAttendance.fields.holidays_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_month">{{ trans('cruds.monthlyAttendance.fields.created_month') }}</label>
                <input class="form-control date {{ $errors->has('created_month') ? 'is-invalid' : '' }}" type="text" name="created_month" id="created_month" value="{{ old('created_month', $monthlyAttendance->created_month) }}">
                @if($errors->has('created_month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.monthlyAttendance.fields.created_month_helper') }}</span>
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