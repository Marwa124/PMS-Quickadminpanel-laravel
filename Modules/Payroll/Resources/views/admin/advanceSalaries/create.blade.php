@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.advanceSalary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.advance-salaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.advanceSalary.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="advance_amount">{{ trans('cruds.advanceSalary.fields.advance_amount') }}</label>
                <input class="form-control {{ $errors->has('advance_amount') ? 'is-invalid' : '' }}" type="text" name="advance_amount" id="advance_amount" value="{{ old('advance_amount', '') }}" required>
                @if($errors->has('advance_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('advance_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.advance_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deduct_month">{{ trans('cruds.advanceSalary.fields.deduct_month') }}</label>
                <input class="form-control {{ $errors->has('deduct_month') ? 'is-invalid' : '' }}" type="text" name="deduct_month" id="deduct_month" value="{{ old('deduct_month', '') }}">
                @if($errors->has('deduct_month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deduct_month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.deduct_month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.advanceSalary.fields.reason') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason">{!! old('reason') !!}</textarea>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="request_date">{{ trans('cruds.advanceSalary.fields.request_date') }}</label>
                <input class="form-control date {{ $errors->has('request_date') ? 'is-invalid' : '' }}" type="text" name="request_date" id="request_date" value="{{ old('request_date') }}" required>
                @if($errors->has('request_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.request_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.advanceSalary.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', '0') }}" step="1" required>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approve_by">{{ trans('cruds.advanceSalary.fields.approve_by') }}</label>
                <input class="form-control {{ $errors->has('approve_by') ? 'is-invalid' : '' }}" type="number" name="approve_by" id="approve_by" value="{{ old('approve_by', '') }}" step="1">
                @if($errors->has('approve_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approve_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.advanceSalary.fields.approve_by_helper') }}</span>
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
                xhr.open('POST', '/admin/advance-salaries/ckmedia', true);
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
                data.append('crud_id', {{ $advanceSalary->id ?? 0 }});
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
