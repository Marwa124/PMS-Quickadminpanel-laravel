@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryTemplate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-templates.update", [$salaryTemplate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="salary_grade">{{ trans('cruds.salaryTemplate.fields.salary_grade') }}</label>
                <input class="form-control {{ $errors->has('salary_grade') ? 'is-invalid' : '' }}" type="text" name="salary_grade" id="salary_grade" value="{{ old('salary_grade', $salaryTemplate->salary_grade) }}" required>
                @if($errors->has('salary_grade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_grade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.salary_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="basic_salary">{{ trans('cruds.salaryTemplate.fields.basic_salary') }}</label>
                <input class="form-control {{ $errors->has('basic_salary') ? 'is-invalid' : '' }}" type="text" name="basic_salary" id="basic_salary" value="{{ old('basic_salary', $salaryTemplate->basic_salary) }}" required>
                @if($errors->has('basic_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('basic_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.basic_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="overtime_salary">{{ trans('cruds.salaryTemplate.fields.overtime_salary') }}</label>
                <input class="form-control {{ $errors->has('overtime_salary') ? 'is-invalid' : '' }}" type="text" name="overtime_salary" id="overtime_salary" value="{{ old('overtime_salary', $salaryTemplate->overtime_salary) }}" required>
                @if($errors->has('overtime_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overtime_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.overtime_salary_helper') }}</span>
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