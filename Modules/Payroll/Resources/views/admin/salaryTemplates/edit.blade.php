@extends('layouts.admin')
@inject('designationModel', 'Modules\HR\Entities\Designation')

@section('styles')
<style>
    .card-header:first-child {
        border-color: tomato;
        border-width: medium;
    }
</style>
@endsection
@section('content')

<div class="section mb-5 pb-5">

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryTemplate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-templates.update", [$salaryTemplate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

        <div class="form-group">
            <label class="required" for="salary_grade">Designation Name</label>
            <select name="designation_id" class="form-control" id="">
                @foreach ($designationModel::pluck('designation_name', 'id') as $key => $item)
                    <option value="{{$key}}" {{($salaryTemplate->designation_id == $key) ? 'selected' : ''}}>{{$item}}</option>
                @endforeach
            </select>
        </div>
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
                <input class="form-control {{ $errors->has('basic_salary') ? 'is-invalid' : '' }}" type="number" min="0" name="basic_salary" id="basic_salary" value="{{ old('basic_salary', $salaryTemplate->basic_salary) }}" required>
                @if($errors->has('basic_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('basic_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.basic_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="overtime_salary">{{ trans('cruds.salaryTemplate.fields.overtime_salary') }}</label>
                <input class="form-control {{ $errors->has('overtime_salary') ? 'is-invalid' : '' }}" type="integer" min="0" name="overtime_salary" id="overtime_salary" value="{{ old('overtime_salary', $salaryTemplate->overtime_salary) }}" required>
                @if($errors->has('overtime_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overtime_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.overtime_salary_helper') }}</span>
            </div>
        </form>
    </div>
</div>

<?php
    $allowances = $salaryTemplate->salaryAllowances()->get();
    $deductions = $salaryTemplate->salaryDeductions()->get();
?>

<div class="row">
    <div class="col-md-6">

        <div class="card">
            <h5 class="card-header">Allowances</h5>
            <div class="card-body allowancesGroup">
                @foreach ($allowances as $allowance)
                <div class="form-group">
                    <input class="form-control allowanceLabel" type="text" name="allowanceLabel[]" value="{{ old('allowanceLabel[]', $allowance->name) }}">
                    <input class="form-control allowanceValue" type="number" min="0" name="allowance[{{$allowance->name}}]" value="{{$allowance->value}}">
                </div>
                @endforeach


                <a href="javascript:void(0)" class="moreAllowances"><i class="fas fa-plus"></i>Add More</a>
            </div>
          </div>


    </div> <!--End Col 6-->
    <div class="col-md-6">

        <div class="card">
            <h5 class="card-header">Deductions</h5>
            <div class="card-body deductionsGroup">
                @foreach ($deductions as $deduction)
                <div class="form-group">
                    <input class="form-control deductionLabel" type="text" name="deductionLabel[]" value="{{ old('deductionLabel[]', $deduction->name) }}">
                    <input class="form-control deductionValue" type="number" min="0" name="deduction[{{$deduction->name}}]" value="{{ $deduction->value}}">
                </div>
                @endforeach


                <a href="javascript:void(0)" class="moreDeductions"><i class="fas fa-plus"></i>Add More</a>
            </div>
          </div>

    </div> <!--End Col 6-->
</div> <!--End Row-->

<div class="row d-flex" style="justify-content:flex-end;">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header">Total Salary Details</h5>
            <div class="card-body">
                <div class="form-group d-flex" style="justify-content: space-between;">
                    <label>Gross Salary :</label>
                    <input class="form-control w-50" type="text" name="gross_salary" id="gross_salary" value="0" disabled>
                </div>
                <div class="form-group d-flex" style="justify-content: space-between;">
                    <label>Total Deduction :</label>
                    <input class="form-control w-50" type="text" name="total_deduction" id="total_deduction" value="0" disabled>
                </div>
                <div class="form-group d-flex" style="justify-content: space-between;">
                    <label>Net Salary :</label>
                    <input class="form-control w-50" type="text" name="net_salary" id="net_salary" value="0" disabled>
                </div>
            </div>
          </div>
    </div>
    <div class="clear-fix"></div>
</div> <!--End Row of Col 9-->

<div class="form-group">
    <button class="btn btn-danger float-right" type="submit">
        {{ trans('global.save') }}
    </button>
</div>

</div>
@endsection

@section('scripts')
    <script src="{{asset('js/salaryScale.js')}}"></script>
@endsection
