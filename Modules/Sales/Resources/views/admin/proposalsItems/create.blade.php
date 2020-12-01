@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.proposalsItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("sales.admin.proposals-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="proposals_id">{{ trans('cruds.proposalsItem.fields.proposals') }}</label>
                <select class="form-control select2 {{ $errors->has('proposals') ? 'is-invalid' : '' }}" name="proposals_id" id="proposals_id" required>
                    @foreach($proposals as $id => $proposals)
                        <option value="{{ $id }}" {{ old('proposals_id') == $id ? 'selected' : '' }}>{{ $proposals }}</option>
                    @endforeach
                </select>
                @if($errors->has('proposals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proposals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.proposals_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.proposalsItem.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.proposalsItem.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="group_name">{{ trans('cruds.proposalsItem.fields.group_name') }}</label>
                <input class="form-control {{ $errors->has('group_name') ? 'is-invalid' : '' }}" type="text" name="group_name" id="group_name" value="{{ old('group_name', '') }}">
                @if($errors->has('group_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.group_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand">{{ trans('cruds.proposalsItem.fields.brand') }}</label>
                <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', '') }}">
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery">{{ trans('cruds.proposalsItem.fields.delivery') }}</label>
                <input class="form-control {{ $errors->has('delivery') ? 'is-invalid' : '' }}" type="text" name="delivery" id="delivery" value="{{ old('delivery', '') }}" required>
                @if($errors->has('delivery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.delivery_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="part">{{ trans('cruds.proposalsItem.fields.part') }}</label>
                <input class="form-control {{ $errors->has('part') ? 'is-invalid' : '' }}" type="text" name="part" id="part" value="{{ old('part', '') }}" required>
                @if($errors->has('part'))
                    <div class="invalid-feedback">
                        {{ $errors->first('part') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.part_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.proposalsItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="0.01">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_cost">{{ trans('cruds.proposalsItem.fields.unit_cost') }}</label>
                <input class="form-control {{ $errors->has('unit_cost') ? 'is-invalid' : '' }}" type="number" name="unit_cost" id="unit_cost" value="{{ old('unit_cost', '') }}" step="0.01">
                @if($errors->has('unit_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.unit_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="margin">{{ trans('cruds.proposalsItem.fields.margin') }}</label>
                <input class="form-control {{ $errors->has('margin') ? 'is-invalid' : '' }}" type="number" name="margin" id="margin" value="{{ old('margin', '') }}" step="1">
                @if($errors->has('margin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('margin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.margin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selling_price">{{ trans('cruds.proposalsItem.fields.selling_price') }}</label>
                <input class="form-control {{ $errors->has('selling_price') ? 'is-invalid' : '' }}" type="number" name="selling_price" id="selling_price" value="{{ old('selling_price', '') }}" step="0.01">
                @if($errors->has('selling_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.selling_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_cost_price">{{ trans('cruds.proposalsItem.fields.total_cost_price') }}</label>
                <input class="form-control {{ $errors->has('total_cost_price') ? 'is-invalid' : '' }}" type="number" name="total_cost_price" id="total_cost_price" value="{{ old('total_cost_price', '') }}" step="0.01" required>
                @if($errors->has('total_cost_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_cost_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.total_cost_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax_rate">{{ trans('cruds.proposalsItem.fields.tax_rate') }}</label>
                <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}" type="number" name="tax_rate" id="tax_rate" value="{{ old('tax_rate', '') }}" step="0.01" required>
                @if($errors->has('tax_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_name">{{ trans('cruds.proposalsItem.fields.tax_name') }}</label>
                <input class="form-control {{ $errors->has('tax_name') ? 'is-invalid' : '' }}" type="text" name="tax_name" id="tax_name" value="{{ old('tax_name', '') }}">
                @if($errors->has('tax_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_total">{{ trans('cruds.proposalsItem.fields.tax_total') }}</label>
                <input class="form-control {{ $errors->has('tax_total') ? 'is-invalid' : '' }}" type="number" name="tax_total" id="tax_total" value="{{ old('tax_total', '') }}" step="0.01">
                @if($errors->has('tax_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_cost">{{ trans('cruds.proposalsItem.fields.tax_cost') }}</label>
                <input class="form-control {{ $errors->has('tax_cost') ? 'is-invalid' : '' }}" type="number" name="tax_cost" id="tax_cost" value="{{ old('tax_cost', '') }}" step="0.01">
                @if($errors->has('tax_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order">{{ trans('cruds.proposalsItem.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit">{{ trans('cruds.proposalsItem.fields.unit') }}</label>
                <input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="text" name="unit" id="unit" value="{{ old('unit', '') }}" required>
                @if($errors->has('unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hsn_code">{{ trans('cruds.proposalsItem.fields.hsn_code') }}</label>
                <input class="form-control {{ $errors->has('hsn_code') ? 'is-invalid' : '' }}" type="text" name="hsn_code" id="hsn_code" value="{{ old('hsn_code', '') }}">
                @if($errors->has('hsn_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hsn_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.hsn_code_helper') }}</span>
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
                xhr.open('POST', '/admin/proposals-items/ckmedia', true);
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
                data.append('crud_id', {{ $proposalsItem->id ?? 0 }});
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