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

        <div class="form-group row">
            <div class="col-md-6">
                <label for="reference_no" class="required">{{ trans('cruds.proposal.fields.reference_no') }} </label>
                <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text"
                    name="reference_no" id="reference_no" value="{{ old('reference_no', $proposal->reference_no) }}" readonly>
                @if($errors->has('reference_no'))
                <div class="invalid-feedback">
                    {{ $errors->first('reference_no') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.reference_no_helper') }}</span>
            </div>
            <div class="col-md-6">
                <label class="required" for="subject">{{ trans('cruds.proposal.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text"
                    name="subject" id="subject" value="{{ old('subject', $proposal->subject) }}" required>
                @if($errors->has('subject'))
                <div class="invalid-feedback">
                    {{ $errors->first('subject') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.subject_helper') }}</span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="required" for="module ">{{ trans('cruds.proposal.fields.Related_To') }}</label>
                <select class="form-control  {{ $errors->has('module') ? 'is-invalid' : '' }}" name="module"
                    onchange="get_related_moduleName(this.value, true)" id="module" required>
                    <option value="" disabled {{ old('module', null) === null ? 'selected' : '' }}>{{trans('global.pleaseSelect')}}</option>
                    <option value="client" {{ old('module', $proposal->module) === 'client' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.client')}}</option>
                    <option value="opportunities" {{ old('module', $proposal->module) === 'opportunities' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.opportunities')}}</option>
                </select>
                @if($errors->has('module'))
                <div class="invalid-feedback">
                    {{ $errors->first('module') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.Related_To_helper') }}</span>
            </div>
                  
            <div class="col-md-6">
                <label for="currency">{{ trans('cruds.proposal.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text"
                    name="currency" id="currency" value="{{ old('currency', 'USD') }}">
                @if($errors->has('currency'))
                <div class="invalid-feedback">
                    {{ $errors->first('currency') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.proposal.fields.currency_helper') }}</span>
            </div>
        
            
        </div>
                    <div class="form-group row">
                        <div class="col-md-6" id="related_to">
                            @if($proposal->module == "client" || $proposal->module == "opportunities")
          
                            <select class="form-control  {{ $errors->has('module_id') ? 'is-invalid' : '' }}"
                                name="module_id" id="module_id">
                                @foreach($datamodule as $id => $item)
                                <option value="{{ $id }}" {{ old('module_id') == $proposal->module_id ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('module_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('module_id') }}
                            </div>
                            @endif
                    
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="permissions">{{ trans('cruds.proposal.fields.status') }}</label>
                            <select class="form-control  {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                                id="status">
        
                                <option value="Waiting_approval" {{ $proposal->status == 'Waiting_approval' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.Waiting_approval')}}</option>
                                <option value="Rejected" {{ $proposal->status == 'Rejected' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.Rejected')}}</option>
                                <option value="Approved" {{ $proposal->status == 'Approved' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.Approved')}}</option>
                                <option value="draft" {{ $proposal->status == 'draft' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.draft')}}</option>
                                <option value="sent" {{ $proposal->status == 'sent' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.sent')}}</option>
                                <option value="open" {{ $proposal->status == 'open' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.open')}}</option>
                                <option value="revised" {{ $proposal->status == 'revised' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.revised')}}</option>
                                <option value="declined" {{ $proposal->status == 'declined' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.declined')}}</option>
                                <option value="accepted" {{ $proposal->status == 'accepted' ? 'selected' : '' }}>{{trans('cruds.proposal.fields.accepted')}}</option>
        
                            </select>
                            @if($errors->has('status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('status') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.status_helper') }}</span>
                        </div>
        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="assigneduser">{{ trans('cruds.proposal.fields.assigneduser') }}</label>
                            <select class="form-control  {{ $errors->has('assigneduser') ? 'is-invalid' : '' }}" name="user_id" id="user_id" >
                                <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
                                @foreach($users as $id => $item)
                                <option value="{{ $id }}" {{ $proposal->user_id == $id ? 'selected' : '' }}>{{ $item }}</option>
                                 @endforeach
                            </select>
                            @if($errors->has('assigneduser'))
                            <div class="invalid-feedback">
                                {{ $errors->first('assigneduser') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.assigneduser_helper') }}</span>
                         </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="required" for="proposal_validity">{{ trans('cruds.proposal.fields.proposal_validity') }} </label>
                            <input class="form-control {{ $errors->has('proposal_validity') ? 'is-invalid' : '' }}" type="text"
                                name="proposal_validity" id="proposal_validity" value="{{ old('proposal_validity', $proposal->proposal_validity) }}"
                                required>
                            @if($errors->has('proposal_validity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('proposal_validity') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.proposal_validity_helper') }}</span>
                        </div>
                        <div class="col-md-6">
                            <label class="required"
                                for="materials_supply_delivery">{{ trans('cruds.proposal.fields.materials_supply_delivery') }}</label>
                            <input class="form-control {{ $errors->has('materials_supply_delivery') ? 'is-invalid' : '' }}"
                                type="text" name="materials_supply_delivery" id="materials_supply_delivery"
                                value="{{ old('materials_supply_delivery', $proposal->materials_supply_delivery) }}" required>
                            @if($errors->has('materials_supply_delivery'))
                            <div class="invalid-feedback">
                                {{ $errors->first('materials_supply_delivery') }}
                            </div>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.proposal.fields.materials_supply_delivery_helper') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="warranty" class="required">{{ trans('cruds.proposal.fields.warranty') }}</label>
                            <input class="form-control {{ $errors->has('warranty') ? 'is-invalid' : '' }}" type="text"
                                name="warranty" id="warranty" value="{{ old('warranty', $proposal->warranty) }}" >
                            @if($errors->has('warranty'))
                            <div class="invalid-feedback">
                                {{ $errors->first('warranty') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.warranty_helper') }} </span>
                        </div>
                        <div class="col-md-6">
                            <label for="prices" class="required" >{{ trans('cruds.proposal.fields.prices') }}</label>
                            <input class="form-control {{ $errors->has('prices') ? 'is-invalid' : '' }}" type="text"
                                name="prices" id="prices" value="{{ old('prices', $proposal->prices) }}" >
                            @if($errors->has('prices'))
                            <div class="invalid-feedback">
                                {{ $errors->first('prices') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.prices_helper') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="required"
                                for="maintenance_service_contract">{{ trans('cruds.proposal.fields.maintenance_service_contract') }}
                                </label>
                            <input class="form-control {{ $errors->has('maintenance_service_contract') ? 'is-invalid' : '' }}"
                                type="text" name="maintenance_service_contract" id="maintenance_service_contract"
                                value="{{ old('maintenance_service_contract', $proposal->maintenance_service_contract) }}">
                            @if($errors->has('maintenance_service_contract'))
                            <div class="invalid-feedback">
                                {{ $errors->first('maintenance_service_contract') }}
                            </div>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.proposal.fields.maintenance_service_contract_helper') }}</span>
                        </div>
                        <div class="col-md-6">
                            <label for="payment_terms" class="required">{{ trans('cruds.proposal.fields.payment_terms') }} </label>
                            <textarea class="form-control {{ $errors->has('payment_terms') ? 'is-invalid' : '' }}"
                                name="payment_terms" id="payment_terms">{!! old('payment_terms',$proposal->payment_terms) !!}</textarea>
                            @if($errors->has('payment_terms'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_terms') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.payment_terms_helper') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes">{{ trans('cruds.proposal.fields.notes') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes"
                            id="notes">{!! old('notes',$proposal->notes) !!}</textarea>
                        @if($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.proposal.fields.notes_helper') }}</span>
                    </div>
         
                  
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="required"
                                for="proposal_date">{{ trans('cruds.proposal.fields.proposal_date') }}</label>
                            <input class="form-control date {{ $errors->has('proposal_date') ? 'is-invalid' : '' }}" type="text"
                                name="proposal_date" id="proposal_date" value="{{ old('proposal_date',$proposal->proposal_date) }}" required>
                            @if($errors->has('proposal_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('proposal_date') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.proposal_date_helper') }}</span>
                        </div>
                        <div class="col-md-6">
                            <label for="expire_date">{{ trans('cruds.proposal.fields.expire_date') }}</label>
                            <input class="form-control date {{ $errors->has('expire_date') ? 'is-invalid' : '' }}" type="text"
                                name="expire_date" id="expire_date" value="{{ old('expire_date',$proposal->expire_date) }}">
                            @if($errors->has('expire_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('expire_date') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.proposal.fields.expire_date_helper') }}</span>
                        </div>
                       
                    </div>
                     <div class="form-group">
                        <label for="items">{{ trans('cruds.proposal.fields.items') }}</label>
                        <select class="form-control  {{ $errors->has('items') ? 'is-invalid' : '' }}" name="porposal_item" id="porposal_item" onchange="getitem(this.value)">
                            <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
                            @foreach($ProposalsItem as  $v_item)
                            <option value="{{ $v_item->id }}" {{ old('porposal_item') == $v_item->id ? 'selected' : '' }}>  (EGP {{ $v_item->unit_cost }}) {{ $v_item->name }}
                            </option>
                             @endforeach
                        </select>
                        @if($errors->has('items'))
                        <div class="invalid-feedback">
                            {{ $errors->first('items') }}
                        </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.proposal.fields.items_helper') }}</span>
                    </div>
                    {{-- </div> --}}
                    {{--<div class="form-group">
                      
                    </div>
                    <div class="form-group">
                       
                    </div> --}}
        
                    {{-- add item --}}
                    <div class="row">
        
                        <div class="table-responsive">
                            <table class="table table-responsive invoice-items-table items">
                                <thead style="background: #e7e4e4">
                                    <tr>
                                        <th class="">Item Name</th>
                                        <th class="">Description</th>
                                        <th class="">Category</th>
                                        <th class="">Qty</th>
                                        <th class="">Unit</th>
                                        <th class="">Brand</th>
                                        <th class="">Part #</th>
                                        <th class="">Unit price</th>
                                        <th class="">Total Cost Price</th>
                                        <th class="">Margin</th>
                                        <th class="">Selling Price / Unit </th>
                                        <th class="">Delivery</th>
                                        <th class="">Tax Rate </th>
                                        <th class="">Total Selling Price</th>
                                        <th class=" hidden-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="main">
                                        <td class=""><input class="form-control" type="text" name="item_name" id=""></td>
                                        <td class=""><textarea class="form-control" name="item_desc" id="" cols="20" rows="2"></textarea></td>
                                        <td class=""><input class="form-control" type="text" name="group_name" id=""></td>
                                        <td class=""><input class="form-control" type="text" name="quantity" id=""></td>
                                        <td class=""><input class="form-control" type="number" name="unit" id=""></td>
                                        <td class=""><input class="form-control" type="text" name="brand" id=""></td>
                                        <td class=""><input class="form-control" type="text" name="part" id=""></td>
                                        <td class=""><input class="form-control " type="number" name="unit_cost" id=""></td>
                                        <td class=""><input class="form-control" type="number" name="total_cost_price" id="total_cost_price"></td>
                                        <td class=""><input class="form-control" type="number" name="margin" id=""></td>
                                        <td class=""><input class="form-control" type="number" name="selling_Price" id="" disabled> </td>
                                        <td class=""><input class="form-control" type="number" name="delivery" id=""></td>
                                        <td class="form-group"><select class="selectpicker tax" multiple  name="tax[]" id="" > 
                                            @foreach($taxRates as $id => $taxRate)
                                            <option value=" {{ $taxRate->rate_percent.'|'.$taxRate->name }}"  data-taxrate="{{ $taxRate->rate_percent }}" data-taxname="{{ $taxRate->name }}" data-subtext="{{ $taxRate->name }}" >
                                                {{ $taxRate->rate_percent.'% | '.$taxRate->name }}</option>
                                            @endforeach 
                                        </td>
                                        <td class="amount"></td>
                                        <input type="hidden" name="new_itmes_id">
                                        <td class=" hidden-print"><button type="button"
                                                onclick="add_item_to_table('undefined', 'undefined',1); return false;"
                                                class="btn-xs btn btn-info"><i class="fa fa-check"></i></button></td>
                                    </tr>
                                    @if($proposal->items->isEmpty() != true)
                                    @foreach($proposal->items as $key => $value)
                                    
                                    <tr class="sortable item" data-merge-invoice="1">
                                        <input type="hidden" class="order" name="items[{{ $key }}][order]" value="{{ $value->pivot->order }}">
                                        <input type="hidden" name="items[{{ $key }}][saved_items_id]" value="{{ $value->pivot->saved_items_id }}">
                                        <input type="hidden"  data-total-qty="" name="items[{{ $key }}][total_qty]" value="{{ $value->pivot->total_qty }}">
                                        <input type="hidden"  data-saved-items-id="" name="new_itmes_id[]" value="{{ $value->pivot->saved_items_id }}">
                                        <td class="item_name"><input name="items[{{ $key }}][item_name]" class="form-control "  value="{{ $value->pivot->name }}"></td>
                                        <td><textarea name="items[{{ $key }}][item_desc]"  class="form-control item_item_desc">{{ $value->pivot->description }}</textarea></td>
                                        <td class="group_name"><input class="form-control " type="text"  name="items[{{ $key }}][group_name]" id="" value="{{ $value->pivot->group_name }}"></td>
                                        <td><input type="number" data-parsley-type="number" min="0"  onblur="calculate_total_edit();" onchange="calculate_total_edit();"  data-quantity="" name="items[{{ $key }}][quantity]" value="{{ $value->pivot->quantity }}"  class="form-control "></td>
                                        <td class="ratex"><input type="text" data-parsley-type="number"  name="items[{{ $key }}][unit]" value="{{ $value->pivot->unit }}" class="form-control "></td>
                                        <td class="ratex"><input type="text" data-parsley-type="text"    name="items[{{ $key }}][brand]" value="{{ $value->pivot->brand }}" class="form-control "></td>
                                        <td class="ratex"><input type="text" data-parsley-type="text"  name="items[{{ $key }}][part]" value="{{ $value->pivot->part }}" class="form-control "></td>
                                        <td class="rate"><input type="number" data-parsley-type="number" value="{{ $value->pivot->unit_cost }}"  class="form-control  w-auto" onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[{{ $key }}][unit_cost]"></td>
                                        <td class="total_cost_price"><input type="text"   name="items[{{ $key }}][total_cost_price]" value="{{ $value->pivot->total_cost_price }}"   onblur="calculate_total_edit();" onchange="calculate_total_edit();"  total_cost_price="" placeholder="Total Cost Price" class="form-control "  readonly=""></td>
                                        <td class="margin"><input type="text" name="items[{{ $key }}][margin]" value="10"  onblur="calculate_total_edit();" onchange="calculate_total_edit();"  value="{{ $value->pivot->Margin }}" data-edit-margin="" placeholder="Margin" class="form-control "></td>
                                        <td class="rateee"> <input type="text" data-parsley-type="number"  onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[{{ $key }}][selling_price]"  value="{{ $value->pivot->selling_price }}" class="form-control "  readonly=""> </td>
                                        <td class="ratex"><input type="text" data-parsley-type="text" name="items[{{ $key }}][delivery]" value="{{ $value->pivot->delivery}}" class="form-control "></td>
                                        <td class="taxrate"> 
                                            <select class="selectpicker display-block tax" name="items[{{ $key }}][tax][]" multiple data-none-selected-text="no_tax" >
                                            @foreach($taxRates as $id => $taxRate)
                                            <option value=" {{ $taxRate->rate_percent.'|'.$taxRate->name }}" {{ $value->pivot->tax_name != null ? (in_array($taxRate->id, json_decode($value->pivot->tax_name)) ? 'selected' :'') :'' }}
                                                  data-taxrate="{{ $taxRate->rate_percent }}" data-taxname="{{ $taxRate->name }}" data-subtext="{{ $taxRate->name }}" >
                                                {{ $taxRate->rate_percent.'% | '.$taxRate->name }}</option>
                                            @endforeach 
                                            </select>
                                         </td>
                                        <td class="amount">{{ $value->pivot->total_cost_price }}</td>
                                        <td><a href="#" class="btn-xs btn btn-danger pull-left"  onclick="delete_item(this,undefined); return false;"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
        
        
        
                    </div>
                    {{-- end add item --}}
                    {{-- calculate  items --}}
                    <div class="row row d-flex justify-content-end">
                        <div class="col-md-6 pull-right">
                            <table class="table text-left">
                                <tbody>
                                    <tr id="subtotal">
                                        <td><span class="bold">Sub Total Without VAT :</span>  </td>
                                        <td class="subtotal"></td>
                                    </tr>
                                    <tr id="discount_percent">
                                        <td>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <span class="bold">Discount (%)</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" data-parsley-type="number" value="0" class="form-control pull-left" min="0" max="100" name="discount_percent" >
                                                </div>
                                            </div>
                                        </td>
                                        <td class="discount_percent"></td>
                                    </tr>
                                    <tr class="total_after_discount d-none">
                                        <td><span class="bold">Total After Discount :</span>  </td>
                                        <td class="after_discount"></td>
                                    </tr>
                                    <tr class="tax-area"></tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <span class="bold">Adjustment</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" data-parsley-type="number" value="0" class="form-control pull-left" name="adjustment" >
                                                </div>
                                            </div>
                                        </td>
                                        <td class="adjustment"></td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Total :</span> </td>
                                        <td class="total"></td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Total Cost Price ( Without Margin / Tax ) :</span> </td>
                                        <td class="total_without_margin"></td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Profit :</span> </td>
                                        <td class="profit"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-4 pull-left">
                        </div>
                    </div>
                    {{-- end calculate  items  --}}
        
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
<script src="{{ asset('js/proposals.js') }}"></script>
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