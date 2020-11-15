@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stockSubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stock-sub-categories.update", [$stockSubCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="stock_category_id">{{ trans('cruds.stockSubCategory.fields.stock_category') }}</label>
                <select class="form-control select2 {{ $errors->has('stock_category') ? 'is-invalid' : '' }}" name="stock_category_id" id="stock_category_id" required>
                    @foreach($stock_categories as $id => $stock_category)
                        <option value="{{ $id }}" {{ (old('stock_category_id') ? old('stock_category_id') : $stockSubCategory->stock_category->id ?? '') == $id ? 'selected' : '' }}>{{ $stock_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('stock_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockSubCategory.fields.stock_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.stockSubCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $stockSubCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockSubCategory.fields.name_helper') }}</span>
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