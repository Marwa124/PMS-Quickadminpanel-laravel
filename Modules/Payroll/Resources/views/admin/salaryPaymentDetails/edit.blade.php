@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryPaymentDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-payment-details.update", [$salaryPaymentDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="salary_payment_id">{{ trans('cruds.salaryPaymentDetail.fields.salary_payment') }}</label>
                <select class="form-control select2 {{ $errors->has('salary_payment') ? 'is-invalid' : '' }}" name="salary_payment_id" id="salary_payment_id" required>
                    @foreach($salary_payments as $id => $salary_payment)
                        <option value="{{ $id }}" {{ (old('salary_payment_id') ? old('salary_payment_id') : $salaryPaymentDetail->salary_payment->id ?? '') == $id ? 'selected' : '' }}>{{ $salary_payment }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPaymentDetail.fields.salary_payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.salaryPaymentDetail.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $salaryPaymentDetail->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPaymentDetail.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.salaryPaymentDetail.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $salaryPaymentDetail->value) }}" required>
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPaymentDetail.fields.value_helper') }}</span>
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