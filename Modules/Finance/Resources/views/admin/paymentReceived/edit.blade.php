@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}

            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("finance.admin.payment_received.update", [$payment->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        {{--<div class="form-group">--}}
            {{--<label for="payer_email">{{ trans('cruds.payment.fields.payer_email') }}</label>--}}
            {{--<input class="form-control {{ $errors->has('payer_email') ? 'is-invalid' : '' }}" type="text" name="payer_email" id="payer_email" value="{{ old('payer_email', $payment->payer_email) }}">--}}
            {{--@if($errors->has('payer_email'))--}}
                {{--<div class="invalid-feedback">--}}
                    {{--{{ $errors->first('payer_email') }}--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<span class="help-block">{{ trans('cruds.payment.fields.payer_email_helper') }}</span>--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="payment_method">{{ trans('cruds.payment.fields.payment_method') }}</label>
            <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method">
                @foreach($payment_methods as $id => $payment_method)
                    <option value="{{ $id }}" {{ old('payment_method',$payment->payment_method) == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                @endforeach
            </select>
            @if($errors->has('payment_method'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_method') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="payment_method">{{ trans('cruds.payment.fields.payment_method') }}</label>--}}
            {{--<input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $payment->payment_method) }}">--}}
            {{--@if($errors->has('payment_method'))--}}
                {{--<div class="invalid-feedback">--}}
                    {{--{{ $errors->first('payment_method') }}--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
            <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="0.01">
            @if($errors->has('amount'))
                <div class="invalid-feedback">
                    {{ $errors->first('amount') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
        </div>
        <div class="form-group">
            <label for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
            <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $payment->payment_date) }}">
            @if($errors->has('payment_date'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_date') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.payment.fields.payment_date_helper') }}</span>
        </div>

        <div class="form-group">
            <label for="notes">{{ trans('cruds.payment.fields.notes') }}</label>
            <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $payment->notes) !!}</textarea>
            @if($errors->has('notes'))
                <div class="invalid-feedback">
                    {{ $errors->first('notes') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.payment.fields.notes_helper') }}</span>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="account_id">{{ trans('cruds.payment.fields.account') }}</label>--}}
            {{--<select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id">--}}
                {{--@foreach($accounts as $id => $account)--}}
                    {{--<option value="{{ $id }}" {{ (old('account_id') ? old('account_id') : $payment->account->id ?? '') == $id ? 'selected' : '' }}>{{ $account }}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
            {{--@if($errors->has('account'))--}}
                {{--<div class="invalid-feedback">--}}
                    {{--{{ $errors->first('account') }}--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<span class="help-block">{{ trans('cruds.payment.fields.account_helper') }}</span>--}}
        {{--</div>--}}

        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form>
             </div>
        </div>

    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>

                    {{ trans('cruds.payment.title_singular') }} {{trans('global.details')}} - {{$payment->transaction_id ??  ''}}
                    </div>

                    <a class="btn btn-success " href="{{ route('finance.admin.payment_received.payment_received_pdf',$payment->id) }}" title="pdf">
                    <i class="fa fa-file-pdf  " aria-hidden="true" ></i>
                </a>
                </div>

            </div>
            <div class="card-body">
                <div class="align-content-center">
                    {{ trans('cruds.finance.payment_received') }}
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col-sm-6 ">

                        <div class="p-2 ">

                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.payment_date') }}    :</p> <span class="col-md-6">{{ $payment->payment_date ??  ''  }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.transaction') }}     : </p><span class="col-md-6">{{ $payment->transaction_id ?? '' }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.client.title_singular') }}          :</p> <span class="col-md-6">{{ $payment->invoice && $payment->invoice->client && $payment->invoice->client->name ? $payment->invoice->client->name :  '' }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.payment_method') }}  : </p><span class="col-md-6">{{ $payment->paymentMethod && $payment->paymentMethod->name  ? $payment->paymentMethod->name : '' }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.payment.fields.notes') }}           : </p><span class="col-md-6">{{ $payment->notes  ?? '' }}</span> </div>

                        </div>
                    </div>
                    <div class="col-sm-6 ">

                        <div class="p-2 ">

                            <div class="row">{{ trans('cruds.payment.fields.amount') }}  </div>
                            <div class="row">{{$amounts ?? ''}}</div>

                        </div>
                    </div>
                </div>
                <div class="">
                    {{ trans('cruds.payment.title_singular') }}

                    <div class="table-responsive">
                        <table class=" table  ">
                            <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.invoice.title_singular') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.date') }}
                                </th>

                                <th>
                                    {{ trans('cruds.invoice.title_singular') }} {{ trans('cruds.payment.fields.amount') }}
                                    {{--{{ trans('cruds.invoice.fields.due_amount') }}--}}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.paid_amount') }}
                                </th>
                                @if( $payment->invoice && $payment->invoice->total_amount && $amounts && $payment->invoice->total_amount - $amounts >0)
                                    <th style="color:#cd0a0a" >
                                        {{ trans('cruds.invoice.fields.due_amount') }}
                                    </th>
                                @endif


                            </tr>

                            </thead>
                            <tbody>

                                <tr data-entry-id="{{ $payment->invoice->id }}">

                                    <td>
                                        {{ $payment->invoice && $payment->invoice->reference_no ?  $payment->invoice->reference_no : '' }}
                                    </td>
                                    <td>
                                        {{ $payment->invoice && $payment->invoice->invoice_date ? $payment->invoice->invoice_date : '' }}
                                    </td>
                                    <td>
                                        {{ $payment->invoice && $payment->invoice->total_amount ? $payment->invoice->total_amount : '' }}
                                    </td>
                                    <td>
                                        {{$amounts ?? ''}}
                                    </td>
                                    @if( $payment->invoice && $payment->invoice->total_amount && $amounts && $payment->invoice->total_amount - $amounts >0)
                                        <td  style="color:#cd0a0a">
                                            {{   $payment->invoice->total_amount - $amounts}}
                                        </td>
                                    @endif


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                xhr.open('POST', '/admin/finance/payment_received/ckmedia', true);
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
                data.append('crud_id', {{ $payment->id ?? 0 }});
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