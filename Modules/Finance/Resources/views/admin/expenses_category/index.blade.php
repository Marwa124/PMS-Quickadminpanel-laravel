@extends('layouts.admin')
@section('content')
    @can('expenses_category_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.expenses_category.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.expenses_category') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.expenses_category.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-expenses_category">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.finance.expenses_category') }}
                    </th>
                    <th>

                    </th>

                </tr>

                </thead>
                <tbody>

                @foreach($expenses_category as $key => $expense)
                    <tr data-entry-id="{{ $expense->id }}">
                        <td></td>


                        <td>
                            {{ $expense->name ?? '' }}
                        </td>
                        <td>
                            <form class="text-center" id="delete_form"
                                  action="{{route('finance.admin.expenses_category.destroy',$expense)}}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
                                <a href="{{route('finance.admin.expenses_category.edit',$expense->id)}}"><i
                                            class="fas fa-edit"></i></a>
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
                    @can('expenses_category_delete')


            var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            var deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('finance.admin.expenses_category.massDestroy') }}",
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


                    @endcan



            var table = $('.datatable').DataTable({buttons: dtButtons});


        });

    </script>
@endsection
