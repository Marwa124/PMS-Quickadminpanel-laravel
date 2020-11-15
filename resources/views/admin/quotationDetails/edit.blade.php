@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.quotationDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quotation-details.update", [$quotationDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="quotation_id">{{ trans('cruds.quotationDetail.fields.quotation') }}</label>
                <select class="form-control select2 {{ $errors->has('quotation') ? 'is-invalid' : '' }}" name="quotation_id" id="quotation_id" required>
                    @foreach($quotations as $id => $quotation)
                        <option value="{{ $id }}" {{ (old('quotation_id') ? old('quotation_id') : $quotationDetail->quotation->id ?? '') == $id ? 'selected' : '' }}>{{ $quotation }}</option>
                    @endforeach
                </select>
                @if($errors->has('quotation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quotation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotationDetail.fields.quotation_helper') }}</span>
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