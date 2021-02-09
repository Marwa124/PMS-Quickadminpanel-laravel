@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.milestone.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("projectmanagement.admin.milestones.update", [$milestone->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="project_id">{{ trans('cruds.milestone.fields.project') }}</label>
                        <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}"
                                name="project_id" id="project_id" required>
                            <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                            @foreach($projects as $id => $project)
                                <option
                                    value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $milestone->project->id ?? '') == $id ? 'selected' : '' }}>{{ $project }}</option>
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
                        <label class="required" for="name_en">{{ trans('cruds.milestone.fields.name_en') }}</label>
                        <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text"
                               name="name_en" id="name_en" value="{{ old('name_en', $milestone->name_en) }}" required>
                        @if($errors->has('name_en'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name_en') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.milestone.fields.name_en_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="name_ar">{{ trans('cruds.milestone.fields.name_ar') }}</label>
                        <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text"
                               name="name_ar" id="name_ar" value="{{ old('name_ar', $milestone->name_ar) }}" required>
                        @if($errors->has('name_ar'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name_ar') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.milestone.fields.name_ar_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required"
                               for="start_date">{{ trans('cruds.milestone.fields.start_date') }}</label>
                        <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                               type="text" name="start_date" id="start_date"
                               value="{{ old('start_date', $milestone->start_date) }}" required>
                        @if($errors->has('start_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('start_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.milestone.fields.start_date_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="end_date">{{ trans('cruds.milestone.fields.end_date') }}</label>
                        <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text"
                               name="end_date" id="end_date" value="{{ old('end_date', $milestone->end_date) }}"
                               required>
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
                </div>
                <div class="col-md-6 form-group float-right">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
