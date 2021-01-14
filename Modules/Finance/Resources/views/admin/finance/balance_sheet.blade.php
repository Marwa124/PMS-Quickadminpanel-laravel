@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.finance.balance_sheet') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable ">
                    <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
                            {{ trans('cruds.account.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.account.fields.balance') }}
                        </th>

                    </tr>

                    </thead>
                    <tbody>

                    @foreach($bank_accounts as $key => $account)
                        <tr data-entry-id="{{ $account->id }}">
                           <td></td>


                            <td>
                                {{ $account->name ?? '' }}
                            </td>
                            <td>
                                {{ $account->balance ?? '' }} EGP
                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td><b>@lang('global.total')</b></td>
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
