@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salaryPaymentDeduction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-payment-deductions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="salary_payment_id">{{ trans('cruds.salaryPaymentDeduction.fields.salary_payment') }}</label>
                <select class="form-control select2 {{ $errors->has('salary_payment') ? 'is-invalid' : '' }}" name="salary_payment_id" id="salary_payment_id" required>
                    @foreach($salary_payments as $id => $salary_payment)
                        <option value="{{ $id }}" {{ old('salary_payment_id') == $id ? 'selected' : '' }}>{{ $salary_payment }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPaymentDeduction.fields.salary_payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.salaryPaymentDeduction.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPaymentDeduction.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.salaryPaymentDeduction.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', '') }}" required>
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPaymentDeduction.fields.value_helper') }}</span>
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