@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.transaction.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_id">{{ trans('cruds.transaction.fields.account') }}</label>
                <select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id" required>
                    @foreach($accounts as $id => $account)
                        <option value="{{ $id }}" {{ old('account_id') == $id ? 'selected' : '' }}>{{ $account }}</option>
                    @endforeach
                </select>
                @if($errors->has('account'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.account_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_id">{{ trans('cruds.transaction.fields.invoice') }}</label>
                <select class="form-control select2 {{ $errors->has('invoice') ? 'is-invalid' : '' }}" name="invoice_id" id="invoice_id" required>
                    @foreach($invoices as $id => $invoice)
                        <option value="{{ $id }}" {{ old('invoice_id') == $id ? 'selected' : '' }}>{{ $invoice }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.transaction.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaction.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Transaction::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method_id">{{ trans('cruds.transaction.fields.payment_method') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method_id" id="payment_method_id">
                    @foreach($payment_methods as $id => $payment_method)
                        <option value="{{ $id }}" {{ old('payment_method_id') == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_by">{{ trans('cruds.transaction.fields.paid_by') }}</label>
                <input class="form-control {{ $errors->has('paid_by') ? 'is-invalid' : '' }}" type="number" name="paid_by" id="paid_by" value="{{ old('paid_by', '') }}" step="1">
                @if($errors->has('paid_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.paid_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference">{{ trans('cruds.transaction.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', '') }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transaction.fields.status') }}</label>
                @foreach(App\Models\Transaction::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', 'non_approved') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.transaction.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.transaction.fields.tags') }}</label>
                <input class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" type="text" name="tags" id="tags" value="{{ old('tags', '') }}">
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.transaction.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', '') }}" step="0.01">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.transaction.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="debit">{{ trans('cruds.transaction.fields.debit') }}</label>
                <input class="form-control {{ $errors->has('debit') ? 'is-invalid' : '' }}" type="number" name="debit" id="debit" value="{{ old('debit', '') }}" step="0.01">
                @if($errors->has('debit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('debit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="credit">{{ trans('cruds.transaction.fields.credit') }}</label>
                <input class="form-control {{ $errors->has('credit') ? 'is-invalid' : '' }}" type="number" name="credit" id="credit" value="{{ old('credit', '') }}" step="0.01">
                @if($errors->has('credit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('credit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.credit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_balance">{{ trans('cruds.transaction.fields.total_balance') }}</label>
                <input class="form-control {{ $errors->has('total_balance') ? 'is-invalid' : '' }}" type="number" name="total_balance" id="total_balance" value="{{ old('total_balance', '') }}" step="0.01">
                @if($errors->has('total_balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.total_balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.transaction.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachment">{{ trans('cruds.transaction.fields.attachment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachment') ? 'is-invalid' : '' }}" id="attachment-dropzone">
                </div>
                @if($errors->has('attachment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.attachment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaction.fields.client_visible') }}</label>
                @foreach(App\Models\Transaction::CLIENT_VISIBLE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('client_visible') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="client_visible_{{ $key }}" name="client_visible" value="{{ $key }}" {{ old('client_visible', 'no') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="client_visible_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('client_visible'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_visible') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.client_visible_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="added_by">{{ trans('cruds.transaction.fields.added_by') }}</label>
                <input class="form-control {{ $errors->has('added_by') ? 'is-invalid' : '' }}" type="number" name="added_by" id="added_by" value="{{ old('added_by', '') }}" step="1">
                @if($errors->has('added_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('added_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.added_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid">{{ trans('cruds.transaction.fields.paid') }}</label>
                <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" type="number" name="paid" id="paid" value="{{ old('paid', '') }}" step="1">
                @if($errors->has('paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaction.fields.billable') }}</label>
                @foreach(App\Models\Transaction::BILLABLE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('billable') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="billable_{{ $key }}" name="billable" value="{{ $key }}" {{ old('billable', 'no') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="billable_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('billable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('billable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.billable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deposit">{{ trans('cruds.transaction.fields.deposit') }}</label>
                <input class="form-control {{ $errors->has('deposit') ? 'is-invalid' : '' }}" type="text" name="deposit" id="deposit" value="{{ old('deposit', '') }}">
                @if($errors->has('deposit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deposit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.deposit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deposit_2">{{ trans('cruds.transaction.fields.deposit_2') }}</label>
                <input class="form-control {{ $errors->has('deposit_2') ? 'is-invalid' : '' }}" type="text" name="deposit_2" id="deposit_2" value="{{ old('deposit_2', '') }}">
                @if($errors->has('deposit_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deposit_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.deposit_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="under_55">{{ trans('cruds.transaction.fields.under_55') }}</label>
                <input class="form-control {{ $errors->has('under_55') ? 'is-invalid' : '' }}" type="text" name="under_55" id="under_55" value="{{ old('under_55', '') }}">
                @if($errors->has('under_55'))
                    <div class="invalid-feedback">
                        {{ $errors->first('under_55') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.under_55_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expense_category_id">{{ trans('cruds.transaction.fields.expense_category') }}</label>
                <select class="form-control select2 {{ $errors->has('expense_category') ? 'is-invalid' : '' }}" name="expense_category_id" id="expense_category_id">
                    @foreach($expense_categories as $id => $expense_category)
                        <option value="{{ $id }}" {{ old('expense_category_id') == $id ? 'selected' : '' }}>{{ $expense_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('expense_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expense_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.expense_category_helper') }}</span>
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
                xhr.open('POST', '/admin/transactions/ckmedia', true);
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
                data.append('crud_id', {{ $transaction->id ?? 0 }});
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
    Dropzone.options.attachmentDropzone = {
    url: '{{ route('admin.transactions.storeMedia') }}',
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
      $('form').find('input[name="attachment"]').remove()
      $('form').append('<input type="hidden" name="attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($transaction) && $transaction->attachment)
      var file = {!! json_encode($transaction->attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attachment" value="' + file.file_name + '">')
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