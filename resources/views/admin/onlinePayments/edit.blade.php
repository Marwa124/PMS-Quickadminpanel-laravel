@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.onlinePayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.online-payments.update", [$onlinePayment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="gateway_name">{{ trans('cruds.onlinePayment.fields.gateway_name') }}</label>
                <input class="form-control {{ $errors->has('gateway_name') ? 'is-invalid' : '' }}" type="text" name="gateway_name" id="gateway_name" value="{{ old('gateway_name', $onlinePayment->gateway_name) }}" required>
                @if($errors->has('gateway_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gateway_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.onlinePayment.fields.gateway_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="icon">{{ trans('cruds.onlinePayment.fields.icon') }}</label>
                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" type="text" name="icon" id="icon" value="{{ old('icon', $onlinePayment->icon) }}" required>
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.onlinePayment.fields.icon_helper') }}</span>
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