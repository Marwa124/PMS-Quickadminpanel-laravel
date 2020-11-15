@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.workTracking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.work-trackings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="work_type_id">{{ trans('cruds.workTracking.fields.work_type') }}</label>
                <select class="form-control select2 {{ $errors->has('work_type') ? 'is-invalid' : '' }}" name="work_type_id" id="work_type_id" required>
                    @foreach($work_types as $id => $work_type)
                        <option value="{{ $id }}" {{ old('work_type_id') == $id ? 'selected' : '' }}>{{ $work_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.work_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="achievement">{{ trans('cruds.workTracking.fields.achievement') }}</label>
                <input class="form-control {{ $errors->has('achievement') ? 'is-invalid' : '' }}" type="number" name="achievement" id="achievement" value="{{ old('achievement', '') }}" step="1">
                @if($errors->has('achievement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('achievement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.achievement_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.workTracking.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.workTracking.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.workTracking.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_work_achive">{{ trans('cruds.workTracking.fields.notify_work_achive') }}</label>
                <input class="form-control {{ $errors->has('notify_work_achive') ? 'is-invalid' : '' }}" type="text" name="notify_work_achive" id="notify_work_achive" value="{{ old('notify_work_achive', '') }}">
                @if($errors->has('notify_work_achive'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_work_achive') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.notify_work_achive_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_work_not_achive">{{ trans('cruds.workTracking.fields.notify_work_not_achive') }}</label>
                <input class="form-control {{ $errors->has('notify_work_not_achive') ? 'is-invalid' : '' }}" type="text" name="notify_work_not_achive" id="notify_work_not_achive" value="{{ old('notify_work_not_achive', '') }}">
                @if($errors->has('notify_work_not_achive'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_work_not_achive') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.notify_work_not_achive_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.workTracking.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_send">{{ trans('cruds.workTracking.fields.email_send') }}</label>
                <input class="form-control {{ $errors->has('email_send') ? 'is-invalid' : '' }}" type="text" name="email_send" id="email_send" value="{{ old('email_send', 'no') }}">
                @if($errors->has('email_send'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_send') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.email_send_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_id">{{ trans('cruds.workTracking.fields.account') }}</label>
                <select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id">
                    @foreach($accounts as $id => $account)
                        <option value="{{ $id }}" {{ old('account_id') == $id ? 'selected' : '' }}>{{ $account }}</option>
                    @endforeach
                </select>
                @if($errors->has('account'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workTracking.fields.account_helper') }}</span>
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