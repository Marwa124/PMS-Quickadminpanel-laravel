@extends('layouts.admin')
@section('content')


    <div class="m-2 col-3">
        <select class="form-control select2" id="filter">
            <option value="all"> {{ trans('cruds.settlement.fields.all') }}</option>
            <option value="my_settlement"> {{ trans('cruds.settlement.fields.my_settlement') }}</option>
            <option value="pending"> {{ trans('cruds.settlement.fields.pending') }}</option>
        </select>
    </div>

    <input type="hidden" name="id"  value="{{isset($id) ? $id : ''}}" id="id">

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.settlement.title_singular') }} {{ trans('global.list') }}
        </div>


        <div class="card-body">
            <table id="datatable"
                   class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-settlement">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.settlement.fields.invoice_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.settlement.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.settlement.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.settlement.fields.fullname') }}
                    </th>
                    <th>
                        {{ trans('cruds.settlement.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.settlement.fields.attachment') }}
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

        $(document).ready(function () {
            filter_components();
            function filter_components(filter = "",id= "")
            {

                $(function () {
                    var dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

                        {{--@can('settlement_delete')--}}


                    var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                    var deleteButton = {
                        text: deleteButtonTrans,
                        url: "{{ route('finance.admin.settlement.massDestroy') }}",
                        className: 'btn-danger',
                        action: function (e, dt, node, config) {
                            var ids = $.map(dt.rows({selected: true}).data(), function (entry) {
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
                                    data: {ids: ids, _method: 'DELETE'}
                                })
                                    .done(function () {
                                        location.reload()
                                    })
                            }
                        }
                    };
                    dtButtons.push(deleteButton);


                        {{--@endcan--}}

                    var table = $('#datatable').DataTable({
                            buttons: dtButtons,
                            "ajax": {
                                "url": "{{route('finance.admin.settlement.get_data')}}",
                                data: {type: filter,id:id}
                            },
                            columns: [
                                {data: 'placeholder', name: 'placeholder'},
                                {data: 'invoice_number'},
                                {data: 'amount'},
                                {data: 'date'},
                                {data: 'fullname'},
                                {data: 'status'},
                                {data: 'attachment'},
                                {data: 'action'}

                            ]
                        });


                });
            }


            $('#filter').change(function () {

                var filter = $('#filter').val();
                var id = $('#id').val();


                $('#datatable').DataTable().destroy();
                filter_components(filter, id);

            });


            $('#id').change(function () {

                var filter = $('#filter').val();
                var id = $('#id').val();


                $('#datatable').DataTable().destroy();
                filter_components(filter, id);

            });
        });

    </script>
@endsection
