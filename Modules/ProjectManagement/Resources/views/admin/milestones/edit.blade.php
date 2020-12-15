@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.milestone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.milestones.update", [$milestone->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
{{--            <div class="form-group">--}}
{{--                <label class="required" for="user_id">{{ trans('cruds.milestone.fields.user') }}</label>--}}
{{--                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>--}}
{{--                    @foreach($users as $id => $user)--}}
{{--                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $milestone->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @if($errors->has('user'))--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('user') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <span class="help-block">{{ trans('cruds.milestone.fields.user_helper') }}</span>--}}
{{--            </div>--}}
            <div class="form-group">
                <label class="required" for="project_id">{{ trans('cruds.milestone.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $milestone->project->id ?? '') == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.milestone.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $milestone->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.milestone.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $milestone->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.milestone.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $milestone->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.end_date_helper') }}</span>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="client_visible">{{ trans('cruds.milestone.fields.client_visible') }}</label>--}}
{{--                <textarea class="form-control {{ $errors->has('client_visible') ? 'is-invalid' : '' }}" name="client_visible" id="client_visible">{{ old('client_visible', $milestone->client_visible) }}</textarea>--}}
{{--                @if($errors->has('client_visible'))--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('client_visible') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <span class="help-block">{{ trans('cruds.milestone.fields.client_visible_helper') }}</span>--}}
{{--            </div>--}}
            <div class="form-group float-right">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
