@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.overtime.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.overtimes.update", [$overtime->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.overtime.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $overtime->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.overtime.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="overtime_date">{{ trans('cruds.overtime.fields.overtime_date') }}</label>
                <input class="form-control date {{ $errors->has('overtime_date') ? 'is-invalid' : '' }}" type="text" name="overtime_date" id="overtime_date" value="{{ old('overtime_date', $overtime->overtime_date) }}" required>
                @if($errors->has('overtime_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overtime_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.overtime.fields.overtime_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="overtime_hours">{{ trans('cruds.overtime.fields.overtime_hours') }}</label>
                <input class="form-control timepicker {{ $errors->has('overtime_hours') ? 'is-invalid' : '' }}" type="text" name="overtime_hours" id="overtime_hours" value="{{ old('overtime_hours', $overtime->overtime_hours) }}" required>
                @if($errors->has('overtime_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overtime_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.overtime.fields.overtime_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.overtime.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $overtime->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.overtime.fields.notes_helper') }}</span>
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
                xhr.open('POST', '/admin/overtimes/ckmedia', true);
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
                data.append('crud_id', {{ $overtime->id ?? 0 }});
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