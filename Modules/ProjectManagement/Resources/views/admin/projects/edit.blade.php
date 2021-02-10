@extends('layouts.admin')

@section('styles')
    <style>
        input[type=range] {
            height: 35px;
            -webkit-appearance: none;
            margin: 10px 0;
            width: 100%;
        }
        input[type=range]:focus {
            outline: none;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 10px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #000000;
            background: #3071A9;
            border-radius: 5px;
            border: 1px solid #000000;
        }
        input[type=range]::-webkit-slider-thumb {
            box-shadow: 1px 1px 1px #000000;
            border: 1px solid #000000;
            height: 27px;
            width: 17px;
            border-radius: 11px;
            background: #FFFFFF;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -9.5px;
        }
        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #3071A9;
        }
        input[type=range]::-moz-range-track {
            width: 100%;
            height: 10px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #000000;
            background: #3071A9;
            border-radius: 5px;
            border: 1px solid #000000;
        }
        input[type=range]::-moz-range-thumb {
            box-shadow: 1px 1px 1px #000000;
            border: 1px solid #000000;
            height: 27px;
            width: 17px;
            border-radius: 11px;
            background: #FFFFFF;
            cursor: pointer;
        }
        input[type=range]::-ms-track {
            width: 100%;
            height: 10px;
            cursor: pointer;
            animate: 0.2s;
            background: transparent;
            border-color: transparent;
            color: transparent;
        }
        input[type=range]::-ms-fill-lower {
            background: #3071A9;
            border: 1px solid #000000;
            border-radius: 10px;
            box-shadow: 1px 1px 1px #000000;
        }
        input[type=range]::-ms-fill-upper {
            background: #3071A9;
            border: 1px solid #000000;
            border-radius: 10px;
            box-shadow: 1px 1px 1px #000000;
        }
        input[type=range]::-ms-thumb {
            margin-top: 1px;
            box-shadow: 1px 1px 1px #000000;
            border: 1px solid #000000;
            height: 27px;
            width: 17px;
            border-radius: 11px;
            background: #FFFFFF;
            cursor: pointer;
        }
        input[type=range]:focus::-ms-fill-lower {
            background: #3071A9;
        }
        input[type=range]:focus::-ms-fill-upper {
            background: #3071A9;
        }


    </style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.projects.update", [$project->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-6 float-left">


                <div class="form-group">
                    <label class="required" for="name_en">{{ trans('cruds.project.fields.name_en') }}</label>
                    <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $project->name_en) }}" required>
                    @if($errors->has('name_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.name_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_ar">{{ trans('cruds.project.fields.name_ar') }}</label>
                    <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $project->name_ar) }}" required>
                    @if($errors->has('name_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_ar') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.name_ar_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                    <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                        <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                        @foreach($clients as $id => $client)
                            <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $project->client->id ?? '') == $id ? 'selected' : '' }}>{{ $client }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('client'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
                </div>

                <div class="form-group w3-light-grey w3-xlarge" id="div_progress_input">
                    <label for="calculate_progress">{{ trans('cruds.project.fields.calculate_progress') }}</label>
                    <input class="form-control w3-container w3-green {{ $errors->has('calculate_progress') ? 'is-invalid' : '' }}" type="range"
                           min="0" max="100" name="calculate_progress" id="calculate_progress" value="{{ old('calculate_progress', $project->calculate_progress) }}" onchange="displayProgressValue()" {{$project->progress?'disabled':''}}>
                    <span id="old_value" class="{{$project->calculate_progress? 'visible': 'invisible'}}" style="margin-left: 40%; ">Progress {{$project->calculate_progress}}%</span>
                    <span id="progress_value" class="invisible" style="margin-left: 40%;"></span>
                    @if($errors->has('calculate_progress'))
                        <div class="invalid-feedback">
                            {{ $errors->first('calculate_progress') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.calculate_progress_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date) }}" required>
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="end_date">{{ trans('cruds.project.fields.end_date') }}</label>
                    <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date) }}" required>
                    @if($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.end_date_helper') }}</span>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label class="required" for="alert_overdue">{{ trans('cruds.project.fields.alert_overdue') }}</label>--}}
                    {{--<input class="form-control {{ $errors->has('alert_overdue') ? 'is-invalid' : '' }}" type="number" name="alert_overdue" id="alert_overdue" value="{{ old('alert_overdue', $project->alert_overdue) }}" step="1" required>--}}
                    {{--@if($errors->has('alert_overdue'))--}}
                        {{--<div class="invalid-feedback">--}}
                            {{--{{ $errors->first('alert_overdue') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--<span class="help-block">{{ trans('cruds.project.fields.alert_overdue_helper') }}</span>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="project_cost">{{ trans('cruds.project.fields.project_cost') }}</label>
                    <input class="form-control {{ $errors->has('project_cost') ? 'is-invalid' : '' }}" type="number" name="project_cost" id="project_cost" value="{{ old('project_cost', $project->project_cost) }}" step="1.00" placeholder="50">
                    @if($errors->has('project_cost'))
                        <div class="invalid-feedback">
                            {{ $errors->first('project_cost') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.project_cost_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="demo_url">{{ trans('cruds.project.fields.demo_url') }}</label>
                    <input class="form-control {{ $errors->has('demo_url') ? 'is-invalid' : '' }}" type="text" name="demo_url" id="demo_url" value="{{ old('demo_url', $project->demo_url) }}" placeholder="http://www.demourl.com">
                    @if($errors->has('demo_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('demo_url') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.demo_url_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="project_status">{{ trans('cruds.project.fields.project_status') }}</label>
                    <select name="project_status" id="project_status" class="form-control {{ $errors->has('project_status') ? 'is-invalid' : '' }}">
                        <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                        <option value="started"     {{ $project->project_status == 'started'        ? 'selected' : (old('project_status') == 'started'      ? 'selected' : '' )}}>{{trans('cruds.status.started')}}</option>
                        <option value="in_progress" {{ $project->project_status == 'in_progress'    ? 'selected' : (old('project_status') == 'in_progress'  ? 'selected' : '') }}>{{trans('cruds.status.in_progress')}}</option>
                        <option value="on_hold"     {{ $project->project_status == 'on_hold'        ? 'selected' : (old('project_status') == 'on_hold'      ? 'selected' : '') }}>{{trans('cruds.status.on_hold')}}</option>
                        <option value="cancel"      {{ $project->project_status == 'cancel'         ? 'selected' : (old('project_status') == 'cancel'       ? 'selected' : '') }}>{{trans('cruds.status.cancel')}}</option>
                        <option value="completed"   {{ $project->project_status == 'completed'      ? 'selected' : (old('project_status') == 'completed'    ? 'selected' : '') }}>{{trans('cruds.status.completed')}}</option>
                        <option value="overdue"     {{ $project->project_status == 'overdue'        ? 'selected' : (old('project_status') == 'overdue'      ? 'selected' : '') }}>{{trans('cruds.status.overdue')}}</option>
                    </select>
    {{--                <input class="form-control {{ $errors->has('project_status') ? 'is-invalid' : '' }}" type="text" name="project_status" id="project_status" value="{{ old('project_status', $project->project_status) }}">--}}
                    @if($errors->has('project_status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('project_status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.project_status_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="estimate_hours">{{ trans('cruds.project.fields.estimate_hours') }}</label>
                    <input class="form-control {{ $errors->has('estimate_hours') ? 'is-invalid' : '' }}" type="text" name="estimate_hours" id="estimate_hours" value="{{ old('estimate_hours', $project->estimate_hours) }}" placeholder="Ex: 20">
                    @if($errors->has('estimate_hours'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estimate_hours') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.project.fields.estimate_hours_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="department_id">{{ trans('cruds.department.title_singular') }}</label>
                    <select class="form-control select2 {{ $errors->has('department_id') ? 'is-invalid' : '' }}" name="department_id" id="department_id">
                        <option value="" selected disabled>{{trans('global.pleaseSelect')}} {{ trans('cruds.department.title_singular') }}</option>

                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ !$project->department_id ? '' : old('department_id') == $project->department_id ? 'selected' : $department->id == $project->department_id ?  'selected' : '' }}>{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('department_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('department_id') }}
                        </div>
                    @endif
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="form-group col-md-12">
                <label for="description_en">{{ trans('cruds.project.fields.description_en') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en">{!! old('description_en',$project->description_en) !!}</textarea>
                @if($errors->has('description_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.description_en_helper') }}</span>
            </div>
            <div class="form-group col-md-12">
                <label for="description_ar">{{ trans('cruds.project.fields.description_ar') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{!! old('description_ar',$project->description_ar) !!}</textarea>
                @if($errors->has('description_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.description_ar_helper') }}</span>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-danger float-right" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>

        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/projectmanagement/projects/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $project->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});

    function displayProgressValue() {
        var value = document.getElementById("calculate_progress").value;
        document.getElementById("progress_value").classList.add('visible');
        document.getElementById("progress_value").classList.remove('invisible');
        document.getElementById("old_value").style.display = 'none';
        document.getElementById("progress_value").innerHTML = "{{trans('cruds.task.fields.progress')}} "+ value + "%";
    }

</script>

@endsection
