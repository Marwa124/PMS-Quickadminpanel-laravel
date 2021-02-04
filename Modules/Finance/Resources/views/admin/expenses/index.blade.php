@extends('layouts.admin')
@section('content')
    @can('expenses_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.expenses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.expenses') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.expenses.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table id="datatable" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-expenses">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.expenses.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.expenses.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.expenses.fields.account_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.expenses.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.expenses.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.expenses.fields.attachment') }}
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

            @can('expenses_delete')


                var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                var deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('finance.admin.expenses.massDestroy') }}",
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
                        "url": "{{route('finance.admin.expenses.get_data')}}"
                    },
                    columns: [
                        { data: 'placeholder', name: 'placeholder' },
                        {data: 'title'},
                        {data: 'date'},
                        {data: 'account_name'},
                        {data: 'amount'},
                        {data: 'status'},
                        {data: 'attachment'},
                        {data: 'action'}

                    ]
            });


        });

    </script>
@endsection
