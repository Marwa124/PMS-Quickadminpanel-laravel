@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employeeBank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employee-banks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.employeeBank.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.employeeBank.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_name">{{ trans('cruds.employeeBank.fields.branch_name') }}</label>
                <input class="form-control {{ $errors->has('branch_name') ? 'is-invalid' : '' }}" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', '') }}" required>
                @if($errors->has('branch_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.branch_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_name">{{ trans('cruds.employeeBank.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}" required>
                @if($errors->has('account_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_number">{{ trans('cruds.employeeBank.fields.account_number') }}</label>
                <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}" required>
                @if($errors->has('account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="routing_number">{{ trans('cruds.employeeBank.fields.routing_number') }}</label>
                <input class="form-control {{ $errors->has('routing_number') ? 'is-invalid' : '' }}" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', '') }}">
                @if($errors->has('routing_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('routing_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.routing_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_of_account">{{ trans('cruds.employeeBank.fields.type_of_account') }}</label>
                <input class="form-control {{ $errors->has('type_of_account') ? 'is-invalid' : '' }}" type="text" name="type_of_account" id="type_of_account" value="{{ old('type_of_account', '') }}">
                @if($errors->has('type_of_account'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_of_account') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeBank.fields.type_of_account_helper') }}</span>
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