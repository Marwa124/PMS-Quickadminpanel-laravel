@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dashboardSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dashboard-settings.update", [$dashboardSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.dashboardSetting.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $dashboardSetting->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dashboardSetting.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="col">{{ trans('cruds.dashboardSetting.fields.col') }}</label>
                <input class="form-control {{ $errors->has('col') ? 'is-invalid' : '' }}" type="text" name="col" id="col" value="{{ old('col', $dashboardSetting->col) }}">
                @if($errors->has('col'))
                    <div class="invalid-feedback">
                        {{ $errors->first('col') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dashboardSetting.fields.col_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_no">{{ trans('cruds.dashboardSetting.fields.order_no') }}</label>
                <input class="form-control {{ $errors->has('order_no') ? 'is-invalid' : '' }}" type="number" name="order_no" id="order_no" value="{{ old('order_no', $dashboardSetting->order_no) }}" step="1" required>
                @if($errors->has('order_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dashboardSetting.fields.order_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.dashboardSetting.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $dashboardSetting->status) }}" step="1" required>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dashboardSetting.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="report">{{ trans('cruds.dashboardSetting.fields.report') }}</label>
                <input class="form-control {{ $errors->has('report') ? 'is-invalid' : '' }}" type="number" name="report" id="report" value="{{ old('report', $dashboardSetting->report) }}" step="1" required>
                @if($errors->has('report'))
                    <div class="invalid-feedback">
                        {{ $errors->first('report') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dashboardSetting.fields.report_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="for_staff">{{ trans('cruds.dashboardSetting.fields.for_staff') }}</label>
                <input class="form-control {{ $errors->has('for_staff') ? 'is-invalid' : '' }}" type="number" name="for_staff" id="for_staff" value="{{ old('for_staff', $dashboardSetting->for_staff) }}" step="1">
                @if($errors->has('for_staff'))
                    <div class="invalid-feedback">
                        {{ $errors->first('for_staff') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dashboardSetting.fields.for_staff_helper') }}</span>
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