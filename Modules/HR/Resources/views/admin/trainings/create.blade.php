@extends('layouts.admin')
@section('content')
@inject('trainingModel', 'Modules\HR\Entities\Training')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.training.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.trainings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.training.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.training.fields.performance') }}</label>
                <select class="form-control {{ $errors->has('performance') ? 'is-invalid' : '' }}" name="performance" id="performance">
                    <option value disabled {{ old('performance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($trainingModel::Performance_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('performance', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('performance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('performance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.performance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_name">{{ trans('cruds.training.fields.training_name') }}</label>
                <input class="form-control {{ $errors->has('training_name') ? 'is-invalid' : '' }}" type="text" name="training_name" id="training_name" value="{{ old('training_name', '') }}">
                @if($errors->has('training_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('training_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.training_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vendor_name">{{ trans('cruds.training.fields.vendor_name') }}</label>
                <input class="form-control {{ $errors->has('vendor_name') ? 'is-invalid' : '' }}" type="text" name="vendor_name" id="vendor_name" value="{{ old('vendor_name', '') }}">
                @if($errors->has('vendor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vendor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.vendor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.training.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="finish_date">{{ trans('cruds.training.fields.finish_date') }}</label>
                <input class="form-control date {{ $errors->has('finish_date') ? 'is-invalid' : '' }}" type="text" name="finish_date" id="finish_date" value="{{ old('finish_date') }}">
                @if($errors->has('finish_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finish_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.finish_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_cost">{{ trans('cruds.training.fields.training_cost') }}</label>
                <input class="form-control {{ $errors->has('training_cost') ? 'is-invalid' : '' }}" type="number" name="training_cost" id="training_cost" value="{{ old('training_cost', '') }}" step="0.01">
                @if($errors->has('training_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('training_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.training_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uploaded_file">{{ trans('cruds.training.fields.uploaded_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('uploaded_file') ? 'is-invalid' : '' }}" id="uploaded_file-dropzone">
                </div>
                @if($errors->has('uploaded_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('uploaded_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.uploaded_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.training.fields.permission') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.permission_helper') }}</span>
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
    Dropzone.options.uploadedFileDropzone = {
    url: '{{ route('hr.admin.trainings.storeMedia') }}',
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
      $('form').find('input[name="uploaded_file"]').remove()
      $('form').append('<input type="hidden" name="uploaded_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="uploaded_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($training) && $training->uploaded_file)
      var file = {!! json_encode($training->uploaded_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="uploaded_file" value="' + file.file_name + '">')
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