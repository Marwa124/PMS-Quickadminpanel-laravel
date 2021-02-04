@extends('layouts.admin')
@section('content')
    @can('transfer_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.transfers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.transfers') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.transfers.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table id="datatable" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-transfers">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.transfers.fields.from_account') }}
                    </th>
                    <th>
                        {{ trans('cruds.transfers.fields.to_account') }}
                    </th>
                    <th>
                        {{ trans('cruds.transfers.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.transfers.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.transfers.fields.attachment') }}
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

            {{--@can('transfers_delete')--}}


                var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                var deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('finance.admin.transfers.massDestroy') }}",
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




            {{--@endcan--}}

            var table = $('#datatable').DataTable({
                    buttons: dtButtons,
                    "ajax": {
                        "url": "{{route('finance.admin.transfers.get_data')}}"
                    },
                    columns: [
                        { data: 'placeholder', name: 'placeholder' },
                        {data: 'from'},
                        {data: 'to'},
                        {data: 'amount'},
                        {data: 'date'},
                        {data: 'attachment'},
                        {data: 'action'}

                    ]
            });


        });

    </script>
@endsection
