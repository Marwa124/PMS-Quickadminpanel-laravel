@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assign_stocks.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("finance.admin.assign_stocks.store") }}" enctype="multipart/form-data">
            @csrf



            <div class="form-group">
                <label class="required"
                       for="stock_sub_category_id">{{ trans('cruds.stock.fields.stock_sub_category') }}</label>
                <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                        name="stock_sub_category_id" id="stock_sub_category_id"  onchange="get_items()" required>
                    <option value="">{{ trans('cruds.assign_stocks.fields.choose_item') }}</option>

                @foreach($stock_categories as $stock_category)
                        <optgroup label="{{$stock_category->name}}">
                            @foreach($stock_category->sub_categories as $id => $stock_sub_category)
                                <option value="{{ $stock_sub_category->id }}" {{ old('stock_sub_category_id') == $stock_sub_category->id ? 'selected' : '' }} >{{ $stock_sub_category->name }}</option>
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
                       for="stock_id">{{ trans('cruds.assign_stocks.fields.stock_sub_category') }}</label>
                <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                        name="stock_id" id="stock_id" required>
                    <option value="">{{ trans('cruds.assign_stocks.fields.choose_item') }}</option>
                </select>
                @if($errors->has('stock_sub_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_sub_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assign_stocks.fields.stock_sub_category_helper') }}</span>
            </div>





            <div class="form-group">
                <label class="required"
                       for="user_id">{{ trans('cruds.assign_stocks.fields.assigned_user') }}</label>
                <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                        name="user_id" id="user_id"  required>
                    <option value="">{{ trans('cruds.assign_stocks.fields.choose_user') }}</option>

                    @foreach($designations as $designation)
                        <optgroup label="{{$designation->designation_name}}">
                            @foreach($designation->accountDetails as $id => $user)
                                <option value="{{ $user->user_id }}" {{ old('user_id') == $user->user_id ? 'selected' : '' }} >{{ $user->fullname }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @if($errors->has('stock_sub_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_sub_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assign_stocks.fields.user_id_helper') }}</span>
            </div>




            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.assign_stocks.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
            </div>


            <div class="form-group">
                <label class="required" for="assign_date">{{ trans('cruds.assign_stocks.fields.assign_date') }}</label>
                <input class="form-control date {{ $errors->has('assign_date') ? 'is-invalid' : '' }}" type="date" name="assign_date" id="assign_date" value="{{ old('assign_date', '') }}" required>
                @if($errors->has('assign_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assign_date') }}
                    </div>
                @endif
            </div>




            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            get_items();
        });
        function get_items(){
            var url = '/admin/finance/assign_stocks/get_items';
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
                        $("#stock_id").html('');
                        $("#stock_id").append(response);

                    }

                }
            });

        }
    </script>
@endsection
