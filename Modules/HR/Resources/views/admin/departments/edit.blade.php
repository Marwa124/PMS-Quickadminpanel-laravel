@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.departments.update", [$department->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="department_name">{{ trans('cruds.department.fields.department_name') }}</label>
                <input class="form-control {{ $errors->has('department_name') ? 'is-invalid' : '' }}" type="text" name="department_name" id="department_name" value="{{ old('department_name', $department->department_name) }}" required>
                @if($errors->has('department_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_head_id">{{ trans('cruds.department.fields.department_head') }}</label>
                <select class="form-control select2 {{ $errors->has('department_head') ? 'is-invalid' : '' }}" name="department_head_id" id="department_head_id">
                    @foreach($department_heads as $id => $department_head)
                        <option value="{{ $id }}" {{ (old('department_head_id') ? old('department_head_id') : $department->department_head->id ?? '') == $id ? 'selected' : '' }}>{{ $department_head }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_head'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department_head') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_head_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.department.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $department->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="encryption">{{ trans('cruds.department.fields.encryption') }}</label>
                <input class="form-control {{ $errors->has('encryption') ? 'is-invalid' : '' }}" type="text" name="encryption" id="encryption" value="{{ old('encryption', $department->encryption) }}">
                @if($errors->has('encryption'))
                    <div class="invalid-feedback">
                        {{ $errors->first('encryption') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.encryption_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="host">{{ trans('cruds.department.fields.host') }}</label>
                <input class="form-control {{ $errors->has('host') ? 'is-invalid' : '' }}" type="text" name="host" id="host" value="{{ old('host', $department->host) }}">
                @if($errors->has('host'))
                    <div class="invalid-feedback">
                        {{ $errors->first('host') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.host_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="username">{{ trans('cruds.department.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', $department->username) }}">
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('cruds.department.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mailbox">{{ trans('cruds.department.fields.mailbox') }}</label>
                <input class="form-control {{ $errors->has('mailbox') ? 'is-invalid' : '' }}" type="text" name="mailbox" id="mailbox" value="{{ old('mailbox', $department->mailbox) }}">
                @if($errors->has('mailbox'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mailbox') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.mailbox_helper') }}</span>
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