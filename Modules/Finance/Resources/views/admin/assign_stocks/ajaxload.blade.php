<option value="">{{ trans('cruds.assign_stocks.fields.choose_item') }}</option>
@foreach($items as $item)
            <option value="{{ $item->id }}" {{ old('stock_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
@endforeach
