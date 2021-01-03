@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.taxRate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("materialssuppliers.admin.tax-rates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.taxRate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taxRate.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rate_percent">{{ trans('cruds.taxRate.fields.rate_percent') }}</label>
                <input class="form-control {{ $errors->has('rate_percent') ? 'is-invalid' : '' }}" type="number" name="rate_percent" id="rate_percent" value="{{ old('rate_percent', '') }}" step="0.01" min="0.01" required>
                @if($errors->has('rate_percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rate_percent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taxRate.fields.rate_percent_helper') }}</span>
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