@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.stock.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.stocks.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="stock_sub_category_id">{{ trans('cruds.stock.fields.stock_sub_category') }}</label>
                    <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                            name="stock_sub_category_id" id="stock_sub_category_id" required>
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
                    <label class="required" for="name">{{ trans('cruds.stock.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.stock.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="buying_date">{{ trans('cruds.stock.fields.buying_date') }}</label>
                    <input class="form-control date {{ $errors->has('buying_date') ? 'is-invalid' : '' }}" type="date"
                           name="buying_date" id="buying_date" value="{{ old('buying_date', '') }}" required>
                    @if($errors->has('buying_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('buying_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.stock.fields.buying_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="total_stock">{{ trans('cruds.stock.fields.total_stock') }}</label>
                    <input class="form-control {{ $errors->has('total_stock') ? 'is-invalid' : '' }}" type="number"
                           name="total_stock" id="total_stock" value="{{ old('total_stock', '') }}" step="1">
                    @if($errors->has('total_stock'))
                        <div class="invalid-feedback">
                            {{ $errors->first('total_stock') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.stock.fields.total_stock_helper') }}</span>
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
