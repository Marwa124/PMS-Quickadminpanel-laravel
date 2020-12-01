@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.taskUploadedFile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.task-uploaded-files.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="files">{{ trans('cruds.taskUploadedFile.fields.files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
                @if($errors->has('files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.files_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="uploaded_path">{{ trans('cruds.taskUploadedFile.fields.uploaded_path') }}</label>
                <input class="form-control {{ $errors->has('uploaded_path') ? 'is-invalid' : '' }}" type="text" name="uploaded_path" id="uploaded_path" value="{{ old('uploaded_path', '') }}" required>
                @if($errors->has('uploaded_path'))
                    <div class="invalid-feedback">
                        {{ $errors->first('uploaded_path') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.uploaded_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="file_name">{{ trans('cruds.taskUploadedFile.fields.file_name') }}</label>
                <input class="form-control {{ $errors->has('file_name') ? 'is-invalid' : '' }}" type="text" name="file_name" id="file_name" value="{{ old('file_name', '') }}" required>
                @if($errors->has('file_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.file_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.taskUploadedFile.fields.is_image') }}</label>
                @foreach(Modules\ProjectManagement\Entities\TaskUploadedFile::IS_IMAGE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_image') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_image_{{ $key }}" name="is_image" value="{{ $key }}" {{ old('is_image', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="is_image_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.is_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image_width">{{ trans('cruds.taskUploadedFile.fields.image_width') }}</label>
                <input class="form-control {{ $errors->has('image_width') ? 'is-invalid' : '' }}" type="number" name="image_width" id="image_width" value="{{ old('image_width', '') }}" step="1">
                @if($errors->has('image_width'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image_width') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.image_width_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image_height">{{ trans('cruds.taskUploadedFile.fields.image_height') }}</label>
                <input class="form-control {{ $errors->has('image_height') ? 'is-invalid' : '' }}" type="number" name="image_height" id="image_height" value="{{ old('image_height', '') }}" step="1">
                @if($errors->has('image_height'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image_height') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.image_height_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="task_attachment_id">{{ trans('cruds.taskUploadedFile.fields.task_attachment') }}</label>
                <select class="form-control select2 {{ $errors->has('task_attachment') ? 'is-invalid' : '' }}" name="task_attachment_id" id="task_attachment_id" required>
                    @foreach($task_attachments as $id => $task_attachment)
                        <option value="{{ $id }}" {{ old('task_attachment_id') == $id ? 'selected' : '' }}>{{ $task_attachment }}</option>
                    @endforeach
                </select>
                @if($errors->has('task_attachment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('task_attachment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskUploadedFile.fields.task_attachment_helper') }}</span>
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
    Dropzone.options.filesDropzone = {
    url: '{{ route('projectmanagement.admin.task-uploaded-files.storeMedia') }}',
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
      $('form').find('input[name="files"]').remove()
      $('form').append('<input type="hidden" name="files" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="files"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($taskUploadedFile) && $taskUploadedFile->files)
      var file = {!! json_encode($taskUploadedFile->files) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="files" value="' + file.file_name + '">')
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
@endsection
