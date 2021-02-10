@extends('layouts.admin')
@section('content')
    {{--@can('stock_create')--}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('finance.admin.stocks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stock.title_singular') }}
            </a>
        </div>
    </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.stock.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">

            <div class="row">
                @foreach($main_stocks_categories as $main_stocks_category)
                    @php $cat = App\Models\StockCategory::findorfail($main_stocks_category->first()->stock_category_id); @endphp
                    <div class="col-sm-6">
                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample_{{$cat->id}}" aria-expanded="false"
                                    aria-controls="collapseExample_{{$cat->id}}">
                                {{$cat->name}}
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample_{{$cat->id}}">
                            <div class="card card-body">
                                @foreach($main_stocks_category->unique('stock_sub_category_id') as $sub_stock)
                                    @php $sub_cat = App\Models\StockSubCategory::findorfail($sub_stock->stock_sub_category_id); @endphp
                                    <span>{{$sub_cat->name}}</span>

                                    @php $stocks = $main_stocks_category->where('stock_sub_category_id',$sub_cat->id); @endphp

                                    <div class="table-responsive">
                                        {{--<table class=" table table-bordered table-striped table-hover datatable datatable-Stock">--}}
                                        <table class=" table table-bordered table-striped table-hover ">
                                            <thead>
                                            <tr>
                                                <th width="10">

                                                </th>
                                                <th>
                                                    {{ trans('cruds.stock.fields.id') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.stock.fields.name') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.stock.fields.total_stock') }}
                                                </th>
                                                <th>
                                                    &nbsp;
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($stocks as $stock)
                                                <tr data-entry-id="{{ $stock->name }}">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{ $loop->index +1  ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $stock->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $stock->TotalStock ?? '' }}
                                                    </td>
                                                    <td>

                                                        {{--@can('stock_edit')--}}
                                                        <a class="btn btn-xs btn-info"
                                                           href="{{ route('finance.admin.stocks.edit', [$stock->name,$stock->stock_sub_category_id]) }}">
                                                            {{ trans('global.edit') }}
                                                        </a>
                                                        {{--@endcan--}}

                                                        {{--@can('stock_delete')--}}
                                                        <form action="{{ route('finance.admin.stocks.destroy', [$stock->name,$stock->stock_sub_category_id]) }}"
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

                                @endforeach


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>



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
