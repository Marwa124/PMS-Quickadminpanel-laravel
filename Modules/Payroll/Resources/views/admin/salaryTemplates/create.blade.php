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

<form method="POST" action="{{ route("payroll.admin.salary-templates.store") }}" enctype="multipart/form-data">
    @csrf

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salaryTemplate.title_singular') }}
    </div>

    <div class="card-body">

            <div class="form-group">
                <label class="required" for="salary_grade">Designation Name</label>
                <select class="form-control" name="designation_id" id="">
                    <option value="" disabled selected>Please Select</option>
                    @foreach ($designationModel::pluck('designation_name', 'id') as $key => $item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="required" for="salary_grade">{{ trans('cruds.salaryTemplate.fields.salary_grade') }}</label>
                <input class="form-control {{ $errors->has('salary_grade') ? 'is-invalid' : '' }}" type="text" name="salary_grade" id="salary_grade" value="{{ old('salary_grade', '') }}" required>
                @if($errors->has('salary_grade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_grade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.salary_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="basic_salary">{{ trans('cruds.salaryTemplate.fields.basic_salary') }}</label>
                <input class="form-control {{ $errors->has('basic_salary') ? 'is-invalid' : '' }}" type="number" min="0" name="basic_salary" id="basic_salary" value="{{ old('basic_salary', '0') }}" required>
                @if($errors->has('basic_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('basic_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.basic_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="overtime_salary">{{ trans('cruds.salaryTemplate.fields.overtime_salary') }}</label>
                <input class="form-control {{ $errors->has('overtime_salary') ? 'is-invalid' : '' }}" type="integer" min="0" name="overtime_salary" id="overtime_salary" value="{{ old('overtime_salary', '') }}" required>
                @if($errors->has('overtime_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overtime_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryTemplate.fields.overtime_salary_helper') }}</span>
            </div>

    </div>
</div>





<div class="row">
    <div class="col-md-6">

        <div class="card">
            <h5 class="card-header">Allowances</h5>
            <div class="card-body allowancesGroup">
                <div class="form-group">
                    <label>{{ trans('cruds.salaryTemplate.fields.house_allowance') }}</label>
                    <input class="form-control {{ $errors->has('allowance') ? 'is-invalid' : '' }}" type="number" min="0" name="allowance[house_allowance]" id="house_allowance" value="{{ old('allowance[house_allowance]', '0') }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.salaryTemplate.fields.medical_allowance') }}</label>
                    <input class="form-control {{ $errors->has('allowance') ? 'is-invalid' : '' }}" type="number" min="0" name="allowance[medical_allowance]" id="medical_allowance" value="{{ old('allowance[medical_allowance]', '0') }}">
                </div>
                <a href="javascript:void(0)" class="moreAllowances"><i class="fas fa-plus"></i>Add More</a>
            </div>
          </div>


    </div> <!--End Col 6-->
    <div class="col-md-6">

        <div class="card">
            <h5 class="card-header">Deductions</h5>
            <div class="card-body deductionsGroup">
                <div class="form-group">
                    <label>{{ trans('cruds.salaryTemplate.fields.provided_fund') }}</label>
                    <input class="form-control {{ $errors->has('deduction') ? 'is-invalid' : '' }}" type="number" min="0" name="deduction[provided_fund]" id="provided_fund" value="{{ old('deduction[provided_fund]', '0') }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.salaryTemplate.fields.tax_deduction') }}</label>
                    <input class="form-control {{ $errors->has('deduction') ? 'is-invalid' : '' }}" type="number" min="0" name="deduction[tax_deduction]" id="tax_deduction" value="{{ old('deduction[tax_deduction]', '0') }}">
                </div>
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
</form>

</div>
@endsection

@section('scripts')
    <script src="{{asset('js/salaryScale.js')}}"></script>
@endsection
