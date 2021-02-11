@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.stock.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route("finance.admin.stocks.getresult") }}">
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="stock_sub_category_id">{{ trans('cruds.stock.fields.stock_sub_category') }}</label>
                    <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                            name="stock_sub_category_id" id="stock_sub_category_id" required>
                        @foreach($stock_categories as $stock_category)
                            <optgroup label="{{$stock_category->name}}">
                                @foreach($stock_category->sub_categories as $id => $stock_sub_category)
                                    <option value="{{ $stock_sub_category->id }}" {{ isset($category) && $category == $stock_sub_category->id ? 'selected' : '' }}>{{ $stock_sub_category->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @if($errors->has('stock_sub_category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('stock_sub_category') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.stock.fields.stock_sub_category_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.go') }}
                    </button>
                </div>
            </form>


        </div>
    </div>

    @if(isset($stocks) && $stocks != null)

        <div class="card">
            <div class="card-body">
                <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-payment_method">
                    <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.stock.fields.name') }}
                        </th>

                        <th>
                            {{ trans('cruds.stock.fields.total_stock') }}
                        </th>

                        <th>
                            {{ trans('cruds.stock.fields.buying_date') }}
                        </th>


                        <th>

                        </th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($stocks as $key => $stock)
                        <tr data-entry-id="{{ $stock->id }}">
                            <td>
                                {{ $stock->name ?? '' }}
                            </td>
                            <td>
                                {{ $stock->total_stock ?? '' }}
                            </td>
                            <td>
                                {{ $stock->buying_date ?? '' }}
                            </td>
                            <td>
                                {{--@can('stock_edit')--}}
                                <a class="btn btn-xs btn-info"
                                   href="{{ route('finance.admin.stocks_history.edit', $stock->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                {{--@endcan--}}

                                {{--@can('stock_delete')--}}
                                <form action="{{ route('finance.admin.stocks_history.destroy', $stock->id) }}"
                                      method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger"
                                           value="{{ trans('global.delete') }}">
                                </form>
                                {{--@endcan--}}
                            </td>


                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    @endif



@endsection
@section('scripts')
    @parent
    <script>
        // $(function () {
        //     let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        {{--@can('stock_delete')--}}
        {{--let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
        {{--let deleteButton = {--}}
        {{--text: deleteButtonTrans,--}}
        {{--url: "{{ route('finance.admin.stocks.massDestroy') }}",--}}
        {{--className: 'btn-danger',--}}
        {{--action: function (e, dt, node, config) {--}}
        {{--var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
        {{--return $(entry).data('entry-id')--}}
        {{--});--}}

        {{--if (ids.length === 0) {--}}
        {{--alert('{{ trans('global.datatables.zero_selected') }}')--}}

        {{--return--}}
        {{--}--}}

        {{--if (confirm('{{ trans('global.areYouSure') }}')) {--}}
        {{--$.ajax({--}}
        {{--headers: {'x-csrf-token': _token},--}}
        {{--method: 'POST',--}}
        {{--url: config.url,--}}
        {{--data: { ids: ids, _method: 'DELETE' }})--}}
        {{--.done(function () { location.reload() })--}}
        {{--}--}}
        {{--}--}}
        {{--}--}}
        {{--dtButtons.push(deleteButton)--}}
        {{--@endcan--}}

        //     $.extend(true, $.fn.dataTable.defaults, {
        //         orderCellsTop: true,
        //         order: [[1, 'asc']],
        //         pageLength: 25
        //     });
        //     let table = $('.datatable-Stock:not(.ajaxTable)').DataTable({buttons: dtButtons});
        //     $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
        //         $($.fn.dataTable.tables(true)).DataTable()
        //             .columns.adjust();
        //     });
        //
        // })

    </script>
@endsection
