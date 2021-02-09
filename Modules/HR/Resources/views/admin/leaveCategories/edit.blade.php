@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.leaveCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.leave-categories.update", [$leaveCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.leaveCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $leaveCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leave_quota">{{ trans('cruds.leaveCategory.fields.leave_quota') }}</label>
                <input class="form-control {{ $errors->has('leave_quota') ? 'is-invalid' : '' }}" type="number" name="leave_quota" id="leave_quota" value="{{ old('leave_quota', $leaveCategory->leave_quota) }}" step="1">
                @if($errors->has('leave_quota'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_quota') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveCategory.fields.leave_quota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deducted_amount">{{ trans('cruds.leaveCategory.fields.deducted_amount') }}</label>
                <input class="form-control {{ $errors->has('deducted_amount') ? 'is-invalid' : '' }}" type="text" name="deducted_amount" id="deducted_amount" value="{{ old('deducted_amount', $leaveCategory->deducted_amount) }}" step="1">
                @if($errors->has('deducted_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deducted_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveCategory.fields.deducted_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="annual_monthly">{{ trans('cruds.leaveCategory.fields.annual_monthly') }}</label>
                <select class="form-control {{ $errors->has('annual_monthly') ? 'is-invalid' : '' }}" name="annual_monthly" id="annual_monthly" required>
                    @foreach(Modules\HR\Entities\LeaveCategory::CATEGORY_TYPE as $key => $label)
                        <option value="{{ $key }}" 
                        {{ (old('annual_monthly') ? old('annual_monthly') : $leaveCategory->annual_monthly ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('annual_monthly'))
                    <div class="invalid-feedback">
                        {{ $errors->first('annual_monthly') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveCategory.fields.annual_monthly_helper') }}</span>
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