@extends('layouts.admin')
@section('content')

    <a class="btn btn-danger m-3" href="{{route('finance.admin.transfers.transfer_pdf')}}" title="{{ trans('cruds.transfers.transfers_report') }} pdf">
        <i class="fa fa-file-pdf  " aria-hidden="true" ></i>
    </a>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.transfers.transfers_report') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable ">
                    <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
                            {{ trans('cruds.transfers.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfers.fields.from_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfers.fields.to_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfers.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.transfers.fields.amount') }}
                        </th>

                    </tr>

                    </thead>
                    <tbody>

                    @foreach($transfers as $key => $transfer)
                        <tr data-entry-id="{{ $transfer->id }}">
                           <td></td>


                            <td>
                                {{ $transfer->date ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->from->name ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->to->name ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->payment_method->name ?? '' }}
                            </td>
                            <td>
                                {{ $transfer->amount ?? '' }} EGP
                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td COLSPAN="4"><b>@lang('global.total')</b></td>
                        <td>{{$total_balance}} EGP</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            var dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);


            dtButtons.splice(0,5);
            dtButtons.splice(2,1);



            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 25,
                "paging":   false,
                "searching": false,
                "bInfo": false,
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }]

            });
            var table = $('.datatable').DataTable({ buttons: dtButtons });

            table.buttons( '.buttons-pdf' ).remove();

        })

    </script>
@endsection
