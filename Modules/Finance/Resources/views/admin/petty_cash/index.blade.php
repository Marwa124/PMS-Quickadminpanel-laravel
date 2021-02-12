@extends('layouts.admin')
@section('content')
    {{--@can('petty_cash_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.petty_cash.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.petty_cash') }}
                </a>
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.petty_cash.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table id="datatable" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-petty_cash">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.petty_cash.fields.reference_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.petty_cash.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.petty_cash.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.petty_cash.fields.fullname') }}
                    </th>
                    <th>
                        {{ trans('cruds.petty_cash.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.petty_cash.fields.attachment') }}
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

            {{--@can('petty_cash_delete')--}}


                var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                var deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('finance.admin.petty_cash.massDestroy') }}",
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
                        "url": "{{route('finance.admin.petty_cash.get_data')}}"
                    },
                    columns: [
                        { data: 'placeholder', name: 'placeholder' },
                        {data: 'reference_no'},
                        {data: 'amount'},
                        {data: 'date'},
                        {data: 'fullname'},
                        {data: 'status'},
                        {data: 'attachment'},
                        {data: 'action'}

                    ]
            });


        });


    </script>
@endsection
