@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.proposalsItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("sales.admin.proposals-items.update", [$proposalsItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tax_rate">{{ trans('cruds.proposalsItem.fields.group_name') }}</label>
                <div class="input-group">
                    <select class="form-control  {{ $errors->has('proposals') ? 'is-invalid' : '' }}"
                        name="customer_group_id" id="customer_group_id" required>
                        @foreach($customerGroups as $id => $customerGroup)
                        <option value="{{ $id }}" {{ (old('customer_group_id') ? old('customer_group_id') : $proposalsItem->customer_group_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $customerGroup }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-append">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primaryModal"><i
                                class="fa fa-plus"></i></button>
                    </span>
                </div>
                </div>
           
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.proposalsItem.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $proposalsItem->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.proposalsItem.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $proposalsItem->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.description_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="group_name">{{ trans('cruds.proposalsItem.fields.group_name') }}</label>
                <input class="form-control {{ $errors->has('group_name') ? 'is-invalid' : '' }}" type="text" name="group_name" id="group_name" value="{{ old('group_name', $proposalsItem->group_name) }}">
                @if($errors->has('group_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.group_name_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="brand">{{ trans('cruds.proposalsItem.fields.brand') }}</label>
                <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', $proposalsItem->brand) }}">
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.brand_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label class="required" for="delivery">{{ trans('cruds.proposalsItem.fields.delivery') }}</label>
                <input class="form-control {{ $errors->has('delivery') ? 'is-invalid' : '' }}" type="text" name="delivery" id="delivery" value="{{ old('delivery', $proposalsItem->delivery) }}" required>
                @if($errors->has('delivery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.delivery_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="part">{{ trans('cruds.proposalsItem.fields.part') }}</label>
                <input class="form-control {{ $errors->has('part') ? 'is-invalid' : '' }}" type="text" name="part" id="part" value="{{ old('part', $proposalsItem->part) }}" required>
                @if($errors->has('part'))
                    <div class="invalid-feedback">
                        {{ $errors->first('part') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.part_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity" class="required" >{{ trans('cruds.proposalsItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $proposalsItem->quantity) }}" step="1" min="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_cost">{{ trans('cruds.proposalsItem.fields.unit_cost') }}</label>
                <input class="form-control {{ $errors->has('unit_cost') ? 'is-invalid' : '' }}" type="number" name="unit_cost" id="unit_cost" value="{{ old('unit_cost', $proposalsItem->unit_cost) }}" step="0.01">
                @if($errors->has('unit_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.unit_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="margin">{{ trans('cruds.proposalsItem.fields.margin') }}</label>
                <input class="form-control {{ $errors->has('margin') ? 'is-invalid' : '' }}" type="number" name="margin" id="margin" value="{{ old('margin', $proposalsItem->margin) }}" step="1">
                @if($errors->has('margin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('margin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.margin_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="selling_price">{{ trans('cruds.proposalsItem.fields.selling_price') }}</label>
                <input class="form-control {{ $errors->has('selling_price') ? 'is-invalid' : '' }}" type="number" name="selling_price" id="selling_price" value="{{ old('selling_price', $proposalsItem->selling_price) }}" step="0.01">
                @if($errors->has('selling_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.selling_price_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label class="required" for="total_cost_price">{{ trans('cruds.proposalsItem.fields.total_cost_price') }}</label>
                <input class="form-control {{ $errors->has('total_cost_price') ? 'is-invalid' : '' }}" type="number" name="total_cost_price" id="total_cost_price" value="{{ old('total_cost_price', $proposalsItem->total_cost_price) }}" step="0.01" required>
                @if($errors->has('total_cost_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_cost_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.total_cost_price_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="tax_rate">{{ trans('cruds.proposalsItem.fields.tax_rate') }}</label>
                <div class="input-group">
                    <select class="form-control  {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}"
                        name="tax_id" id="tax_id" required>
                        @foreach($taxRates as $id => $taxRate)
                        <option value="{{ $id }}" {{ (old('tax_id') ? old('tax_id') : $proposalsItem->tax_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $taxRate }} {{ $loop->iteration != 1 ? '%' : '' }}</option>
                        @endforeach
                    </select>
                   
                </div>
                </div>
            {{-- <div class="form-group">
                <label class="required" for="tax_rate">{{ trans('cruds.proposalsItem.fields.tax_rate') }}</label>
                <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}" type="number" name="tax_rate" id="tax_rate" value="{{ old('tax_rate', $proposalsItem->tax_rate) }}" step="0.01" required>
                @if($errors->has('tax_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_rate_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="tax_name">{{ trans('cruds.proposalsItem.fields.tax_name') }}</label>
                <input class="form-control {{ $errors->has('tax_name') ? 'is-invalid' : '' }}" type="text" name="tax_name" id="tax_name" value="{{ old('tax_name', $proposalsItem->tax_name) }}">
                @if($errors->has('tax_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_name_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="tax_total">{{ trans('cruds.proposalsItem.fields.tax_total') }}</label>
                <input class="form-control {{ $errors->has('tax_total') ? 'is-invalid' : '' }}" type="number" name="tax_total" id="tax_total" value="{{ old('tax_total', $proposalsItem->tax_total) }}" step="0.01">
                @if($errors->has('tax_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_total_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="tax_cost">{{ trans('cruds.proposalsItem.fields.tax_cost') }}</label>
                <input class="form-control {{ $errors->has('tax_cost') ? 'is-invalid' : '' }}" type="number" name="tax_cost" id="tax_cost" value="{{ old('tax_cost', $proposalsItem->tax_cost) }}" step="0.01">
                @if($errors->has('tax_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.tax_cost_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="order">{{ trans('cruds.proposalsItem.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', $proposalsItem->order) }}" step="1">
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.order_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="unit">{{ trans('cruds.proposalsItem.fields.unit') }}</label>
                <input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="text" name="unit" id="unit" value="{{ old('unit', $proposalsItem->unit) }}" required>
                @if($errors->has('unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.unit_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="hsn_code">{{ trans('cruds.proposalsItem.fields.hsn_code') }}</label>
                <input class="form-control {{ $errors->has('hsn_code') ? 'is-invalid' : '' }}" type="text" name="hsn_code" id="hsn_code" value="{{ old('hsn_code', $proposalsItem->hsn_code) }}">
                @if($errors->has('hsn_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hsn_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposalsItem.fields.hsn_code_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



<!-- /.modal -->

<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> {{ trans('global.create') }} {{ trans('cruds.customerGroup.title_singular') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="#" id="form2">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="type">{{ trans('cruds.customerGroup.fields.type') }}</label>
                        <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text"
                            name="type" id="type" value="{{ old('type', '') }}" required>

                    </div>
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.customerGroup.fields.name') }}</label>
                        <input class="form-control" type="text" name="namecustomgroup" id="namecustomgroup"
                            value="{{ old('name', '') }}" required>

                    </div>
                    <div class="form-group">
                        <label for="description">{{ trans('cruds.customerGroup.fields.description') }}</label>
                        <textarea class="form-control" name="descriptioncustomgroup"
                            id="descriptioncustomgroup"></textarea>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="customgroupsubmit">
                    {{ trans('global.save') }}</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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

    //add new custom group 
    // 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

    $("#customgroupsubmit").click(function (e) {

        // e.preventDefault();

        var type = $("input[name=type]").val();
        var name = $("input[name=namecustomgroup]").val();
        var description = $("textarea[name=descriptioncustomgroup]").val();
        var url = '{{ route("materialssuppliers.admin.customer-groups.store") }}';

        $.ajax({
                url: url,
                method: 'POST',
                data: {
                    type: type,
                    name: name,
                    description: description
                }
            })
            .done(function (response) {
                $('#customer_group_id').append('<option value="' + response.id + '" selected="selected">' +
                    response.name + '</option>');
                $("#primaryModal").modal("hide");
                $(".modal-backdrop").remove();//remove background
                $('body').removeClass('modal-open');// For scroll run
                $('#primaryModal').find('#form2')[0].reset();

            });
        // .error(function(error){
        //   console.log(error)
        // });


    });
    
</script>

@endsection