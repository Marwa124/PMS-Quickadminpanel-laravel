@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.proposal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("sales.admin.proposals.update", [$proposal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="reference_no">{{ trans('cruds.proposal.fields.reference_no') }}</label>
                <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', $proposal->reference_no) }}">
                @if($errors->has('reference_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.reference_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject">{{ trans('cruds.proposal.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', $proposal->subject) }}" required>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="module">{{ trans('cruds.proposal.fields.module') }}</label>
                <input class="form-control {{ $errors->has('module') ? 'is-invalid' : '' }}" type="text" name="module" id="module" value="{{ old('module', $proposal->module) }}">
                @if($errors->has('module'))
                    <div class="invalid-feedback">
                        {{ $errors->first('module') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.module_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="proposal_date">{{ trans('cruds.proposal.fields.proposal_date') }}</label>
                <input class="form-control date {{ $errors->has('proposal_date') ? 'is-invalid' : '' }}" type="text" name="proposal_date" id="proposal_date" value="{{ old('proposal_date', $proposal->proposal_date) }}" required>
                @if($errors->has('proposal_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proposal_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.proposal_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expire_date">{{ trans('cruds.proposal.fields.expire_date') }}</label>
                <input class="form-control date {{ $errors->has('expire_date') ? 'is-invalid' : '' }}" type="text" name="expire_date" id="expire_date" value="{{ old('expire_date', $proposal->expire_date) }}">
                @if($errors->has('expire_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expire_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.expire_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_overdue">{{ trans('cruds.proposal.fields.alert_overdue') }}</label>
                <input class="form-control {{ $errors->has('alert_overdue') ? 'is-invalid' : '' }}" type="number" name="alert_overdue" id="alert_overdue" value="{{ old('alert_overdue', $proposal->alert_overdue) }}" step="1">
                @if($errors->has('alert_overdue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_overdue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.alert_overdue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.proposal.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', $proposal->currency) }}">
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.proposal.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $proposal->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_tax">{{ trans('cruds.proposal.fields.total_tax') }}</label>
                <input class="form-control {{ $errors->has('total_tax') ? 'is-invalid' : '' }}" type="text" name="total_tax" id="total_tax" value="{{ old('total_tax', $proposal->total_tax) }}">
                @if($errors->has('total_tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.total_tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_cost_price">{{ trans('cruds.proposal.fields.total_cost_price') }}</label>
                <input class="form-control {{ $errors->has('total_cost_price') ? 'is-invalid' : '' }}" type="number" name="total_cost_price" id="total_cost_price" value="{{ old('total_cost_price', $proposal->total_cost_price) }}" step="0.01">
                @if($errors->has('total_cost_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_cost_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.total_cost_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.proposal.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', $proposal->tax) }}" step="0.01">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.proposal.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $proposal->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_sent">{{ trans('cruds.proposal.fields.date_sent') }}</label>
                <input class="form-control date {{ $errors->has('date_sent') ? 'is-invalid' : '' }}" type="text" name="date_sent" id="date_sent" value="{{ old('date_sent', $proposal->date_sent) }}">
                @if($errors->has('date_sent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_sent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.date_sent_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.proposal.fields.proposal_deleted') }}</label>
                <select class="form-control {{ $errors->has('proposal_deleted') ? 'is-invalid' : '' }}" name="proposal_deleted" id="proposal_deleted">
                    <option value disabled {{ old('proposal_deleted', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Modules\Sales\Entities\Proposal::PROPOSAL_DELETED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('proposal_deleted', $proposal->proposal_deleted) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('proposal_deleted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proposal_deleted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.proposal_deleted_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.proposal.fields.emailed') }}</label>
                <select class="form-control {{ $errors->has('emailed') ? 'is-invalid' : '' }}" name="emailed" id="emailed">
                    <option value disabled {{ old('emailed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Modules\Sales\Entities\Proposal::EMAILED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emailed', $proposal->emailed) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emailed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emailed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.emailed_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.proposal.fields.show_client') }}</label>
                <select class="form-control {{ $errors->has('show_client') ? 'is-invalid' : '' }}" name="show_client" id="show_client">
                    <option value disabled {{ old('show_client', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Modules\Sales\Entities\Proposal::SHOW_CLIENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('show_client', $proposal->show_client) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('show_client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('show_client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.show_client_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.proposal.fields.convert') }}</label>
                <select class="form-control {{ $errors->has('convert') ? 'is-invalid' : '' }}" name="convert" id="convert">
                    <option value disabled {{ old('convert', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Modules\Sales\Entities\Proposal::CONVERT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('convert', $proposal->convert) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('convert'))
                    <div class="invalid-feedback">
                        {{ $errors->first('convert') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.convert_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="convert_module">{{ trans('cruds.proposal.fields.convert_module') }}</label>
                <input class="form-control {{ $errors->has('convert_module') ? 'is-invalid' : '' }}" type="text" name="convert_module" id="convert_module" value="{{ old('convert_module', $proposal->convert_module) }}">
                @if($errors->has('convert_module'))
                    <div class="invalid-feedback">
                        {{ $errors->first('convert_module') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.convert_module_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.proposal.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $proposal->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.permissions_helper') }}</span>
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
                xhr.open('POST', '/admin/proposals/ckmedia', true);
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
                data.append('crud_id', {{ $proposal->id ?? 0 }});
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