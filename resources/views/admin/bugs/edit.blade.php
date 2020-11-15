@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bug.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bugs.update", [$bug->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="issue_no">{{ trans('cruds.bug.fields.issue_no') }}</label>
                <input class="form-control {{ $errors->has('issue_no') ? 'is-invalid' : '' }}" type="text" name="issue_no" id="issue_no" value="{{ old('issue_no', $bug->issue_no) }}">
                @if($errors->has('issue_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('issue_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.issue_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.bug.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
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
            <div class="form-group">
                <label for="opportunities_id">{{ trans('cruds.bug.fields.opportunities') }}</label>
                <select class="form-control select2 {{ $errors->has('opportunities') ? 'is-invalid' : '' }}" name="opportunities_id" id="opportunities_id">
                    @foreach($opportunities as $id => $opportunities)
                        <option value="{{ $id }}" {{ (old('opportunities_id') ? old('opportunities_id') : $bug->opportunities->id ?? '') == $id ? 'selected' : '' }}>{{ $opportunities }}</option>
                    @endforeach
                </select>
                @if($errors->has('opportunities'))
                    <div class="invalid-feedback">
                        {{ $errors->first('opportunities') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.opportunities_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="task_id">{{ trans('cruds.bug.fields.task') }}</label>
                <select class="form-control select2 {{ $errors->has('task') ? 'is-invalid' : '' }}" name="task_id" id="task_id">
                    @foreach($tasks as $id => $task)
                        <option value="{{ $id }}" {{ (old('task_id') ? old('task_id') : $bug->task->id ?? '') == $id ? 'selected' : '' }}>{{ $task }}</option>
                    @endforeach
                </select>
                @if($errors->has('task'))
                    <div class="invalid-feedback">
                        {{ $errors->first('task') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.task_helper') }}</span>
            </div>
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
                <label for="description">{{ trans('cruds.bug.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $bug->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.bug.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $bug->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.status_helper') }}</span>
            </div>
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
            <div class="form-group">
                <label class="required" for="priority">{{ trans('cruds.bug.fields.priority') }}</label>
                <input class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" type="text" name="priority" id="priority" value="{{ old('priority', $bug->priority) }}" required>
                @if($errors->has('priority'))
                    <div class="invalid-feedback">
                        {{ $errors->first('priority') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.priority_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="severity">{{ trans('cruds.bug.fields.severity') }}</label>
                <input class="form-control {{ $errors->has('severity') ? 'is-invalid' : '' }}" type="text" name="severity" id="severity" value="{{ old('severity', $bug->severity) }}">
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
            <div class="form-group">
                <label for="reporter">{{ trans('cruds.bug.fields.reporter') }}</label>
                <input class="form-control {{ $errors->has('reporter') ? 'is-invalid' : '' }}" type="number" name="reporter" id="reporter" value="{{ old('reporter', $bug->reporter) }}" step="1">
                @if($errors->has('reporter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reporter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.reporter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.bug.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $bug->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_visible">{{ trans('cruds.bug.fields.client_visible') }}</label>
                <input class="form-control {{ $errors->has('client_visible') ? 'is-invalid' : '' }}" type="text" name="client_visible" id="client_visible" value="{{ old('client_visible', $bug->client_visible) }}">
                @if($errors->has('client_visible'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_visible') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bug.fields.client_visible_helper') }}</span>
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
                xhr.open('POST', '/admin/bugs/ckmedia', true);
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
</script>

@endsection