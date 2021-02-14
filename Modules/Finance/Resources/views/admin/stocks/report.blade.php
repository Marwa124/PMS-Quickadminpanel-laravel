@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.stock.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">

            <form method="POST" action="#">
                <div class="form-group">
                    <label class="required">{{ trans('cruds.stock.fields.search_by') }}</label>
                    <select id="search_by"
                            class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                            required onchange="change_inputs()">
                        <option value=""> {{ trans('cruds.stock.fields.select_search_type') }}</option>
                        <option value="period">{{ trans('cruds.stock.fields.by_period') }}</option>
                        <option value="category">{{ trans('cruds.stock.fields.by_category') }}</option>

                    </select>
                </div>

                <div id="period" style="display: none">
                    <div class="form-group">
                        <label class="required"
                               for="start_date">{{ trans('cruds.stock.fields.start_date') }}</label>
                        <input  id="start_date" type="date" name="start_date"
                               class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label class="required"
                               for="end_date">{{ trans('cruds.stock.fields.end_date') }}</label>
                        <input   id="end_date" type="date" name="end_date"
                               class="form-control  {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                               required onchange="get_data()">
                    </div>
                </div>


                <div id="category" style="display: none">
                    <div class="form-group">
                        <label class="required"
                               for="stock_sub_category_id">{{ trans('cruds.stock.fields.stock_sub_category') }}</label>
                        <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                                name="stock_sub_category_id" id="stock_sub_category_id" onchange="get_items_data()"
                                required>
                            <option val="">{{ trans('cruds.stock.fields.choose_category') }}</option>

                            @foreach($stock_categories as $stock_category)
                                <optgroup label="{{$stock_category->name}}">
                                    @foreach($stock_category->sub_categories as $id => $stock_sub_category)
                                        <option value="{{ $stock_sub_category->id }}" {{ old('stock_sub_category_id') == $stock_sub_category->id ? 'selected' : '' }}>{{ $stock_sub_category->name }}</option>
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
                        <label class="required"
                               for="item_name">{{ trans('cruds.stock.fields.item_name') }}</label>
                        <div id="items_data">
                            <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                                    name="item_name" id="item_name" required>
                                <option val="">{{ trans('cruds.stock.fields.select_item') }}</option>
                            </select>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
    <div id="result_div">

    </div>

@endsection
@section('scripts')
    <script>

        $(document).ready(function () {
            $('#start_date').on('change', dates());
            $('#end_date').on('change', dates());


        });


        function dates() {
            start = $('#start_date').val();
            end = $('#end_date').val();
            $('#start_date').attr('min', $('#end_date').val());
            $('#end_date').attr('max', $('#start_date').val());

        }


        function change_inputs() {
            type = $('#search_by').val();
            if (type === 'period') {
                $('#period').show(100);
                $('#category').hide(50);
            }
            else if (type === 'category') {
                $('#category').show(100);
                $('#period').hide(50);
            }
            else {
                $('#category').hide(50);
                $('#period').hide(50);
            }
        }


        function get_data() {
            var url = '/admin/finance/stocks/report/getresult';
            item_id = $('#item_id').val();
            start = $('#start_date').val();
            end = $('#end_date').val();
            // Ajax Reuqest
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    item_id: item_id,
                    start: start,
                    end: end
                },

                success: function (response) {
                     $('#item_id').val('');
                    if (response) {
                        $("#result_div").html('');
                        $("#result_div").append(response);

                    }

                }
            });

        }


        function get_items_data() {
            var url = '/admin/finance/stocks/report/get_items';
            id = $('#stock_sub_category_id').val();
            // Ajax Reuqest
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    id: id
                },

                success: function (response) {

                    if (response) {
                        $("#items_data").html('');
                        $("#items_data").append(response);

                    }

                }
            });

        }
    </script>
@endsection
