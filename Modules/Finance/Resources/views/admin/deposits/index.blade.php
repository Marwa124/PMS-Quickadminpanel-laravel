@extends('layouts.admin')
@section('content')
    @can('deposits_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.deposits.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.deposits') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.deposits.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table id="datatable" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-deposits">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.account_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.balance') }}
                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.paid_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.deposits.fields.attachment') }}
                    </th>
                    <th>

                    </th>

                </tr>

                </thead>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>


        $(function () {
            var dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            @can('deposits_delete')


                var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                var deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('finance.admin.deposits.massDestroy') }}",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {
                        var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}');

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                headers: {'x-csrf-token': _token},
                                method: 'POST',
                                url: config.url,
                                data: { ids: ids, _method: 'DELETE' }})
                                .done(function () { location.reload() })
                        }
                    }
                };
                dtButtons.push(deleteButton);




            @endcan

            var table = $('#datatable').DataTable({
                    buttons: dtButtons,
                    "ajax": {
                        "url": "{{route('finance.admin.deposits.get_data')}}"
                    },
                    columns: [
                        { data: 'placeholder', name: 'placeholder' },
                        {data: 'title'},
                        {data: 'date'},
                        {data: 'account_name'},
                        {data: 'amount'},
                        {data: 'balance'},
                        {data: 'paid_by'},
                        {data: 'attachment'},
                        {data: 'action'}

                    ]
            });


        });

    </script>
@endsection
