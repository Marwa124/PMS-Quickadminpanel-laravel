@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.account.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.accounts.update", [$account->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.account.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $account->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.account.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $account->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="balance">{{ trans('cruds.account.fields.balance') }}</label>
                <input class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}" type="text" name="balance" id="balance" value="{{ old('balance', $account->balance) }}">
                @if($errors->has('balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.account.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $account->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.permissions_helper') }}</span>
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