@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.technicalCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.technical-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="beginner">{{ trans('cruds.technicalCategory.fields.beginner') }}</label>
                <input class="form-control {{ $errors->has('beginner') ? 'is-invalid' : '' }}" type="text" name="beginner" id="beginner" value="{{ old('beginner', 'Beginner') }}">
                @if($errors->has('beginner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beginner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.technicalCategory.fields.beginner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="intermediate">{{ trans('cruds.technicalCategory.fields.intermediate') }}</label>
                <input class="form-control {{ $errors->has('intermediate') ? 'is-invalid' : '' }}" type="text" name="intermediate" id="intermediate" value="{{ old('intermediate', 'Intermediate') }}">
                @if($errors->has('intermediate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('intermediate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.technicalCategory.fields.intermediate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="advanced">{{ trans('cruds.technicalCategory.fields.advanced') }}</label>
                <input class="form-control {{ $errors->has('advanced') ? 'is-invalid' : '' }}" type="text" name="advanced" id="advanced" value="{{ old('advanced', 'Advanced') }}">
                @if($errors->has('advanced'))
                    <div class="invalid-feedback">
                        {{ $errors->first('advanced') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.technicalCategory.fields.advanced_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expert_leader">{{ trans('cruds.technicalCategory.fields.expert_leader') }}</label>
                <input class="form-control {{ $errors->has('expert_leader') ? 'is-invalid' : '' }}" type="text" name="expert_leader" id="expert_leader" value="{{ old('expert_leader', 'Expert / Leader') }}">
                @if($errors->has('expert_leader'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expert_leader') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.technicalCategory.fields.expert_leader_helper') }}</span>
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