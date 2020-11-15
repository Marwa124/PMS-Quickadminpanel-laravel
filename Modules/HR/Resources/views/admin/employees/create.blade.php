@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.employees.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="username">{{ trans('cruds.employee.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', '') }}" required>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.employee.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.employee.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.employee.fields.permissions') }}</label>
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
                <span class="help-block">{{ trans('cruds.employee.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_join">{{ trans('cruds.employee.fields.date_of_join') }}</label>
                <input class="form-control date {{ $errors->has('date_of_join') ? 'is-invalid' : '' }}" type="text" name="date_of_join" id="date_of_join" value="{{ old('date_of_join') }}">
                @if($errors->has('date_of_join'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_join') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.date_of_join_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_insurance">{{ trans('cruds.employee.fields.date_of_insurance') }}</label>
                <input class="form-control date {{ $errors->has('date_of_insurance') ? 'is-invalid' : '' }}" type="text" name="date_of_insurance" id="date_of_insurance" value="{{ old('date_of_insurance') }}">
                @if($errors->has('date_of_insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.date_of_insurance_helper') }}</span>
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
