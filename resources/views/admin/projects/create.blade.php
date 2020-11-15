@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.project.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="progress">{{ trans('cruds.project.fields.progress') }}</label>
                <input class="form-control {{ $errors->has('progress') ? 'is-invalid' : '' }}" type="text" name="progress" id="progress" value="{{ old('progress', '') }}">
                @if($errors->has('progress'))
                    <div class="invalid-feedback">
                        {{ $errors->first('progress') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.progress_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="calculate_progress">{{ trans('cruds.project.fields.calculate_progress') }}</label>
                <input class="form-control {{ $errors->has('calculate_progress') ? 'is-invalid' : '' }}" type="text" name="calculate_progress" id="calculate_progress" value="{{ old('calculate_progress', '') }}">
                @if($errors->has('calculate_progress'))
                    <div class="invalid-feedback">
                        {{ $errors->first('calculate_progress') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.calculate_progress_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.project.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="actual_completion">{{ trans('cruds.project.fields.actual_completion') }}</label>
                <input class="form-control {{ $errors->has('actual_completion') ? 'is-invalid' : '' }}" type="text" name="actual_completion" id="actual_completion" value="{{ old('actual_completion', '') }}" required>
                @if($errors->has('actual_completion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('actual_completion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.actual_completion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alert_overdue">{{ trans('cruds.project.fields.alert_overdue') }}</label>
                <input class="form-control {{ $errors->has('alert_overdue') ? 'is-invalid' : '' }}" type="number" name="alert_overdue" id="alert_overdue" value="{{ old('alert_overdue', '0') }}" step="1" required>
                @if($errors->has('alert_overdue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_overdue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.alert_overdue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_cost">{{ trans('cruds.project.fields.project_cost') }}</label>
                <input class="form-control {{ $errors->has('project_cost') ? 'is-invalid' : '' }}" type="number" name="project_cost" id="project_cost" value="{{ old('project_cost', '') }}" step="0.01">
                @if($errors->has('project_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="demo_url">{{ trans('cruds.project.fields.demo_url') }}</label>
                <input class="form-control {{ $errors->has('demo_url') ? 'is-invalid' : '' }}" type="text" name="demo_url" id="demo_url" value="{{ old('demo_url', '') }}">
                @if($errors->has('demo_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('demo_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.demo_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_status">{{ trans('cruds.project.fields.project_status') }}</label>
                <input class="form-control {{ $errors->has('project_status') ? 'is-invalid' : '' }}" type="text" name="project_status" id="project_status" value="{{ old('project_status', '') }}">
                @if($errors->has('project_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.project.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.project.fields.notify_client') }}</label>
                @foreach(App\Models\Project::NOTIFY_CLIENT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('notify_client') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="notify_client_{{ $key }}" name="notify_client" value="{{ $key }}" {{ old('notify_client', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="notify_client_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('notify_client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.notify_client_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.project.fields.timer_status') }}</label>
                @foreach(App\Models\Project::TIMER_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('timer_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="timer_status_{{ $key }}" name="timer_status" value="{{ $key }}" {{ old('timer_status', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="timer_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('timer_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timer_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.timer_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timer_started_by">{{ trans('cruds.project.fields.timer_started_by') }}</label>
                <input class="form-control {{ $errors->has('timer_started_by') ? 'is-invalid' : '' }}" type="number" name="timer_started_by" id="timer_started_by" value="{{ old('timer_started_by', '') }}" step="1">
                @if($errors->has('timer_started_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timer_started_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.timer_started_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.project.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.project.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_settings">{{ trans('cruds.project.fields.project_settings') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('project_settings') ? 'is-invalid' : '' }}" name="project_settings" id="project_settings">{!! old('project_settings') !!}</textarea>
                @if($errors->has('project_settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.project.fields.with_tasks') }}</label>
                @foreach(App\Models\Project::WITH_TASKS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('with_tasks') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="with_tasks_{{ $key }}" name="with_tasks" value="{{ $key }}" {{ old('with_tasks', 'no') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="with_tasks_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('with_tasks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('with_tasks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.with_tasks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estimate_hours">{{ trans('cruds.project.fields.estimate_hours') }}</label>
                <input class="form-control {{ $errors->has('estimate_hours') ? 'is-invalid' : '' }}" type="text" name="estimate_hours" id="estimate_hours" value="{{ old('estimate_hours', '') }}">
                @if($errors->has('estimate_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estimate_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.estimate_hours_helper') }}</span>
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
                xhr.open('POST', '/admin/projects/ckmedia', true);
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
</script>

@endsection