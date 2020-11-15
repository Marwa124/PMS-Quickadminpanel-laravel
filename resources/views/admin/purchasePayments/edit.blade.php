@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchasePayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-payments.update", [$purchasePayment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="purchase_id">{{ trans('cruds.purchasePayment.fields.purchase') }}</label>
                <select class="form-control select2 {{ $errors->has('purchase') ? 'is-invalid' : '' }}" name="purchase_id" id="purchase_id">
                    @foreach($purchases as $id => $purchase)
                        <option value="{{ $id }}" {{ (old('purchase_id') ? old('purchase_id') : $purchasePayment->purchase->id ?? '') == $id ? 'selected' : '' }}>{{ $purchase }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchase'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.purchase_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method">{{ trans('cruds.purchasePayment.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $purchasePayment->payment_method) }}">
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.purchasePayment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="text" name="amount" id="amount" value="{{ old('amount', $purchasePayment->amount) }}">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.purchasePayment.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', $purchasePayment->currency) }}">
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.purchasePayment.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $purchasePayment->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_date">{{ trans('cruds.purchasePayment.fields.payment_date') }}</label>
                <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $purchasePayment->payment_date) }}">
                @if($errors->has('payment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_to">{{ trans('cruds.purchasePayment.fields.paid_to') }}</label>
                <input class="form-control {{ $errors->has('paid_to') ? 'is-invalid' : '' }}" type="number" name="paid_to" id="paid_to" value="{{ old('paid_to', $purchasePayment->paid_to) }}" step="1">
                @if($errors->has('paid_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.paid_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_by">{{ trans('cruds.purchasePayment.fields.paid_by') }}</label>
                <input class="form-control {{ $errors->has('paid_by') ? 'is-invalid' : '' }}" type="number" name="paid_by" id="paid_by" value="{{ old('paid_by', $purchasePayment->paid_by) }}" step="1">
                @if($errors->has('paid_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.paid_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_id">{{ trans('cruds.purchasePayment.fields.account') }}</label>
                <select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id">
                    @foreach($accounts as $id => $account)
                        <option value="{{ $id }}" {{ (old('account_id') ? old('account_id') : $purchasePayment->account->id ?? '') == $id ? 'selected' : '' }}>{{ $account }}</option>
                    @endforeach
                </select>
                @if($errors->has('account'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.account_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_id">{{ trans('cruds.purchasePayment.fields.transaction') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id">
                    @foreach($transactions as $id => $transaction)
                        <option value="{{ $id }}" {{ (old('transaction_id') ? old('transaction_id') : $purchasePayment->transaction->id ?? '') == $id ? 'selected' : '' }}>{{ $transaction }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasePayment.fields.transaction_helper') }}</span>
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
                xhr.open('POST', '/admin/purchase-payments/ckmedia', true);
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
                data.append('crud_id', {{ $purchasePayment->id ?? 0 }});
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