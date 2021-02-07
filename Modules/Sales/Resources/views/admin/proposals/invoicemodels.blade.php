<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
@csrf
<div class="form-group row">
    <div class="col-md-6">
        <label for="reference_no" class="required">{{ trans('cruds.proposal.fields.reference_no') }} </label>
        <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text"
            name="reference_no" id="reference_no" value="{{ generate_invoice_number() }}" readonly>
        @if($errors->has('reference_no'))
        <div class="invalid-feedback">
            {{ $errors->first('reference_no') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.proposal.fields.reference_no_helper') }}</span>
    </div>

    <div class="col-md-6">
        <label for="recurring_switch"> {{ trans('cruds.invoice.fields.recurring_switch') }}</label>
        <input class="btn btn-primary form-control" type="button" id="recurring_switch" onclick="recur_switch()"
            value="{{ trans('cruds.invoice.fields.recurring_switch') }}">

    </div>

</div>
<div class="form-group row" id="recu_div">
    <div class="col-md-6">
        <label for="recurring">{{ trans('cruds.invoice.fields.recurring') }}</label>
        <select class="form-control  {{ $errors->has('recurring') ? 'is-invalid' : '' }}" name="recurring"
            id="recurring">
            <option value="none" selected="">{{trans('cruds.invoice.fields.none')}}</option>
            <option value="week">{{trans('cruds.invoice.fields.week')}}</option>
            <option value="month">{{trans('cruds.invoice.fields.month')}}</option>
            <option value="quarter">{{trans('cruds.invoice.fields.quarter')}}</option>
            <option value="six_monthly">{{trans('cruds.invoice.fields.six_monthly')}}</option>
            <option value="yearly">{{trans('cruds.invoice.fields.yearly')}}</option>
            <option value="two_years">{{trans('cruds.invoice.fields.two_years')}}</option>
            <option value="three_years">{{trans('cruds.invoice.fields.three_years')}}</option>

        </select>
        @if($errors->has('recurring'))
        <div class="invalid-feedback">
            {{ $errors->first('recurring') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.invoice.fields.Related_To_helper') }}</span>
    </div>


    <div class="col-md-6">
        <label for="recur_start_date">{{ trans('cruds.invoice.fields.recur_start_date') }}</label>
        <input class="form-control date {{ $errors->has('recur_start_date') ? 'is-invalid' : '' }}" type="text"
            name="recur_start_date" id="recur_start_date" value="{{ old('proposal_date',$proposal->proposal_date) }}">
        @if($errors->has('recur_start_date'))
        <div class="invalid-feedback">
            {{ $errors->first('recur_start_date') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.invoice.fields.recur_start_date_helper') }}</span>
    </div>

    <div class="col-md-6">
        <label for="recur_end_date">{{ trans('cruds.invoice.fields.recur_end_date') }}</label>
        <input class="form-control date {{ $errors->has('recur_end_date') ? 'is-invalid' : '' }}" type="text"
            name="recur_end_date" id="recur_end_date" value="{{ old('expire_date',$proposal->expire_date) }}">
        @if($errors->has('recur_end_date'))
        <div class="invalid-feedback">
            {{ $errors->first('recur_end_date') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.invoice.fields.recur_end_date_helper') }}</span>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <label class="required" for="client_id">{{ trans('cruds.proposal.fields.client') }}</label>
        <select class="form-control  {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id"
            id="client_id" onchange="get_projects()" required>
            <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
            @foreach($clients as $client)
            <option value="{{$client->id}}">{{$client->name}}</option>
            @endforeach
        </select>
        @if($errors->has('client_id'))
        <div class="invalid-feedback">
            {{ $errors->first('client_id') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.proposal.fields.Related_To_helper') }}</span>
    </div>


    <div class="col-md-6" id="projects_div">

    </div>

</div>


<div class="form-group row">
    <div class="col-md-6">
        <label for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
        <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text"
            name="invoice_date" id="invoice_date" value="{{ old('invoice_date',date('Y-m-d')) }}" required>
        @if($errors->has('invoice_date'))
        <div class="invalid-feedback">
            {{ $errors->first('invoice_date') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
    </div>

    <div class="col-md-6">
        <label for="due_date">{{ trans('cruds.invoice.fields.due_date') }}</label>
        <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date"
            id="due_date" value="{{ old('due_date',date('Y-m-d',strtotime( ' + 5 days'))) }}" required>
        @if($errors->has('due_date'))
        <div class="invalid-feedback">
            {{ $errors->first('due_date') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.invoice.fields.due_date_helper') }}</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label for="discounts">{{ trans('cruds.invoice.fields.discounts') }}</label>
        <select class="form-control  {{ $errors->has('discounts') ? 'is-invalid' : '' }}" name="discounts"
            id="ifdiscounts" onchange="calculate_total_edit()">

            <option value="no_discount">{{trans('cruds.invoice.fields.no_discount')}}</option>
            <option value="before_tax">{{trans('cruds.invoice.fields.before_tax')}}</option>
            <option value="after_tax">{{trans('cruds.invoice.fields.after_tax')}}</option>

        </select>
        @if($errors->has('discounts'))
        <div class="invalid-feedback">
            {{ $errors->first('discounts') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.invoice.fields.discounts_helper') }}</span>
    </div>

</div>
<div class="form-group">
    <label for="notes">{{ trans('cruds.proposal.fields.notes') }}</label>
    <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes"
        id="notes">{!! old('notes') !!}</textarea>
    @if($errors->has('notes'))
    <div class="invalid-feedback">
        {{ $errors->first('notes') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.proposal.fields.notes_helper') }}</span>
</div>

<hr>
<div class="form-group">
    <label for="porposal_item">{{ trans('cruds.proposal.fields.items') }}</label>
    <select class="form-control  {{ $errors->has('items') ? 'is-invalid' : '' }}" name="porposal_item"
        id="porposal_item" onchange="getitem(this.value)">
        <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
        @foreach($ProposalsItem as $v_item)
        <option value="{{ $v_item->id }}" {{ old('porposal_item') == $v_item->id ? 'selected' : '' }}>
            (EGP {{ $v_item->unit_cost }}) {{ $v_item->name }}
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


{{-- add item --}}
<div class="row">

    <div class="table-responsive">
        <table class="table  invoice-items-table items">
            <thead style="background: #e7e4e4">
                <tr>
                    <th class="">Item Name</th>
                    <th class="">Description</th>
                    <th class="">Qty</th>

                    <th class="">Unit price</th>

                    <th class="">Tax Rate</th>
                    <th class="">Total Selling Price</th>
                    <th class=" hidden-print">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="main">
                    <td class=""><input class="form-control" type="text" name="item_name" id=""></td>
                    <td class=""><textarea class="form-control" name="item_desc" id="" cols="20" rows="2"></textarea>
                    </td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="group_name"
                            id=""></td>
                    <td class=""><input class="form-control" type="text" name="quantity" id=""></td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="unit" id=""></td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="brand" id="">
                    </td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="part" id=""></td>
                    <td class=""><input class="form-control " type="number" name="unit_cost" id=""></td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="total_cost_price"
                            id="total_cost_price"></td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="margin" id="">
                    </td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="selling_Price"
                            id="" disabled> </td>
                    <td class="" style="display: none"><input class="form-control" type="hidden" name="delivery" id="">
                    </td>
                    <td class="form-group"><select class="selectpicker tax" multiple name="tax[]" id="">
                            @foreach($taxRates as $id => $taxRate)
                            <option value=" {{ $taxRate->rate_percent.'|'.$taxRate->name }}"
                                data-taxrate="{{ $taxRate->rate_percent }}" data-taxname="{{ $taxRate->name }}"
                                data-subtext="{{ $taxRate->name }}">
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

                <input type="hidden" name="item_relation_id[]" value="{{ $value->pivot->id }}">
                <tr class="sortable item" data-merge-invoice="1">
                    <input type="hidden" class="order" name="items[{{ $key }}][order]"
                        value="{{ $value->pivot->order }}">
                    <input type="hidden" name="items[{{ $key }}][saved_items_id]" value="{{ $value->pivot->item_id }}">
                    <input type="hidden" data-total-qty="" name="items[{{ $key }}][total_qty]"
                        value="{{ $value->pivot->total_qty }}">
                    <input type="hidden" data-saved-items-id="" name="new_itmes_id[]"
                        value="{{ $value->pivot->item_id }}">
                    <td class="item_name"><input name="items[{{ $key }}][item_name]" class="form-control "
                            value="{{ $value->pivot->item_name }}"></td>
                    <td><textarea name="items[{{ $key }}][item_desc]"
                            class="form-control item_item_desc">{{ $value->pivot->item_desc }}</textarea>
                    </td>
                    <td class="group_name" style="display:none"><input class="form-control " type="hidden"
                            name="items[{{ $key }}][group_name]" id="" value="{{ $value->pivot->group_name }}"></td>
                    <td><input type="number" data-parsley-type="number" min="0" onblur="calculate_total_edit();"
                            onchange="calculate_total_edit();" data-quantity="" name="items[{{ $key }}][quantity]"
                            value="{{ $value->pivot->quantity }}" class="form-control "></td>
                    <td class="ratex" style="display:none"><input type="hidden" data-parsley-type="number"
                            name="items[{{ $key }}][unit]" value="{{ $value->pivot->unit }}" class="form-control "></td>
                    <td class="ratex" style="display:none"><input type="hidden" data-parsley-type="text"
                            name="items[{{ $key }}][brand]" value="{{ $value->pivot->brand }}" class="form-control ">
                    </td>
                    <td class="ratex" style="display:none"><input type="hidden" data-parsley-type="text"
                            name="items[{{ $key }}][part]" value="{{ $value->pivot->part }}" class="form-control "></td>
                    <td class="rate"><input type="number" data-parsley-type="number"
                            value="{{ $value->pivot->unit_cost }}" class="form-control  w-auto"
                            onblur="calculate_total_edit();" onchange="calculate_total_edit();"
                            name="items[{{ $key }}][unit_cost]"></td>
                    <td class="total_cost_price" style="display:none"><input type="hidden"
                            name="items[{{ $key }}][total_cost_price]" value="{{ $value->pivot->total_cost_price }}"
                            onblur="calculate_total_edit();" onchange="calculate_total_edit();" total_cost_price=""
                            placeholder="Total Cost Price" class="form-control " readonly=""></td>
                    <td class="margin" style="display:none"><input type="hidden" name="items[{{ $key }}][margin]"
                            onblur="calculate_total_edit();" onchange="calculate_total_edit();"
                            value="{{ $value->pivot->margin }}" data-edit-margin="" placeholder="Margin"
                            class="form-control "></td>
                    <td class="rateee" style="display:none"><input type="hidden" data-parsley-type="number"
                            onblur="calculate_total_edit();" onchange="calculate_total_edit();"
                            name="items[{{ $key }}][selling_price]" value="{{ $value->pivot->selling_price }}"
                            class="form-control " readonly=""></td>
                    <td class="ratex" style="display:none"><input type="hidden" data-parsley-type="text"
                            name="items[{{ $key }}][delivery]" value="{{ $value->pivot->delivery}}"
                            class="form-control "></td>
                    <td class="taxrate">

                        <select class="selectpicker display-block tax" name="items[{{ $key }}][tax][]" multiple
                            data-none-selected-text="no_tax">{{-- invoice->itemtaxs->pluck('taxs_id') --}}
                            @foreach($taxRates as $id => $taxRate)
                            <option value=" {{ $taxRate->id }}"
                                {{ $proposal->itemtaxs->where('item_id',$value->pivot->id)->pluck('taxs_id')->isEmpty() != true ? (in_array($taxRate->id, $proposal->itemtaxs->where('item_id',$value->pivot->id)->pluck('taxs_id')->toArray()) ? 'selected' :'') :'' }}
                                data-taxrate="{{ $taxRate->rate_percent }}" data-taxname="{{ $taxRate->name }}"
                                data-subtext="{{ $taxRate->name }}">
                                {{ $taxRate->rate_percent.'% | '.$taxRate->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="amount">{{ $value->pivot->unit_cost * $value->pivot->quantity   }}</td>
                    <td><a href="#" class="btn-xs btn btn-danger pull-left"
                            onclick="delete_item(this,undefined); return false;"><i class="fa fa-trash"></i></a></td>
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
                                <td><span class="bold">Sub Total Without VAT :</span></td>
                                <td class="subtotal">{{ $proposal->after_discount }}<input type="hidden" name="subtotal"
                                                                                          value="{{ $proposal->after_discount }}">
                                </td>
                            </tr>
                            <tr id="discount_percent">
                                <td>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="bold">Discount (%)</span>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" data-parsley-type="number"
                                                   value="{{ $proposal->discount_percent }}"
                                                   class="form-control pull-left" min="0" max="100"
                                                   name="discount_percent">
                                        </div>
                                    </div>
                                </td>
                                <td class="discount_percent">{{ $proposal->discount_total }}
                                    <input type="hidden" name="discount_percent"
                                           value="{{ $proposal->discount_percent }}">
                                    <input type="hidden" name="discount_total" value="{{ $proposal->discount_total }}">
                                </td>
                            </tr>
                            <tr class="total_after_discount @if($proposal->discount_percen == '' || $proposal->discount_percen == 0 || $proposal->discount_percen == 100) d-none @endif ">
                                <td><span class="bold">Total After Discount :</span></td>
                                <td class="after_discount">{{$proposal->after_discount}}<input type="hidden"
                                                                                              name="after_discount"
                                                                                              value="{{$proposal->after_discount}}">
                                </td>
                            </tr>
                            @if($proposal->items->isEmpty() != true)

                                @foreach($proposal->gettaxesarray($proposal) as $key=> $taxold)


                                    <tr class="tax-area">
                                        <td>{{get_taxes($key)->name }}({{ get_taxes($key)->rate_percent }}%)</td>
                                        <td id="tax_id_{{ get_taxes($key)->id }}">
                                            {{ array_sum($taxold) }}
                                            <input type="hidden" name="total_tax_name[]"
                                                   value="{{ get_taxes($key)->rate_percent }}|{{get_taxes($key)->name }}">
                                            <input type="hidden" name="total_tax[]" value=" {{ array_sum($taxold) }}">
                                        </td>

                                    </tr>

                                @endforeach

                            @else
                                <tr class="tax-area"></tr>
                            @endif


                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="bold">Adjustment</span>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" data-parsley-type="number"
                                                   value="{{ $proposal->adjustment }}" class="form-control pull-left"
                                                   name="adjustment">
                                        </div>
                                    </div>
                                </td>
                                <td class="adjustment">{{ $proposal->adjustment }}<input type="hidden" name="adjustment"
                                                                                        value="{{ $proposal->adjustment }}">
                                </td>
                            </tr>
                            <tr>
                                <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Total :</span>
                                </td>
                                <td class="total">{{ $proposal->total_tax + $proposal->after_discount }}<input
                                        type="hidden" name="total"
                                        value="{{ $proposal->total_tax + $proposal->after_discount }}"></td>
                            </tr>
                            <tr style="display:none;">
                                <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Total Cost Price ( Without Margin / Tax ) :</span>
                                </td>
                                <td class="total_without_margin">@if($proposal->items->isEmpty() != true) {{ $proposal->items->sum('pivot.total_cost_price') }} @endif
                                    <input type="hidden" name="total_without_margin"
                                           value="@if($proposal->items->isEmpty() != true) {{ $proposal->items->sum('pivot.total_cost_price') }} @else 0 @endif">
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-4 pull-left">
                    </div>
                </div>
{{-- end calculate  items  --}}

