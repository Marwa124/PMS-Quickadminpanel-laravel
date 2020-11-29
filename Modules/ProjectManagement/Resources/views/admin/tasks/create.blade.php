@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.tasks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.task.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.task.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.task.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.task.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachment">{{ trans('cruds.task.fields.attachment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachment') ? 'is-invalid' : '' }}" id="attachment-dropzone">
                </div>
                @if($errors->has('attachment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.attachment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.task.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.task.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="assigned_to_id">{{ trans('cruds.task.fields.assigned_to') }}</label>
                <select class="form-control select2 {{ $errors->has('assigned_to') ? 'is-invalid' : '' }}" name="assigned_to_id" id="assigned_to_id">
                    @foreach($assigned_tos as $id => $assigned_to)
                        <option value="{{ $id }}" {{ old('assigned_to_id') == $id ? 'selected' : '' }}>{{ $assigned_to }}</option>
                    @endforeach
                </select>
                @if($errors->has('assigned_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assigned_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.assigned_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.task.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="milestone_id">{{ trans('cruds.task.fields.milestone') }}</label>
                <select class="form-control select2 {{ $errors->has('milestone') ? 'is-invalid' : '' }}" name="milestone_id" id="milestone_id">
                    @foreach($milestones as $id => $milestone)
                        <option value="{{ $id }}" {{ old('milestone_id') == $id ? 'selected' : '' }}>{{ $milestone }}</option>
                    @endforeach
                </select>
                @if($errors->has('milestone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('milestone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.milestone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opportunities_id">{{ trans('cruds.task.fields.opportunities') }}</label>
                <select class="form-control select2 {{ $errors->has('opportunities') ? 'is-invalid' : '' }}" name="opportunities_id" id="opportunities_id">
                    @foreach($opportunities as $id => $opportunities)
                        <option value="{{ $id }}" {{ old('opportunities_id') == $id ? 'selected' : '' }}>{{ $opportunities }}</option>
                    @endforeach
                </select>
                @if($errors->has('opportunities'))
                    <div class="invalid-feedback">
                        {{ $errors->first('opportunities') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.opportunities_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_tracking_id">{{ trans('cruds.task.fields.work_tracking') }}</label>
                <select class="form-control select2 {{ $errors->has('work_tracking') ? 'is-invalid' : '' }}" name="work_tracking_id" id="work_tracking_id">
                    @foreach($work_trackings as $id => $work_tracking)
                        <option value="{{ $id }}" {{ old('work_tracking_id') == $id ? 'selected' : '' }}>{{ $work_tracking }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_tracking'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_tracking') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.work_tracking_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="progress">{{ trans('cruds.task.fields.progress') }}</label>
                <input class="form-control {{ $errors->has('progress') ? 'is-invalid' : '' }}" type="number" name="progress" id="progress" value="{{ old('progress', '') }}" step="1" required>
                @if($errors->has('progress'))
                    <div class="invalid-feedback">
                        {{ $errors->first('progress') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.progress_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="calculate_progress">{{ trans('cruds.task.fields.calculate_progress') }}</label>
                <input class="form-control {{ $errors->has('calculate_progress') ? 'is-invalid' : '' }}" type="text" name="calculate_progress" id="calculate_progress" value="{{ old('calculate_progress', '') }}">
                @if($errors->has('calculate_progress'))
                    <div class="invalid-feedback">
                        {{ $errors->first('calculate_progress') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.calculate_progress_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="task_hours">{{ trans('cruds.task.fields.task_hours') }}</label>
                <input class="form-control {{ $errors->has('task_hours') ? 'is-invalid' : '' }}" type="text" name="task_hours" id="task_hours" value="{{ old('task_hours', '') }}">
                @if($errors->has('task_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('task_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.task_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.task.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.task.fields.timer_status') }}</label>
                @foreach(Modules\ProjectManagement\Entities\Task::TIMER_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('timer_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="timer_status_{{ $key }}" name="timer_status" value="{{ $key }}" {{ old('timer_status', 'off') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="timer_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('timer_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timer_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.timer_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timer_started_by">{{ trans('cruds.task.fields.timer_started_by') }}</label>
                <input class="form-control {{ $errors->has('timer_started_by') ? 'is-invalid' : '' }}" type="number" name="timer_started_by" id="timer_started_by" value="{{ old('timer_started_by', '') }}" step="1">
                @if($errors->has('timer_started_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timer_started_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.timer_started_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_timer">{{ trans('cruds.task.fields.start_timer') }}</label>
                <input class="form-control {{ $errors->has('start_timer') ? 'is-invalid' : '' }}" type="number" name="start_timer" id="start_timer" value="{{ old('start_timer', '') }}" step="1">
                @if($errors->has('start_timer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_timer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.start_timer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logged_timer">{{ trans('cruds.task.fields.logged_timer') }}</label>
                <input class="form-control {{ $errors->has('logged_timer') ? 'is-invalid' : '' }}" type="number" name="logged_timer" id="logged_timer" value="{{ old('logged_timer', '0') }}" step="1">
                @if($errors->has('logged_timer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logged_timer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.logged_timer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_id">{{ trans('cruds.task.fields.lead') }}</label>
                <select class="form-control select2 {{ $errors->has('lead') ? 'is-invalid' : '' }}" name="lead_id" id="lead_id">
                    @foreach($leads as $id => $lead)
                        <option value="{{ $id }}" {{ old('lead_id') == $id ? 'selected' : '' }}>{{ $lead }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.lead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by">{{ trans('cruds.task.fields.created_by') }}</label>
                <input class="form-control {{ $errors->has('created_by') ? 'is-invalid' : '' }}" type="number" name="created_by" id="created_by" value="{{ old('created_by', '') }}" step="1">
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.task.fields.permissions') }}</label>
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
                <span class="help-block">{{ trans('cruds.task.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_visible">{{ trans('cruds.task.fields.client_visible') }}</label>
                <input class="form-control {{ $errors->has('client_visible') ? 'is-invalid' : '' }}" type="text" name="client_visible" id="client_visible" value="{{ old('client_visible', '') }}">
                @if($errors->has('client_visible'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_visible') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.client_visible_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hourly_rate">{{ trans('cruds.task.fields.hourly_rate') }}</label>
                <input class="form-control {{ $errors->has('hourly_rate') ? 'is-invalid' : '' }}" type="number" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate', '') }}" step="0.01">
                @if($errors->has('hourly_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hourly_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.hourly_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="billable">{{ trans('cruds.task.fields.billable') }}</label>
                <input class="form-control {{ $errors->has('billable') ? 'is-invalid' : '' }}" type="text" name="billable" id="billable" value="{{ old('billable', 'no') }}" required>
                @if($errors->has('billable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('billable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.billable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="index_no">{{ trans('cruds.task.fields.index_no') }}</label>
                <input class="form-control {{ $errors->has('index_no') ? 'is-invalid' : '' }}" type="number" name="index_no" id="index_no" value="{{ old('index_no', '') }}" step="1">
                @if($errors->has('index_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('index_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.index_no_helper') }}</span>
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
    Dropzone.options.attachmentDropzone = {
    url: '{{ route('projectmanagement.admin.tasks.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="attachment"]').remove()
      $('form').append('<input type="hidden" name="attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($task) && $task->attachment)
      var file = {!! json_encode($task->attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attachment" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
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
                xhr.open('POST', '/admin/tasks/ckmedia', true);
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
                data.append('crud_id', {{ $task->id ?? 0 }});
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
