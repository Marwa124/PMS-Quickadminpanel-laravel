@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userAlert.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-alerts.update", [$userAlert->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="model_path">{{ trans('cruds.userAlert.fields.model_path') }}</label>
                <input class="form-control {{ $errors->has('model_path') ? 'is-invalid' : '' }}" type="text" name="model_path" id="model_path" value="{{ old('model_path', $userAlert->model_path) }}">
                @if($errors->has('model_path'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model_path') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.model_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.userAlert.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="number" name="model" id="model" value="{{ old('model', $userAlert->model) }}" step="1">
                @if($errors->has('model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.model_helper') }}</span>
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