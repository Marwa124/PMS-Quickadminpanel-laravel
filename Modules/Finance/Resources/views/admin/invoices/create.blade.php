@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.invoices.store") }}" enctype="multipart/form-data">
                <input type="hidden" name="user_id"  value="{{ auth()->user()->id }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="reference_no"
                               class="required">{{ trans('cruds.proposal.fields.reference_no') }} </label>
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
                        <input class="btn btn-primary form-control" type="button"
                               id="recurring_switch" onclick="recur_switch()"
                               value="{{ trans('cruds.invoice.fields.recurring_switch') }}">

                    </div>

                </div>
                <div class="form-group row" id="recu_div">
                    <div class="col-md-6">
                        <label  for="recurring">{{ trans('cruds.invoice.fields.recurring') }}</label>
                        <select class="form-control  {{ $errors->has('recurring') ? 'is-invalid' : '' }}"
                                name="recurring"
                                id="recurring" >
                            <option value="none" selected="">{{trans('cruds.invoice.fields.none')}}</option>
                            <option value="week">{{trans('cruds.invoice.fields.week')}}</option>
                            <option value="month">{{trans('cruds.invoice.fields.month')}}</option>
                            <option value="quarter">{{trans('cruds.invoice.fields.quarter')}}</option>
                            <option value="six_monthly"
                            >{{trans('cruds.invoice.fields.six_monthly')}}</option>
                            <option value="yearly">{{trans('cruds.invoice.fields.yearly')}}</option>
                            <option value="two_years">{{trans('cruds.invoice.fields.two_years')}}</option>
                            <option value="three_years"
                            >{{trans('cruds.invoice.fields.three_years')}}</option>

                        </select>
                        @if($errors->has('recurring'))
                            <div class="invalid-feedback">
                                {{ $errors->first('recurring') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.Related_To_helper') }}</span>
                    </div>


                    <div class="col-md-6">
                        <label
                               for="recur_start_date">{{ trans('cruds.invoice.fields.recur_start_date') }}</label>
                        <input class="form-control date {{ $errors->has('recur_start_date') ? 'is-invalid' : '' }}"
                               type="text"
                               name="recur_start_date" id="recur_start_date" value="{{ old('recur_start_date') }}"
                               >
                        @if($errors->has('recur_start_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('recur_start_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.recur_start_date_helper') }}</span>
                    </div>

                    <div class="col-md-6">
                        <label
                               for="recur_end_date">{{ trans('cruds.invoice.fields.recur_end_date') }}</label>
                        <input class="form-control date {{ $errors->has('recur_end_date') ? 'is-invalid' : '' }}"
                               type="text"
                               name="recur_end_date" id="recur_end_date" value="{{ old('recur_end_date') }}" >
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
                        <select class="form-control  {{ $errors->has('client_id') ? 'is-invalid' : '' }}"
                                name="client_id"
                                id="client_id" required>
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
                    <div class="col-md-6">
                        <label class="required" for="project_id">{{ trans('cruds.invoice.fields.project') }}</label>
                        <select class="form-control  {{ $errors->has('project_id') ? 'is-invalid' : '' }}"
                                name="project_id"
                                id="project_id" required>
                            <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('project_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('project_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.proposal.fields.Related_To_helper') }}</span>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label
                               for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                        <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}"
                               type="text"
                               name="invoice_date" id="invoice_date" value="{{ old('invoice_date',date('Y-m-d')) }}" required>
                        @if($errors->has('invoice_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('invoice_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
                    </div>

                    <div class="col-md-6">
                        <label
                               for="due_date">{{ trans('cruds.invoice.fields.due_date') }}</label>
                        <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text"
                               name="due_date" id="due_date" value="{{ old('due_date',date('Y-m-d',strtotime( ' + 5 days'))) }}" required>
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
                        <select class="form-control  {{ $errors->has('discounts') ? 'is-invalid' : '' }}"
                                name="discounts"
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
                        @foreach($ProposalsItem as  $v_item)
                            <option
                                value="{{ $v_item->id }}" {{ old('porposal_item') == $v_item->id ? 'selected' : '' }}>
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
                {{-- </div> --}}
                {{--<div class="form-group">

                </div>
                <div class="form-group">

                </div> --}}

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
                                <td class=""><textarea class="form-control" name="item_desc" id="" cols="20" rows="2"></textarea></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="group_name" id=""></td>
                                <td class=""><input class="form-control" type="text" name="quantity" id=""></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="unit" id=""></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="brand" id=""></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="part" id=""></td>
                                <td class=""><input class="form-control " type="number" name="unit_cost" id=""></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="total_cost_price" id="total_cost_price"></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="margin" id=""></td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="selling_Price" id="" disabled> </td>
                                <td class="" style="display: none"><input class="form-control" type="hidden" name="delivery" id=""></td>
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
                                <td class="subtotal"></td>
                            </tr>
                            <tr id="discount_percent">
                                <td>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="bold">Discount (%)</span>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" data-parsley-type="number" value="0"
                                                   class="form-control pull-left" min="0" max="100"
                                                   name="discount_percent">
                                        </div>
                                    </div>
                                </td>
                                <td class="discount_percent"></td>
                            </tr>
                            <tr class="total_after_discount d-none">
                                <td><span class="bold">Total After Discount :</span></td>
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
                                            <input type="number" data-parsley-type="number" value="0"
                                                   class="form-control pull-left" name="adjustment">
                                        </div>
                                    </div>
                                </td>
                                <td class="adjustment"></td>
                            </tr>
                            <tr>
                                <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Total :</span>
                                </td>
                                <td class="total"></td>
                            </tr>
                            <tr>
                                <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Total Cost Price ( Without Margin / Tax ) :</span>
                                </td>
                                <td class="total_without_margin"></td>
                            </tr>
                            <tr>
                                <td><span class="bold" style="background-color:#e8e8e8;color:#6d6d6d;">Profit :</span>
                                </td>
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
    <script src="{{ asset('js/invoices.js') }}"></script>
    <script>
        $('#recu_div').hide();
        var recu = false;

        $(document).ready(function () {


            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/invoices/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function () {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function () {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', {{$invoice-> id ?? 0}});
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
