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
        {{--            <div class="form-group">--}}
        {{--                <label for="issue_no">{{ trans('cruds.bug.fields.issue_no') }}</label>--}}
        {{--                <input class="form-control {{ $errors->has('issue_no') ? 'is-invalid' : '' }}" type="text" name="issue_no" id="issue_no" value="{{ old('issue_no', $bug->issue_no) }}">--}}
        {{--                @if($errors->has('issue_no'))--}}
        {{--                    <div class="invalid-feedback">--}}
        {{--                        {{ $errors->first('issue_no') }}--}}
        {{--                    </div>--}}
        {{--                @endif--}}
        {{--                <span class="help-block">{{ trans('cruds.bug.fields.issue_no_helper') }}</span>--}}
        {{--            </div>--}}
                <div class="col-sm-6 float-left">
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.bug.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $bug->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.name_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="old_project" id="old_project" value="{{old('project_id') ?? $bug->project->id }}"/>
                        <label for="project_id">{{ trans('cruds.bug.fields.project') }}</label>
                        <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" onchange="getProjectId()">
                            <option value="" selected disabled>Please Select</option>
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
        {{--            <div class="form-group">--}}
        {{--                <label for="opportunities_id">{{ trans('cruds.bug.fields.opportunities') }}</label>--}}
        {{--                <select class="form-control select2 {{ $errors->has('opportunities') ? 'is-invalid' : '' }}" name="opportunities_id" id="opportunities_id">--}}
        {{--                    @foreach($opportunities as $id => $opportunities)--}}
        {{--                        <option value="{{ $id }}" {{ (old('opportunities_id') ? old('opportunities_id') : $bug->opportunities->id ?? '') == $id ? 'selected' : '' }}>{{ $opportunities }}</option>--}}
        {{--                    @endforeach--}}
        {{--                </select>--}}
        {{--                @if($errors->has('opportunities'))--}}
        {{--                    <div class="invalid-feedback">--}}
        {{--                        {{ $errors->first('opportunities') }}--}}
        {{--                    </div>--}}
        {{--                @endif--}}
        {{--                <span class="help-block">{{ trans('cruds.bug.fields.opportunities_helper') }}</span>--}}
        {{--            </div>--}}
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
                        <label for="description">{{ trans('cruds.bug.fields.description') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $bug->description) !!}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bug.fields.description_helper') }}</span>
                    </div>
                </div>
                <div class="col-sm-6 float-right">
                    <div class="form-group">
                        <label for="status">{{ trans('cruds.bug.fields.status') }}</label>
                        <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                            <option value="" selected disabled>Please Select</option>
                            <option value="unconfirmed" {{ old('status', $bug->status) == 'unconfirmed' ? 'selected' : '' }}>Unconfirmed</option>
                            <option value="confirmed"   {{ old('status', $bug->status) == 'confirmed'   ? 'selected' : '' }}>Confirmed</option>
                            <option value="in progress" {{ old('status', $bug->status) == 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="resolved"    {{ old('status', $bug->status) == 'resolved'    ? 'selected' : '' }}>Resolved</option>
                            <option value="verified"    {{ old('status', $bug->status) == 'verified'    ? 'selected' : '' }}>Verified</option>
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
                            <option value="" selected disabled>Please Select</option>
                            <option value="low"     {{ old('priority', $bug->priority) == 'low'    ? 'selected' : '' }}>Low</option>
                            <option value="medium"  {{ old('priority', $bug->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high"    {{ old('priority', $bug->priority) == 'high'   ? 'selected' : '' }}>High</option>
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
                            <option value="" selected disabled>Please Select</option>
                            <option value="minor"           {{ old('severity', $bug->severity) == 'minor'        ? 'selected' : '' }}>Minor</option>
                            <option value="major"           {{ old('severity', $bug->severity) == 'major'        ? 'selected' : '' }}>Major</option>
                            <option value="show stopper"    {{ old('severity', $bug->severity) == 'show stopper' ? 'selected' : '' }}>Show Stopper</option>
                            <option value="must be fixed"   {{ old('severity', $bug->severity) == 'must be fixed'? 'selected' : '' }}>Must be Fixed</option>
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
        {{--            <div class="form-group">--}}
        {{--                <label for="reporter">{{ trans('cruds.bug.fields.reporter') }}</label>--}}
        {{--                <input class="form-control {{ $errors->has('reporter') ? 'is-invalid' : '' }}" type="number" name="reporter" id="reporter" value="{{ old('reporter', $bug->reporter) }}" step="1">--}}
        {{--                @if($errors->has('reporter'))--}}
        {{--                    <div class="invalid-feedback">--}}
        {{--                        {{ $errors->first('reporter') }}--}}
        {{--                    </div>--}}
        {{--                @endif--}}
        {{--                <span class="help-block">{{ trans('cruds.bug.fields.reporter_helper') }}</span>--}}
        {{--            </div>--}}
        {{--            <div class="form-group">--}}
        {{--                <label for="permissions">{{ trans('cruds.bug.fields.permissions') }}</label>--}}
        {{--                <div style="padding-bottom: 4px">--}}
        {{--                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>--}}
        {{--                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>--}}
        {{--                </div>--}}
        {{--                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>--}}
        {{--                    @foreach($permissions as $id => $permissions)--}}
        {{--                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $bug->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>--}}
        {{--                    @endforeach--}}
        {{--                </select>--}}
        {{--                @if($errors->has('permissions'))--}}
        {{--                    <div class="invalid-feedback">--}}
        {{--                        {{ $errors->first('permissions') }}--}}
        {{--                    </div>--}}
        {{--                @endif--}}
        {{--                <span class="help-block">{{ trans('cruds.bug.fields.permissions_helper') }}</span>--}}
        {{--            </div>--}}
        {{--            <div class="form-group">--}}
        {{--                <label for="client_visible">{{ trans('cruds.bug.fields.client_visible') }}</label>--}}
        {{--                <input class="form-control {{ $errors->has('client_visible') ? 'is-invalid' : '' }}" type="text" name="client_visible" id="client_visible" value="{{ old('client_visible', $bug->client_visible) }}">--}}
        {{--                @if($errors->has('client_visible'))--}}
        {{--                    <div class="invalid-feedback">--}}
        {{--                        {{ $errors->first('client_visible') }}--}}
        {{--                    </div>--}}
        {{--                @endif--}}
        {{--                <span class="help-block">{{ trans('cruds.bug.fields.client_visible_helper') }}</span>--}}
        {{--            </div>--}}
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
        getProjectId();

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
            innerHtml.push(`<option value="" selected disabled>Please Select</option>`);
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
