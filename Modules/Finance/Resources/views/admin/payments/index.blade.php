@extends('layouts.admin')
@section('content')
    @can('payment_method_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('finance.admin.payment_method.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.finance.payment_method') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.payment_method.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-payment_method">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th>
                        {{ trans('cruds.finance.payment_method') }}
                    </th>
                    <th>

                    </th>

                </tr>

                </thead>
                <tbody>

                @foreach($payment_methods as $key => $method)
                    <tr data-entry-id="{{ $method->id }}">
                        <td></td>


                        <td>
                            {{ $method->name ?? '' }}
                        </td>
                        <td>
                            <form class="text-center" id="delete_form"
                                  action="{{route('finance.admin.payment_method.destroy',$method)}}" method="post">
                                <a href="{{route('finance.admin.payment_method.edit',$method->id)}}"><i
                                            class="fas fa-edit"></i></a>
                                @csrf
                                @method("DELETE")
                                <button class="btn" type="submit" onsubmit="return confirm('dd');"><i
                                            style="color:#cd0a0a" class="fas fa-trash" onclick="clicked()"></i></button>
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
        function clicked() {
            if (confirm('Do you want to delete this?')) {
                $('#delete_form').submit();
            } else {
                return false;
            }
        }

        $(function () {
            var dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
                    @can('payment_method_delete')


            var deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            var deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('finance.admin.payment_method.massDestroy') }}",
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