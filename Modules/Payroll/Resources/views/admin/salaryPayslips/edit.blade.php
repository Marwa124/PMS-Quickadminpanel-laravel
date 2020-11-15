@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryPayslip.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-payslips.update", [$salaryPayslip->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="payslip_number">{{ trans('cruds.salaryPayslip.fields.payslip_number') }}</label>
                <input class="form-control {{ $errors->has('payslip_number') ? 'is-invalid' : '' }}" type="text" name="payslip_number" id="payslip_number" value="{{ old('payslip_number', $salaryPayslip->payslip_number) }}">
                @if($errors->has('payslip_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payslip_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayslip.fields.payslip_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_payment_id">{{ trans('cruds.salaryPayslip.fields.salary_payment') }}</label>
                <select class="form-control select2 {{ $errors->has('salary_payment') ? 'is-invalid' : '' }}" name="salary_payment_id" id="salary_payment_id" required>
                    @foreach($salary_payments as $id => $salary_payment)
                        <option value="{{ $id }}" {{ (old('salary_payment_id') ? old('salary_payment_id') : $salaryPayslip->salary_payment->id ?? '') == $id ? 'selected' : '' }}>{{ $salary_payment }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayslip.fields.salary_payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payslip_generate_date">{{ trans('cruds.salaryPayslip.fields.payslip_generate_date') }}</label>
                <input class="form-control date {{ $errors->has('payslip_generate_date') ? 'is-invalid' : '' }}" type="text" name="payslip_generate_date" id="payslip_generate_date" value="{{ old('payslip_generate_date', $salaryPayslip->payslip_generate_date) }}" required>
                @if($errors->has('payslip_generate_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payslip_generate_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayslip.fields.payslip_generate_date_helper') }}</span>
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