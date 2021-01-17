@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.designation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.designations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="department_id">{{ trans('cruds.designation.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id">
                    @foreach($departments as $id => $department)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $department }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_leader_id">{{trans('cruds.designation.fields.designation_leader')}}</label>
                <select class="form-control select2 {{ $errors->has('leaderId') ? 'is-invalid' : '' }}" name="designation_leader_id" id="designation_leader_id">
                    @foreach($users as $id => $leaderId)
                        <option value="{{ $id }}" {{ old('designation_leader_id') == $id ? 'selected' : '' }}>{{ $leaderId }}</option>
                    @endforeach
                </select>
                @if($errors->has('leaderId'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leaderId') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="designation_name">{{ trans('cruds.designation.fields.designation_name') }}</label>
                <input class="form-control {{ $errors->has('designation_name') ? 'is-invalid' : '' }}" type="text" name="designation_name" id="designation_name" value="{{ old('designation_name', '') }}" required>
                @if($errors->has('designation_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.designation_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="designation_name_ar">{{ trans('cruds.designation.fields.designation_name_ar') }}</label>
                <input class="form-control {{ $errors->has('designation_name_ar') ? 'is-invalid' : '' }}" type="text" name="designation_name_ar " id="designation_name_ar" value="{{ old('designation_name_ar', '') }}" required>
                @if($errors->has('designation_name_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation_name_ar') }}
                    </div>
                @endif
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