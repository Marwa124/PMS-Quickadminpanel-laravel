<select class="form-control select2 {{ $errors->has('item') ? 'is-invalid' : '' }}"
        name="item_id" id="item_id" onchange="get_data()" required>
    <option val="">{{ trans('cruds.stock.fields.select_item') }}</option>
@foreach($items as $item)
            <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
    @endforeach
</select>