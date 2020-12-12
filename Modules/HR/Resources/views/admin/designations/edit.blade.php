@extends('layouts.admin')
@section('styles')
<style>
    .switch {
      position: absolute;
      display: flex;
      width: 30px;
      height: 17px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 13px;
        width: 13px;
        left: 4px;
        bottom: 2px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(11px);
      -ms-transform: translateX(11px);
      transform: translateX(11px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>
@endsection
@section('content')

@inject('permissionGroupModel', 'App\Models\PermissionGroup')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.designation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.designations.update", [$designation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="department_id" class="required">{{ trans('cruds.designation.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id">
                    @foreach($departments as $id => $department)
                        <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $designation->department->id ?? '') == $id ? 'selected' : '' }}>{{ $department }}</option>
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
                <label class="required" for="designation_name">{{ trans('cruds.designation.fields.designation_name') }}</label>
                <input class="form-control {{ $errors->has('designation_name') ? 'is-invalid' : '' }}" type="text" name="designation_name" id="designation_name" value="{{ old('designation_name', $designation->designation_name) }}" required>
                @if($errors->has('designation_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.designation_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_leader_id">Select Designation Leader</label>
                <select class="form-control select2 {{ $errors->has('leaderId') ? 'is-invalid' : '' }}" name="designation_leader_id" id="designation_leader_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ ($designation->designation_leader_id == $id) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('leaderId'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leaderId') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.department_helper') }}</span>
            </div>



















            <div class="pt-2">
                <button type="button" class="btn btn-dark waves-effect btn-sm btn-toggle-all-permissions">toggle</button>
                <button type="button" class="btn btn-dark waves-effect btn-sm">add_all</button>
            </div>



                @foreach ($permissions as $index => $group)
                {{-- {{dd($group)}} --}}
                <?php
                    $permissionsGroup = $permissionGroupModel::find($index);
                ?>
                <div class="wrapper-group">
                    <label for="">{{$permissionsGroup->name}}</label> <br>






                    <div class="actions mb-2">
                        <button
                            type="button"
                            class="btn btn-dark waves-effect btn-sm btn-toggle-permissions-in-group"
                            {{-- v-if="modeEdit && roleForm.id == role.id" --}}
                        >{{trans('toggle')}}</button>
                        <button
                            type="button"
                            class="btn btn-dark waves-effect btn-sm"
                            @click="addAllPermisssionsInGroup(group)"
                            {{-- v-if="modeEdit && roleForm.id == role.id" --}}
                        >{{trans('add_all')}}</button>
                    </div>






                    <div class="row">
                        @foreach ($group as $key => $item)
                        <div class="col-md-3">
                            <div class="custom-control custom-switch">
                                <label class="switch">
                                    <input
                                    type="checkbox"
                                    value="{{$key}}"
                                    name="permission_name"
                                    >
                                    <span class="slider round"></span>
                                    <div class="" style="margin-left: 125%; align-self: center; cursor: pointer !important;">{{$item->name}}</div>
                                </label>
                                {{-- <input
                                    type="checkbox"
                                    class="custom-control-input input-permission"
                                    value="{{$key}}"
                                    name="permission_name"
                                    style="cursor: pointer !important;"
                                    >
                                <label class="custom-control-label label-permission"  style="cursor: pointer !important;">
                                    {{$item->name}}
                                </label> --}}
                            </div>
                        </div> <!-- End Col-md-3 -->
                        @endforeach
                    </div> <br> <!-- End Row -->
                </div>
                @endforeach















            <div class="form-group">
                <label for="permissions">{{ trans('cruds.designation.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <span class="help-block">{{ trans('cruds.designation.fields.permissions_helper') }}</span>
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

@section('scripts')
@parent
<script>
    // $(function () {

    //     $.ajax({
    //         url: '{{url('permissions')}}',
    //         success: (res) => {
    //             console.log(res);
    //         }
    //     });

    // });

</script>
@endsection
