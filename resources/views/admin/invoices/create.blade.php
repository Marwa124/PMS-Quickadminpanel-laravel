@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="recur_start_date">{{ trans('cruds.invoice.fields.recur_start_date') }}</label>
                <input class="form-control date {{ $errors->has('recur_start_date') ? 'is-invalid' : '' }}" type="text" name="recur_start_date" id="recur_start_date" value="{{ old('recur_start_date') }}" required>
                @if($errors->has('recur_start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recur_start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.recur_start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="recur_end_date">{{ trans('cruds.invoice.fields.recur_end_date') }}</label>
                <input class="form-control date {{ $errors->has('recur_end_date') ? 'is-invalid' : '' }}" type="text" name="recur_end_date" id="recur_end_date" value="{{ old('recur_end_date') }}" required>
                @if($errors->has('recur_end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recur_end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.recur_end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_no">{{ trans('cruds.invoice.fields.reference_no') }}</label>
                <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', '') }}">
                @if($errors->has('reference_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.reference_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.invoice.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.invoice.fields.project') }}</label>
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
                <span class="help-block">{{ trans('cruds.invoice.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date') }}">
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.invoice.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_overdue">{{ trans('cruds.invoice.fields.alert_overdue') }}</label>
                <input class="form-control {{ $errors->has('alert_overdue') ? 'is-invalid' : '' }}" type="number" name="alert_overdue" id="alert_overdue" value="{{ old('alert_overdue', '0') }}" step="1">
                @if($errors->has('alert_overdue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_overdue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.alert_overdue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.invoice.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax">{{ trans('cruds.invoice.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', '0.00') }}" step="0.01" required>
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_tax">{{ trans('cruds.invoice.fields.total_tax') }}</label>
                <input class="form-control {{ $errors->has('total_tax') ? 'is-invalid' : '' }}" type="text" name="total_tax" id="total_tax" value="{{ old('total_tax', '') }}">
                @if($errors->has('total_tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.total_tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_percent">{{ trans('cruds.invoice.fields.discount_percent') }}</label>
                <input class="form-control {{ $errors->has('discount_percent') ? 'is-invalid' : '' }}" type="number" name="discount_percent" id="discount_percent" value="{{ old('discount_percent', '') }}" step="1">
                @if($errors->has('discount_percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_percent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.discount_percent_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.invoice.fields.recurring') }}</label>
                @foreach(App\Models\Invoice::RECURRING_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('recurring') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="recurring_{{ $key }}" name="recurring" value="{{ $key }}" {{ old('recurring', 'no') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="recurring_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('recurring'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recurring') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.recurring_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recurring_frequency">{{ trans('cruds.invoice.fields.recurring_frequency') }}</label>
                <input class="form-control {{ $errors->has('recurring_frequency') ? 'is-invalid' : '' }}" type="text" name="recurring_frequency" id="recurring_frequency" value="{{ old('recurring_frequency', '') }}">
                @if($errors->has('recurring_frequency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recurring_frequency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.recurring_frequency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recur_frequency">{{ trans('cruds.invoice.fields.recur_frequency') }}</label>
                <input class="form-control {{ $errors->has('recur_frequency') ? 'is-invalid' : '' }}" type="text" name="recur_frequency" id="recur_frequency" value="{{ old('recur_frequency', '') }}">
                @if($errors->has('recur_frequency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recur_frequency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.recur_frequency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recur_next_date">{{ trans('cruds.invoice.fields.recur_next_date') }}</label>
                <input class="form-control date {{ $errors->has('recur_next_date') ? 'is-invalid' : '' }}" type="text" name="recur_next_date" id="recur_next_date" value="{{ old('recur_next_date') }}">
                @if($errors->has('recur_next_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recur_next_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.recur_next_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currerncy">{{ trans('cruds.invoice.fields.currerncy') }}</label>
                <input class="form-control {{ $errors->has('currerncy') ? 'is-invalid' : '' }}" type="text" name="currerncy" id="currerncy" value="{{ old('currerncy', 'USD') }}" required>
                @if($errors->has('currerncy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currerncy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.currerncy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.invoice.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Invoice::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'waiting_app_roval') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="archived">{{ trans('cruds.invoice.fields.archived') }}</label>
                <input class="form-control {{ $errors->has('archived') ? 'is-invalid' : '' }}" type="number" name="archived" id="archived" value="{{ old('archived', '0') }}" step="1">
                @if($errors->has('archived'))
                    <div class="invalid-feedback">
                        {{ $errors->first('archived') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.archived_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_sent">{{ trans('cruds.invoice.fields.date_sent') }}</label>
                <input class="form-control date {{ $errors->has('date_sent') ? 'is-invalid' : '' }}" type="text" name="date_sent" id="date_sent" value="{{ old('date_sent') }}">
                @if($errors->has('date_sent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_sent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_sent_helper') }}</span>
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
                xhr.open('POST', '/admin/invoices/ckmedia', true);
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
                data.append('crud_id', {{ $invoice->id ?? 0 }});
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