@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryPayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-payments.update", [$salaryPayment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.salaryPayment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $salaryPayment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_amount">{{ trans('cruds.salaryPayment.fields.payment_amount') }}</label>
                <input class="form-control {{ $errors->has('payment_amount') ? 'is-invalid' : '' }}" type="text" name="payment_amount" id="payment_amount" value="{{ old('payment_amount', $salaryPayment->payment_amount) }}" required>
                @if($errors->has('payment_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.payment_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fine_deductio">{{ trans('cruds.salaryPayment.fields.fine_deductio') }}</label>
                <input class="form-control {{ $errors->has('fine_deductio') ? 'is-invalid' : '' }}" type="text" name="fine_deductio" id="fine_deductio" value="{{ old('fine_deductio', $salaryPayment->fine_deductio) }}" required>
                @if($errors->has('fine_deductio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine_deductio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.fine_deductio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_type">{{ trans('cruds.salaryPayment.fields.payment_type') }}</label>
                <input class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', $salaryPayment->payment_type) }}" required>
                @if($errors->has('payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.salaryPayment.fields.comments') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{!! old('comments', $salaryPayment->comments) !!}</textarea>
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paid_date">{{ trans('cruds.salaryPayment.fields.paid_date') }}</label>
                <input class="form-control date {{ $errors->has('paid_date') ? 'is-invalid' : '' }}" type="text" name="paid_date" id="paid_date" value="{{ old('paid_date', $salaryPayment->paid_date) }}" required>
                @if($errors->has('paid_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.paid_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deduct_from">{{ trans('cruds.salaryPayment.fields.deduct_from') }}</label>
                <input class="form-control {{ $errors->has('deduct_from') ? 'is-invalid' : '' }}" type="text" name="deduct_from" id="deduct_from" value="{{ old('deduct_from', $salaryPayment->deduct_from) }}" required>
                @if($errors->has('deduct_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deduct_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.deduct_from_helper') }}</span>
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
                xhr.open('POST', '/admin/salary-payments/ckmedia', true);
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
                data.append('crud_id', {{ $salaryPayment->id ?? 0 }});
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