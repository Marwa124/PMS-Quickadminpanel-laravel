@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaction.title_singular') }} {{ trans('global.list') }}


        <a href="{{route('finance.admin.transactions.pdf')}}"><i
                class="fas fa-file-pdf"></i></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Transaction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.account') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.credit') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.total_balance') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $key => $transaction)
                        <tr data-entry-id="{{ $transaction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transaction->date ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->account->name ?? '' }}
                            </td>
                            <td>
                                {{trans('cruds.transaction.fields.'. $transaction->type)  ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->amount != null  ? $transaction->amount. ' EGP' :  '0.0 EGP' }}
                            </td>
                            <td>
                                {{ $transaction->credit != null  ? $transaction->credit. ' EGP' :  '0.0 EGP' }}
                            </td>
                            <td>
                                {{ $transaction->debit != null  ? $transaction->debit. ' EGP' :  '0.0 EGP' }}
                            </td>
                            <td>
                                {{ $transaction->total_balance != null  ? $transaction->total_balance. ' EGP' :  '0.0 EGP' }}
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Transaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
