@extends('layouts.admin')
@section('content')
    @can('stock_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('finance.admin.stock_category.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.finance.stock_category') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.stock_category.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($stock_category as $category)
                    <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{$category->name}}</h3>
                        </div>
                        <div class="col-6">
                            <form class="text-center" id="delete_form"
                                  action="{{route('finance.admin.stock_category.destroy',$category)}}"
                                  method="post"
                                  onsubmit="return confirm('Do you really want to delete this?');">
                                <a href="{{route('finance.admin.stock_category.edit',$category->id)}}"><i
                                        class="fas fa-edit"></i></a>
                                @csrf
                                @method("DELETE")
                                <button class="btn" type="submit"><i
                                        style="color:#cd0a0a" class="fas fa-trash"></i></button>
                            </form>
                        </div>
                        </div>
                        <table
                            class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-stock_category">
                            <thead>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    {{ trans('cruds.finance.sub_stock_category') }}
                                </th>
                                <th>

                                </th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($category->sub_categories as $key => $sub_category)
                                <tr data-entry-id="{{ $sub_category->id }}">
                                    <td></td>


                                    <td>
                                        {{ $sub_category->name ?? '' }}
                                    </td>
                                    <td>
                                        <form class="text-center" id="delete_form"
                                              action="{{route('finance.admin.sub_stock_category.destroy')}}"
                                              method="post"
                                              onsubmit="return confirm('Do you really want to delete this?');">
                                            <a href="{{route('finance.admin.stock_category.edit',$sub_category->id)}}"><i
                                                    class="fas fa-edit"></i></a>
                                            @csrf
                                            @method("DELETE")
                                            <input type="hidden" value="{{$sub_category->id}}" name="id">
                                            <button class="btn" type="submit"><i
                                                    style="color:#cd0a0a" class="fas fa-trash"></i></button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>

        $(function () {
            var dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
                @can('stock_category_delete')


            var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            var deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('finance.admin.sub_stock_category.massDestroy') }}",
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
