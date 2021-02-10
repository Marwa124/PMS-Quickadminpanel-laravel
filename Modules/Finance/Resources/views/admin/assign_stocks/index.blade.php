@extends('layouts.admin')
@section('content')
    {{--@can('assign_stocks_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.assign_stocks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.assign_stocks') }}
                </a>
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.assign_stocks.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-assign_stocks">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.assign_stocks.fields.item_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.assign_stocks.fields.stock_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.assign_stocks.fields.assign_quantity') }}
                    </th>
                    <th>
                        {{ trans('cruds.assign_stocks.fields.assign_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.assign_stocks.fields.assigned_user') }}
                    </th>
                    <th>

                    </th>

                </tr>

                </thead>
                <tbody>

                @foreach($assign_stocks as $key => $stock)
                    <tr data-entry-id="{{ $stock->id }}">
                        <td></td>


                        <td>
                            {{ $stock->stock->name ?? '' }}
                        </td>
                        <td>
                            {{ $stock->sub_category->name ?? '' }}
                        </td>
                        <td>
                            {{ $stock->quantity ?? '' }}
                        </td>
                        <td>
                            {{ $stock->assign_date ?? '' }}
                        </td>
                        <td>
                            {{ $stock->user->accountDetail->fullname ?? '' }}
                        </td>
                        <td>
                            <form class="text-center" id="delete_form"
                                  action="{{route('finance.admin.assign_stocks.destroy',$stock)}}" method="post" onsubmit="return confirm('Do you really want to delete this?');">

                                @csrf
                                @method("DELETE")
                                <button class="btn" type="submit"><i
                                            style="color:#cd0a0a" class="fas fa-trash" ></i></button>
                            </form>
                        </td>


                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>

        $(function () {
            var dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
                    {{--@can('assign_stocks_delete')--}}


            var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            var deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('finance.admin.assign_stocks.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
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



            var table = $('.datatable').DataTable({buttons: dtButtons});


        });

    </script>
@endsection
