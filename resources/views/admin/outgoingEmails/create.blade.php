@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.outgoingEmail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.outgoing-emails.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="send_to">{{ trans('cruds.outgoingEmail.fields.send_to') }}</label>
                <input class="form-control {{ $errors->has('send_to') ? 'is-invalid' : '' }}" type="text" name="send_to" id="send_to" value="{{ old('send_to', '') }}">
                @if($errors->has('send_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('send_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingEmail.fields.send_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="send_from">{{ trans('cruds.outgoingEmail.fields.send_from') }}</label>
                <input class="form-control {{ $errors->has('send_from') ? 'is-invalid' : '' }}" type="text" name="send_from" id="send_from" value="{{ old('send_from', '') }}">
                @if($errors->has('send_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('send_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingEmail.fields.send_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject">{{ trans('cruds.outgoingEmail.fields.subject') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" id="subject">{!! old('subject') !!}</textarea>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingEmail.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="message">{{ trans('cruds.outgoingEmail.fields.message') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message">{!! old('message') !!}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingEmail.fields.message_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivered">{{ trans('cruds.outgoingEmail.fields.delivered') }}</label>
                <input class="form-control {{ $errors->has('delivered') ? 'is-invalid' : '' }}" type="number" name="delivered" id="delivered" value="{{ old('delivered', '0') }}" step="1">
                @if($errors->has('delivered'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivered') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingEmail.fields.delivered_helper') }}</span>
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
                xhr.open('POST', '/admin/outgoing-emails/ckmedia', true);
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
                data.append('crud_id', {{ $outgoingEmail->id ?? 0 }});
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