@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bug.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.bugs.update", [$bug->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-sm-12">

                <div class="col-sm-6 float-left">
                    <div class="form-group">
                        <label class="required" for="name_en">{{ trans('cruds.bug.fields.name_en') }}</label>
                        <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $bug->name_en) }}" required>
                        @if($errors->has('name_en'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name_en') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.name_en_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="name_ar">{{ trans('cruds.bug.fields.name_ar') }}</label>
                        <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $bug->name_ar) }}" required>
                        @if($errors->has('name_ar'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name_ar') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.name_ar_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="old_project" id="old_project" value="{{old('project_id') ?? $bug->project->id }}"/>
                        <label for="project_id">{{ trans('cruds.bug.fields.project') }}</label>
                        <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" {{--onchange="getProjectId()"--}}>
                            <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                            @foreach($projects as $id => $project)
                                <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $bug->project->id ?? '') == $id ? 'selected' : '' }}>{{ $project }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('project'))
                            <div class="invalid-feedback">
                                {{ $errors->first('project') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.project_helper') }}</span>
                    </div>

{{--                    <div class="form-group"  id="task_div">--}}
{{--                        <label for="task_id">{{ trans('cruds.bug.fields.task') }}</label>--}}
{{--                        <input type="hidden" name="old_task" id="old_task" value="{{old('task_id') ?? $bug->task->id}}"/>--}}
{{--                        <input type="hidden" name="tasks" id="tasks" value="{{$tasks}}"/>--}}
{{--                        <select class="form-control select2 {{ $errors->has('task') ? 'is-invalid' : '' }}" name="task_id" id="task_id">--}}

{{--                        </select>--}}
{{--                        @if($errors->has('task'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('task') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <span class="help-block">{{ trans('cruds.bug.fields.task_helper') }}</span>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="description_en">{{ trans('cruds.bug.fields.description_en') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en">{!! old('description_en', $bug->description_en) !!}</textarea>
                        @if($errors->has('description_en'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description_en') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.description_en_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="description_ar">{{ trans('cruds.bug.fields.description_ar') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{!! old('description_ar', $bug->description_ar) !!}</textarea>
                        @if($errors->has('description_ar'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description_ar') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.description_ar_helper') }}</span>
                    </div>
                </div>
                <div class="col-sm-6 float-right">
                    <div class="form-group">
                        <label for="status">{{ trans('cruds.bug.fields.status') }}</label>
                        <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                            <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                            <option value="unconfirm"   {{ old('status', $bug->status) == 'unconfirm'   ? 'selected' : '' }}>{{trans('cruds.status.unconfirm')}}</option>
                            <option value="confirmed"   {{ old('status', $bug->status) == 'confirmed'   ? 'selected' : '' }}>{{trans('cruds.status.confirmed')}}</option>
                            <option value="in_progress" {{ old('status', $bug->status) == 'in_progress' ? 'selected' : '' }}>{{trans('cruds.status.in_progress')}}</option>
                            <option value="resolved"    {{ old('status', $bug->status) == 'resolved'    ? 'selected' : '' }}>{{trans('cruds.status.resolved')}}</option>
                            <option value="verified"    {{ old('status', $bug->status) == 'verified'    ? 'selected' : '' }}>{{trans('cruds.status.verified')}}</option>
                        </select>
{{--                        <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $bug->status) }}">--}}
                        @if($errors->has('status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.status_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required" for="priority">{{ trans('cruds.bug.fields.priority') }}</label>
                        <select class="form-control select2 {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" id="priority">
                            <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                            <option value="low"     {{ old('priority', $bug->priority) == 'low'    ? 'selected' : '' }}>{{trans('cruds.status.low')}}</option>
                            <option value="medium"  {{ old('priority', $bug->priority) == 'medium' ? 'selected' : '' }}>{{trans('cruds.status.medium')}}</option>
                            <option value="high"    {{ old('priority', $bug->priority) == 'high'   ? 'selected' : '' }}>{{trans('cruds.status.high')}}</option>
                        </select>
{{--                        <input class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" type="text" name="priority" id="priority" value="{{ old('priority', $bug->priority) }}" required>--}}
                        @if($errors->has('priority'))
                            <div class="invalid-feedback">
                                {{ $errors->first('priority') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.priority_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="severity">{{ trans('cruds.bug.fields.severity') }}</label>
                        <select class="form-control select2 {{ $errors->has('severity') ? 'is-invalid' : '' }}" name="severity" id="severity">
                            <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                            <option value="minor"           {{ old('severity', $bug->severity) == 'minor'        ? 'selected' : '' }}>{{trans('cruds.status.minor')}}</option>
                            <option value="major"           {{ old('severity', $bug->severity) == 'major'        ? 'selected' : '' }}>{{trans('cruds.status.major')}}</option>
                            <option value="show_stopper"    {{ old('severity', $bug->severity) == 'show stopper' ? 'selected' : '' }}>{{trans('cruds.status.show_stopper')}}</option>
                            <option value="must_fixed"      {{ old('severity', $bug->severity) == 'must be fixed'? 'selected' : '' }}>{{trans('cruds.status.must_fixed')}}</option>
                        </select>
{{--                        <input class="form-control {{ $errors->has('severity') ? 'is-invalid' : '' }}" type="text" name="severity" id="severity" value="{{ old('severity', $bug->severity) }}">--}}
                        @if($errors->has('severity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('severity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.severity_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="reproducibility">{{ trans('cruds.bug.fields.reproducibility') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('reproducibility') ? 'is-invalid' : '' }}" name="reproducibility" id="reproducibility">{!! old('reproducibility', $bug->reproducibility) !!}</textarea>
                        @if($errors->has('reproducibility'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reproducibility') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.reproducibility_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.bug.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $bug->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.notes_helper') }}</span>
            </div>

            <div class="form-group float-right">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var old_task = document.getElementById("old_task").value;
    $(document).ready(function () {

        var old_project = document.getElementById("old_project").value;
        //getProjectId();

  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/projectmanagement/bugs/ckmedia', true);
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
                data.append('crud_id', {{ $bug->id ?? 0 }});
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

    function getProjectId() {
        var project_id = document.getElementById("project_id").value;

        if(project_id){
            document.getElementById("task_div").classList.add('visible');
            document.getElementById("task_div").classList.remove('invisible');
            var alltasks = document.getElementById("tasks").value;
            var tasks = JSON.parse(alltasks);
            var innerHtml =[];
            var pleaseSelect ='{{trans('global.pleaseSelect')}}';

            innerHtml.push(`<option value="" selected disabled>${pleaseSelect}</option>`);
            for (const [key, value] of Object.entries(tasks)){
                if (project_id == value.project.id){
                    var selected = '';
                    if (value.id == old_task){
                        selected = 'selected';
                    }
                    innerHtml.push(`<option value='${value.id}'  ${selected} >${value.name}</option>`);
                    //console.log(value.id,value.name,old_task);
                }
            }
            document.getElementById('task_id').innerHTML = innerHtml;
        }else{
            document.getElementById("task_div").classList.remove('visible');
            document.getElementById("task_div").classList.add('invisible');
        }
    }
</script>

@endsection
