@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.returnStock.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.return-stocks.update", [$returnStock->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="supplier_id">{{ trans('cruds.returnStock.fields.supplier') }}</label>
                <select class="form-control select2 {{ $errors->has('supplier') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id">
                    @foreach($suppliers as $id => $supplier)
                        <option value="{{ $id }}" {{ (old('supplier_id') ? old('supplier_id') : $returnStock->supplier->id ?? '') == $id ? 'selected' : '' }}>{{ $supplier }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_no">{{ trans('cruds.returnStock.fields.reference_no') }}</label>
                <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', $returnStock->reference_no) }}">
                @if($errors->has('reference_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.reference_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.returnStock.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $returnStock->total) }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.returnStock.fields.update_stock') }}</label>
                @foreach(App\Models\ReturnStock::UPDATE_STOCK_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('update_stock') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="update_stock_{{ $key }}" name="update_stock" value="{{ $key }}" {{ old('update_stock', $returnStock->update_stock) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="update_stock_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('update_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('update_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.update_stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.returnStock.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $returnStock->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.returnStock.fields.emailed') }}</label>
                @foreach(App\Models\ReturnStock::EMAILED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('emailed') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="emailed_{{ $key }}" name="emailed" value="{{ $key }}" {{ old('emailed', $returnStock->emailed) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="emailed_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('emailed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emailed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.emailed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_sent">{{ trans('cruds.returnStock.fields.date_sent') }}</label>
                <input class="form-control date {{ $errors->has('date_sent') ? 'is-invalid' : '' }}" type="text" name="date_sent" id="date_sent" value="{{ old('date_sent', $returnStock->date_sent) }}">
                @if($errors->has('date_sent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_sent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.date_sent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by">{{ trans('cruds.returnStock.fields.created_by') }}</label>
                <input class="form-control {{ $errors->has('created_by') ? 'is-invalid' : '' }}" type="number" name="created_by" id="created_by" value="{{ old('created_by', $returnStock->created_by) }}" step="1">
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.returnStock.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $returnStock->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="return_stock_date">{{ trans('cruds.returnStock.fields.return_stock_date') }}</label>
                <input class="form-control date {{ $errors->has('return_stock_date') ? 'is-invalid' : '' }}" type="text" name="return_stock_date" id="return_stock_date" value="{{ old('return_stock_date', $returnStock->return_stock_date) }}">
                @if($errors->has('return_stock_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('return_stock_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.return_stock_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.returnStock.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date', $returnStock->due_date) }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.returnStock.fields.discount_type') }}</label>
                @foreach(App\Models\ReturnStock::DISCOUNT_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('discount_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="discount_type_{{ $key }}" name="discount_type" value="{{ $key }}" {{ old('discount_type', $returnStock->discount_type) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="discount_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('discount_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.discount_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_percent">{{ trans('cruds.returnStock.fields.discount_percent') }}</label>
                <input class="form-control {{ $errors->has('discount_percent') ? 'is-invalid' : '' }}" type="number" name="discount_percent" id="discount_percent" value="{{ old('discount_percent', $returnStock->discount_percent) }}" step="0.01">
                @if($errors->has('discount_percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_percent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.discount_percent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adjustment">{{ trans('cruds.returnStock.fields.adjustment') }}</label>
                <input class="form-control {{ $errors->has('adjustment') ? 'is-invalid' : '' }}" type="number" name="adjustment" id="adjustment" value="{{ old('adjustment', $returnStock->adjustment) }}" step="0.01">
                @if($errors->has('adjustment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('adjustment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.adjustment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_total">{{ trans('cruds.returnStock.fields.discount_total') }}</label>
                <input class="form-control {{ $errors->has('discount_total') ? 'is-invalid' : '' }}" type="number" name="discount_total" id="discount_total" value="{{ old('discount_total', $returnStock->discount_total) }}" step="0.01">
                @if($errors->has('discount_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.discount_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="show_quantity_as">{{ trans('cruds.returnStock.fields.show_quantity_as') }}</label>
                <input class="form-control {{ $errors->has('show_quantity_as') ? 'is-invalid' : '' }}" type="text" name="show_quantity_as" id="show_quantity_as" value="{{ old('show_quantity_as', $returnStock->show_quantity_as) }}">
                @if($errors->has('show_quantity_as'))
                    <div class="invalid-feedback">
                        {{ $errors->first('show_quantity_as') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.show_quantity_as_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.returnStock.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $returnStock->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_tax">{{ trans('cruds.returnStock.fields.total_tax') }}</label>
                <input class="form-control {{ $errors->has('total_tax') ? 'is-invalid' : '' }}" type="text" name="total_tax" id="total_tax" value="{{ old('total_tax', $returnStock->total_tax) }}">
                @if($errors->has('total_tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.total_tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.returnStock.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', $returnStock->tax) }}" step="0.01">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.returnStock.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $returnStock->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.returnStock.fields.notes_helper') }}</span>
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
                xhr.open('POST', '/admin/return-stocks/ckmedia', true);
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
                data.append('crud_id', {{ $returnStock->id ?? 0 }});
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