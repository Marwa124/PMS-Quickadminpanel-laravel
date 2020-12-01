@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.taskAttachment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.task-attachments.update", [$taskAttachment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="task_id">{{ trans('cruds.taskAttachment.fields.task') }}</label>
                <select class="form-control select2 {{ $errors->has('task') ? 'is-invalid' : '' }}" name="task_id" id="task_id">
                    @foreach($tasks as $id => $task)
                        <option value="{{ $id }}" {{ (old('task_id') ? old('task_id') : $taskAttachment->task->id ?? '') == $id ? 'selected' : '' }}>{{ $task }}</option>
                    @endforeach
                </select>
                @if($errors->has('task'))
                    <div class="invalid-feedback">
                        {{ $errors->first('task') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.task_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.taskAttachment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $taskAttachment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.taskAttachment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $taskAttachment->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.taskAttachment.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $taskAttachment->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_id">{{ trans('cruds.taskAttachment.fields.lead') }}</label>
                <select class="form-control select2 {{ $errors->has('lead') ? 'is-invalid' : '' }}" name="lead_id" id="lead_id">
                    @foreach($leads as $id => $lead)
                        <option value="{{ $id }}" {{ (old('lead_id') ? old('lead_id') : $taskAttachment->lead->id ?? '') == $id ? 'selected' : '' }}>{{ $lead }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.lead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opportunities_id">{{ trans('cruds.taskAttachment.fields.opportunities') }}</label>
                <select class="form-control select2 {{ $errors->has('opportunities') ? 'is-invalid' : '' }}" name="opportunities_id" id="opportunities_id">
                    @foreach($opportunities as $id => $opportunities)
                        <option value="{{ $id }}" {{ (old('opportunities_id') ? old('opportunities_id') : $taskAttachment->opportunities->id ?? '') == $id ? 'selected' : '' }}>{{ $opportunities }}</option>
                    @endforeach
                </select>
                @if($errors->has('opportunities'))
                    <div class="invalid-feedback">
                        {{ $errors->first('opportunities') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.opportunities_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.taskAttachment.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $taskAttachment->project->id ?? '') == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bug_id">{{ trans('cruds.taskAttachment.fields.bug') }}</label>
                <select class="form-control select2 {{ $errors->has('bug') ? 'is-invalid' : '' }}" name="bug_id" id="bug_id">
                    @foreach($bugs as $id => $bug)
                        <option value="{{ $id }}" {{ (old('bug_id') ? old('bug_id') : $taskAttachment->bug->id ?? '') == $id ? 'selected' : '' }}>{{ $bug }}</option>
                    @endforeach
                </select>
                @if($errors->has('bug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskAttachment.fields.bug_helper') }}</span>
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
                xhr.open('POST', '/admin/task-attachments/ckmedia', true);
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
                data.append('crud_id', {{ $taskAttachment->id ?? 0 }});
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
