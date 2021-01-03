
@if($ajaxrequest == "getmodule")
    <select class="form-control  {{ $errors->has('module_id') ? 'is-invalid' : '' }}"
        name="module_id" id="module_id">
        @foreach($data as $id => $item)
        <option value="{{ $id }}" {{ old('module_id') == $id ? 'selected' : '' }}>{{ $item }}</option>
         @endforeach
    </select>
    @if($errors->has('module_id'))
    <div class="invalid-feedback">
        {{ $errors->first('module_id') }}
    </div>
    @endif
@endif



