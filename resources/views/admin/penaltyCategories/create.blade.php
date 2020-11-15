@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.penaltyCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.penalty-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="type">{{ trans('cruds.penaltyCategory.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', '') }}" required>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penaltyCategory.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fine_amount">{{ trans('cruds.penaltyCategory.fields.fine_amount') }}</label>
                <input class="form-control {{ $errors->has('fine_amount') ? 'is-invalid' : '' }}" type="number" name="fine_amount" id="fine_amount" value="{{ old('fine_amount', '') }}" step="1" required>
                @if($errors->has('fine_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penaltyCategory.fields.fine_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="penelty_days">{{ trans('cruds.penaltyCategory.fields.penelty_days') }}</label>
                <input class="form-control {{ $errors->has('penelty_days') ? 'is-invalid' : '' }}" type="text" name="penelty_days" id="penelty_days" value="{{ old('penelty_days', '') }}" required>
                @if($errors->has('penelty_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('penelty_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penaltyCategory.fields.penelty_days_helper') }}</span>
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