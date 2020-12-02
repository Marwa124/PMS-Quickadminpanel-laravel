@extends('layouts.admin')
@section('content')

@inject('departmentModel', 'Modules\HR\Entities\Department')
@inject('paymentMethodModel', 'Modules\Payroll\Entities\PaymentMethod')


@can('salary_payment_show')
<!-- Search -->

<div class="card">
    <h5 class="card-header">Make Payment</h5>
    <form action="{{ route('payroll.admin.salary-payments.index') }}" method="get">
        {{-- @csrf --}}
        <div class="card-body">
            <div class="">
                <div class="form-group d-flex justify-content-center">
                    <label for="department_id" class="required mr-2">Select Department</label>
                    <?php
                    if ($departmentRequest != '') {
                        $selected_department = $departmentModel::where('id', $departmentRequest)->first()->departmant_name;
                    }
                    $departments = $departmentModel->where('department_name', '!=', 'CEO')->where('department_name', '!=', 'Board Members')->pluck('department_name', 'id');
                    ?>
                    <select class="form-control select2 w-50" name="department_id" id="department_id" required>
                        {{-- trans('cruds.monthlyAttendance.fields.select_user') --}}
                        <option selected disabled >{{ $departmentRequest ? $selected_department :  'Select Department'}}</option>
                        @foreach($departments as $key => $department)
                            <option value="{{ $key }}" {{ ($departmentRequest ?? '') == $key ? 'selected' : '' }}>{{ $department }}</option>
                        @endforeach
                    </select>


                </div>
            </div>
            <div class="form-group margin d-flex justify-content-center">
                <div class="nav-link mr-2"><i class="fa fa-calendar"></i></div>
                <input class="form-control w-50" type="text" name="date" id="datepicker" value="{{ $date }}" required>
              </span>
          </div>

            <input type="submit" class="btn btn-primary d-flex justify-content-center m-auto d-block w-25" value="{{ __('Go') }}"/>
        </div>
    </form>
</div>

<!-- /.End Search -->
@endcan



<div class="row">
  <div class="col-md-3">
      <div class="card">
       
        <h5 class="card-header" style="border-color: red;">Payment For <span class="text-danger"> {{$monthName}} {{$year}} </span></h5>
        <div class="card-body">
          <div class="form-group">
            <label for="">Gross Salary</label>
            <input type="text" class="form-control" value="11" disabled>
          </div>
          <div class="form-group">
            <label for="">Total Deduction</label>
            <input type="text" class="form-control" value="11" disabled>
          </div>
          <div class="form-group">
            <label for="">Net Salary</label>
            <input type="text" class="form-control" value="11" disabled>
          </div>
          <div class="form-group">
            <label for="">Fine Deduction</label>
            <input type="text" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="">Payment Amount</label> Ajax(net - total deductions)
            <input type="text" class="form-control" name="payment_amount" value="" disabled>
          </div>
          <div class="form-group">
            <label for="">Payment Method</label>
            <select class="form-control" name="payment_type">
                @foreach ($paymentMethodModel::pluck('name', 'id') as $key => $method)
                    <option value="{{$key}}" {{($method == 'Cache') ? 'selected' : ''}}>{{$method}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Comments</label>
            <input type="text" class="form-control" name="comments" value="">
          </div>

          <a href="#" class="btn btn-primary">Update</a>
        </div>
      </div>
      {{-- card End --}}
  </div>
  <div class="col-md-9">
      <div class="card">
        <h5 class="card-header">Payroll History</h5>
        <div class="card-body">
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
      {{-- card End --}}
  </div>
</div>



<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salaryPayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("payroll.admin.salary-payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.salaryPayment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_amount">{{ trans('cruds.salaryPayment.fields.payment_amount') }}</label>
                <input class="form-control {{ $errors->has('payment_amount') ? 'is-invalid' : '' }}" type="text" name="payment_amount" id="payment_amount" value="{{ old('payment_amount', '') }}" required>
                @if($errors->has('payment_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.payment_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fine_deductio">{{ trans('cruds.salaryPayment.fields.fine_deductio') }}</label>
                <input class="form-control {{ $errors->has('fine_deductio') ? 'is-invalid' : '' }}" type="text" name="fine_deductio" id="fine_deductio" value="{{ old('fine_deductio', '') }}" required>
                @if($errors->has('fine_deductio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine_deductio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.fine_deductio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_type">{{ trans('cruds.salaryPayment.fields.payment_type') }}</label>
                <input class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', '') }}" required>
                @if($errors->has('payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.salaryPayment.fields.comments') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{!! old('comments') !!}</textarea>
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paid_date">{{ trans('cruds.salaryPayment.fields.paid_date') }}</label>
                <input class="form-control date {{ $errors->has('paid_date') ? 'is-invalid' : '' }}" type="text" name="paid_date" id="paid_date" value="{{ old('paid_date') }}" required>
                @if($errors->has('paid_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.paid_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deduct_from">{{ trans('cruds.salaryPayment.fields.deduct_from') }}</label>
                <input class="form-control {{ $errors->has('deduct_from') ? 'is-invalid' : '' }}" type="text" name="deduct_from" id="deduct_from" value="{{ old('deduct_from', '') }}" required>
                @if($errors->has('deduct_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deduct_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryPayment.fields.deduct_from_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
      
    });
</script>

@endsection