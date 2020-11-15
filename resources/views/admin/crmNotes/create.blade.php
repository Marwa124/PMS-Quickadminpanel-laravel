@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.crmNote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crm-notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.crmNote.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="note">{{ trans('cruds.crmNote.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note" required>{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="added_by">{{ trans('cruds.crmNote.fields.added_by') }}</label>
                <input class="form-control {{ $errors->has('added_by') ? 'is-invalid' : '' }}" type="number" name="added_by" id="added_by" value="{{ old('added_by', '') }}" step="1" required>
                @if($errors->has('added_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('added_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.added_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.crmNote.fields.is_client') }}</label>
                @foreach(App\Models\CrmNote::IS_CLIENT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_client') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_client_{{ $key }}" name="is_client" value="{{ $key }}" {{ old('is_client', 'no') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="is_client_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.is_client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.crmNote.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.crmNote.fields.user_helper') }}</span>
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