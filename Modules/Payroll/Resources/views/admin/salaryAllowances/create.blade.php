@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salaryAllowance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-allowances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.salaryAllowance.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryAllowance.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.salaryAllowance.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', '') }}" required>
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryAllowance.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_template_id">{{ trans('cruds.salaryAllowance.fields.salary_template') }}</label>
                <select class="form-control select2 {{ $errors->has('salary_template') ? 'is-invalid' : '' }}" name="salary_template_id" id="salary_template_id" required>
                    @foreach($salary_templates as $id => $salary_template)
                        <option value="{{ $id }}" {{ old('salary_template_id') == $id ? 'selected' : '' }}>{{ $salary_template }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryAllowance.fields.salary_template_helper') }}</span>
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
