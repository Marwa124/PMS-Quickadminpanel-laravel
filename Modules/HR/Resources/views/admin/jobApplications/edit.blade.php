@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jobApplication.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-applications.update", [$jobApplication->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="job_circular_id">{{ trans('cruds.jobApplication.fields.job_circular') }}</label>
                <select class="form-control select2 {{ $errors->has('job_circular') ? 'is-invalid' : '' }}" name="job_circular_id" id="job_circular_id" required>
                    @foreach($job_circulars as $id => $job_circular)
                        <option value="{{ $id }}" {{ (old('job_circular_id') ? old('job_circular_id') : $jobApplication->job_circular->id ?? '') == $id ? 'selected' : '' }}>{{ $job_circular }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_circular'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_circular') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.job_circular_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.jobApplication.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $jobApplication->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.jobApplication.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $jobApplication->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.jobApplication.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $jobApplication->mobile) }}">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_letter">{{ trans('cruds.jobApplication.fields.cover_letter') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('cover_letter') ? 'is-invalid' : '' }}" name="cover_letter" id="cover_letter">{!! old('cover_letter', $jobApplication->cover_letter) !!}</textarea>
                @if($errors->has('cover_letter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cover_letter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.cover_letter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resume">{{ trans('cruds.jobApplication.fields.resume') }}</label>
                <div class="needsclick dropzone {{ $errors->has('resume') ? 'is-invalid' : '' }}" id="resume-dropzone">
                </div>
                @if($errors->has('resume'))
                    <div class="invalid-feedback">
                        {{ $errors->first('resume') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.resume_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.jobApplication.fields.application_status') }}</label>
                <select class="form-control {{ $errors->has('application_status') ? 'is-invalid' : '' }}" name="application_status" id="application_status">
                    <option value disabled {{ old('application_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\JobApplication::APPLICATION_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('application_status', $jobApplication->application_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('application_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('application_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.application_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apply_date">{{ trans('cruds.jobApplication.fields.apply_date') }}</label>
                <input class="form-control date {{ $errors->has('apply_date') ? 'is-invalid' : '' }}" type="text" name="apply_date" id="apply_date" value="{{ old('apply_date', $jobApplication->apply_date) }}">
                @if($errors->has('apply_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apply_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.apply_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="send_email">{{ trans('cruds.jobApplication.fields.send_email') }}</label>
                <input class="form-control {{ $errors->has('send_email') ? 'is-invalid' : '' }}" type="text" name="send_email" id="send_email" value="{{ old('send_email', $jobApplication->send_email) }}">
                @if($errors->has('send_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('send_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.send_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="interview_date">{{ trans('cruds.jobApplication.fields.interview_date') }}</label>
                <input class="form-control date {{ $errors->has('interview_date') ? 'is-invalid' : '' }}" type="text" name="interview_date" id="interview_date" value="{{ old('interview_date', $jobApplication->interview_date) }}">
                @if($errors->has('interview_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interview_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.interview_date_helper') }}</span>
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
                xhr.open('POST', '/admin/job-applications/ckmedia', true);
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
                data.append('crud_id', {{ $jobApplication->id ?? 0 }});
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

<script>
    Dropzone.options.resumeDropzone = {
    url: '{{ route('admin.job-applications.storeMedia') }}',
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
      $('form').find('input[name="resume"]').remove()
      $('form').append('<input type="hidden" name="resume" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="resume"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($jobApplication) && $jobApplication->resume)
      var file = {!! json_encode($jobApplication->resume) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="resume" value="' + file.file_name + '">')
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