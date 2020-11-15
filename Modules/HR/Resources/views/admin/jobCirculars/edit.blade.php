@extends('layouts.admin')
@section('content')
@inject('jobCircularModel', 'Modules\HR\Entities\JobCircular')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jobCircular.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.job-circulars.update", [$jobCircular->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.jobCircular.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $jobCircular->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_id">{{ trans('cruds.jobCircular.fields.designation') }}</label>
                <select class="form-control select2 {{ $errors->has('designation') ? 'is-invalid' : '' }}" name="designation_id" id="designation_id">
                    @foreach($designations as $id => $designation)
                        <option value="{{ $id }}" {{ (old('designation_id') ? old('designation_id') : $jobCircular->designation->id ?? '') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vacancy_no">{{ trans('cruds.jobCircular.fields.vacancy_no') }}</label>
                <input class="form-control {{ $errors->has('vacancy_no') ? 'is-invalid' : '' }}" type="text" name="vacancy_no" id="vacancy_no" value="{{ old('vacancy_no', $jobCircular->vacancy_no) }}">
                @if($errors->has('vacancy_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vacancy_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.vacancy_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="posted_date">{{ trans('cruds.jobCircular.fields.posted_date') }}</label>
                <input class="form-control date {{ $errors->has('posted_date') ? 'is-invalid' : '' }}" type="text" name="posted_date" id="posted_date" value="{{ old('posted_date', $jobCircular->posted_date) }}">
                @if($errors->has('posted_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('posted_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.posted_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.jobCircular.fields.employment_type') }}</label>
                <select class="form-control {{ $errors->has('employment_type') ? 'is-invalid' : '' }}" name="employment_type" id="employment_type" required>
                    <option value disabled {{ old('employment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($jobCircularModel::EMPLOYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('employment_type', $jobCircular->employment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('employment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.employment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience">{{ trans('cruds.jobCircular.fields.experience') }}</label>
                <input class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" type="text" name="experience" id="experience" value="{{ old('experience', $jobCircular->experience) }}">
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">{{ trans('cruds.jobCircular.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', $jobCircular->age) }}">
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salary_range">{{ trans('cruds.jobCircular.fields.salary_range') }}</label>
                <input class="form-control {{ $errors->has('salary_range') ? 'is-invalid' : '' }}" type="text" name="salary_range" id="salary_range" value="{{ old('salary_range', $jobCircular->salary_range) }}">
                @if($errors->has('salary_range'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_range') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.salary_range_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_date">{{ trans('cruds.jobCircular.fields.last_date') }}</label>
                <input class="form-control date {{ $errors->has('last_date') ? 'is-invalid' : '' }}" type="text" name="last_date" id="last_date" value="{{ old('last_date', $jobCircular->last_date) }}">
                @if($errors->has('last_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.last_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.jobCircular.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $jobCircular->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.jobCircular.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($jobCircularModel::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $jobCircular->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.jobCircular.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $jobCircular->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobCircular.fields.permissions_helper') }}</span>
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
                xhr.open('POST', '/admin/job-circulars/ckmedia', true);
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
                data.append('crud_id', {{ $jobCircular->id ?? 0 }});
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
