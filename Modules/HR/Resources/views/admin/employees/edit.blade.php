@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.employees.update", [$employee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="username">{{ trans('cruds.employee.fields.username') }}</label>
                <input disabled class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                type="text" name="username" id="username"
                value="{{ old('username', $employee->accountDetail()->first()->fullname) }}" required>
            </div>
            <div class="form-group">
                <label class="required" for="role_id">{{ trans('cruds.employee.fields.role') }}</label>
                <select class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role_id" id="role_id" >
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (old('role_id') ? old('role_id') : $employee->role->id ?? '') == $id ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('role'))
                    <div class="invalid-feedback">
                        {{ $errors->first('role') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.role_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.employee.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                {{$employee->role()->get()}}
                <?php 
                    foreach ($employee->roles()->get() as $key => $value) {
                        $arrPermission[] = $value->permissions()->get();
                    }
                    // dd($arrPermission);
                ?>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                    {{$employee->role->permissions->contains($id)}}
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $employee->role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                        {{-- <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $employee->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option> --}}
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.permissions_helper') }}</span>
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
