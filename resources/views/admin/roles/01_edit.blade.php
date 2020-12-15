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
        {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
    </div>
{{-- {{dd($role)}} --}}
    <div class="card-body">
        <form method="POST" action="{{ route("admin.roles.update", [$role->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $role->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>

            <div class="pt-2">
                <button type="button" class="btn btn-dark waves-effect btn-sm btn-toggle-all-permissions">toggle</button>
                <button type="button" class="btn btn-dark waves-effect btn-sm">add_all</button>
            </div>



                @foreach ($permissions as $index => $group)
                <?php
                    $permissionsGroup = $permissionGroupModel::find($index);
                ?>
                <div class="wrapper-group">
                    <label for="">{{$permissionsGroup->name}}</label> <br>
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
    $(function () {

        $('.custom-switch').click( function(e) {
            console.log("fhkjsdgd");
            console.log($(this).closest('input[type="checkbox"]').val());
            // console.log($(this).closest('label.switch').find('input[type="checkbox"]').val());
            $(this).closest('.switch').find('input[type="checkbox"]').val("555");
        })

    });
</script>

@endsection
