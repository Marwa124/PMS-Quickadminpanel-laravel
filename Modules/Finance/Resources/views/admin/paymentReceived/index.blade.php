@extends('layouts.admin')
@section('content')
{{--@can('payment_received_create')--}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{--<a class="btn btn-success" href="{{ route('finance.admin.payment_received.create') }}">--}}

                {{--{{ trans('global.add') }} {{ trans('cruds.payment.title_singular') }}--}}
            {{--</a>--}}
{{--            @dd($invoices->count())--}}
            <a href="#invoiceModal" data-toggle="modal" data-target="#invoiceModal"
               data-invoices="{{$invoices}}" onclick="invoiceModal()"
               class="btn btn-info {{$invoices->count() > 0 ? '' : 'disabled'}}" >
                {{ trans('global.add') }} {{ trans('cruds.finance.payment_received') }}
            </a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: max-content;">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="invoiceModalTitle">{{ trans('cruds.invoice.title_singular') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <form action="{{route('finance.admin.payment_received.create_by_invoice')}}" method="POST">
                    <div class="modal-body">
                       @csrf
                       <div class="form-group">
                           <label for="invoice_id">{{ trans('cruds.payment.fields.invoice') }}</label>
                           <select class="form-control select2 {{ $errors->has('invoice_id') ? 'is-invalid' : '' }}" name="invoice_id" id="invoice_id" onchange="invoice_choies()">
                               <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>

                               @foreach($invoices as $invoice)
                                   <option value="{{ $invoice->id }}" {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>{{ $invoice->reference_no }}</option>
                               @endforeach
                           </select>
                           @if($errors->has('invoice_id'))
                               <div class="invalid-feedback">
                                   {{ $errors->first('invoice_id') }}
                               </div>
                           @endif
                           <span class="help-block">{{ trans('cruds.payment.fields.invoice_helper') }}</span>
                       </div>

                    </div>
                    <div class="modal-footer">
                           <button id="btn_create_payment" type="submit" class="btn btn-success disabled" >{{ trans('global.add') }} {{ trans('cruds.finance.payment_received') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
               </form>
            </div>
        </div>
    </div>
{{--@endcan--}}

<div class="card">
    <div class="card-header">
        {{ trans('cruds.finance.payment_received') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.invoice') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.amount') }}
                        </th>
                        {{--<th>--}}
                            {{--{{ trans('cruds.payment.fields.account') }}--}}
                        {{--</th>--}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                <a href="{{ route('finance.admin.payment_received.show', $payment->id) }}">
                                    {{ $payment->payment_date ?? '' }}
                                </a>

                            </td>
                            <td>
                                {{ $payment->invoice && $payment->invoice->invoice_date ? $payment->invoice->invoice_date :  '' }}
                            </td>
                            <td>
                                <a href="{{route('finance.admin.invoices.show',$payment->invoice && $payment->invoice->invoice_date ? $payment->invoice->id :'' )}}">

                                    {{ $payment->invoice && $payment->invoice->reference_no ? $payment->invoice->reference_no :  '' }}
                                </a>
                            </td>
                            <td>
                                {{ $payment->invoice && $payment->invoice->client && $payment->invoice->client->name ? $payment->invoice->client->name :  '' }}
                            </td>
                            <td>
                                {{ $payment->paymentMethod && $payment->paymentMethod->name  ? $payment->paymentMethod->name : '' }}
                            </td>
                            <td>
                                {{ $payment->amount ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $payment->account && $payment->account->name ? $payment->account->name : '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{--@can('payment_received_show')--}}
                                    <a class="btn btn-xs btn-primary" href="{{ route('finance.admin.payment_received.show', $payment->id) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                {{--@endcan--}}

                                {{--@can('payment_received_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('finance.admin.payment_received.edit', $payment->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                {{--@endcan--}}

                                {{--@can('payment_received_delete')--}}
                                    <form action="{{ route('finance.admin.payment_received.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                {{--@endcan--}}

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
{{--@can('payment_received_delete')--}}
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('finance.admin.payment_received.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      console.log(config.url)
      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () {
              location.reload()
          })
      }
    }
  }
  dtButtons.push(deleteButton)
{{--@endcan--}}

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Payment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

    function invoice_choies()
    {
        var btn_create_payment = document.getElementById('btn_create_payment');
        btn_create_payment.classList.remove("disabled");
    }

</script>
@endsection