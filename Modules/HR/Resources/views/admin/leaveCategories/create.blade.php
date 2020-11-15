@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.leaveCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leave-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.leaveCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leave_quota">{{ trans('cruds.leaveCategory.fields.leave_quota') }}</label>
                <input class="form-control {{ $errors->has('leave_quota') ? 'is-invalid' : '' }}" type="number" name="leave_quota" id="leave_quota" value="{{ old('leave_quota', '') }}" step="1">
                @if($errors->has('leave_quota'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_quota') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveCategory.fields.leave_quota_helper') }}</span>
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