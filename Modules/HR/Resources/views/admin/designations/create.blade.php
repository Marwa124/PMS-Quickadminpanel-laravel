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
                <label for="designation_leader_id">Designation</label>
                <select class="form-control select2 {{ $errors->has('leaderId') ? 'is-invalid' : '' }}" name="designation_leader_id" id="designation_leader_id">
                    @foreach($designations as $id => $leaderId)
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
                <label for="permissions">{{ trans('cruds.designation.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                {{-- <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.permissions_helper') }}</span> --}}
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