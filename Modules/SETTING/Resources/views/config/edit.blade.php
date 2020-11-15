@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.config.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("setting.config.update") }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @foreach ($config as $item)
            <?php $key = $item->key; ?>
            <div class="form-group">
              {{-- class="required" --}}
                <label for="config_".$key>{{ trans('cruds.config.fields.config_'.$key) }}</label>
                @if ($key == 'company_logo')
                  <img class="image-fluid uploadedImg {{ $errors->has('config_'.$key) ? 'is-invalid' : '' }}" 
                    name="config_".$key id="config_".$key value="{{ old('config_'.$key, $item->value) }}" 
                    src="{{asset('images/image001.png')}}" alt="vvvv" id="uploadedImg">
                  <div class="form-group">
                    <input type="file" name="company_logo" id="inputImage" class="form-control-file" id="exampleFormControlFile1 inputImage">
                  </div>
                @else
                  <input class="form-control {{ $errors->has('config_'.$key) ? 'is-invalid' : '' }}" type="text" name="config_".$key id="config_".$key value="{{ old('config_'.$key, $item->value) }}" required>
                @endif
                @if($errors->has('config_'.$key))
                    <div class="invalid-feedback">
                        {{ $errors->first('config_'.$key) }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.config.fields.config_'.$key.'helper') }}</span>
            </div>
                
            @endforeach
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

      $("#inputImage").on('change', function(){
        console.log("dkjhl");
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            console.log(e.target.result);
            $('#uploadedImg').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(this.files[0]); // convert to base64 string
        }
      })



  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'setting/admin/config/ckmedia', true);
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