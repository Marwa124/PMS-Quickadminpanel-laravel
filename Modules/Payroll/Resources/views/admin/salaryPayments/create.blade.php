@extends('layouts.admin')
@section('content')

@inject('departmentModel', 'Modules\HR\Entities\Department')
@inject('paymentMethodModel', 'Modules\Payroll\Entities\PaymentMethod')
@inject('salaryPaymentModel', 'Modules\Payroll\Entities\SalaryPayment')


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
            <input type="text" class="form-control" value="{{$subDeductions['gross_salary']}}" disabled>
          </div>
          <div class="form-group">
            <label for="">Total Deduction</label>
            <!-- Deduction Details Models -->
            <button type="button" class="btn btn-xs pt-1 {{($deductionDetails['totalDeductions'] == 0) ? 'btn-info' : 'btn-danger'}} "
                data-toggle="modal" data-target="#deductionDetails{{$user->id}}">
                {{'EGP '. number_format($deductionDetails['totalDeductions'] ?? 0, 2)}}
            </button>
            <!-- Deduction Details Models -->

            <input type="text" class="form-control" value="{{$deductionDetails['totalDeductions']}}">
          </div>
          <div class="form-group">
            <label for="">Net Salary</label>
            <input type="text" class="form-control" value="{{$subDeductions['net_salary']}}" disabled>
          </div>
          <div class="form-group">
            <label for="">Fine Deduction</label>
            <input type="text" class="form-control" value="{{$subDeductions['salary_deduction']}}">
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
      <?php
            $paymentHistory = $salaryPaymentModel::where('payment_month', $date)->get();
        ?>
      <div class="card">
        <h5 class="card-header">Payroll History</h5>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
              
        </div>
      </div>
      {{-- card End --}}
  </div>
</div>

{{-- {{dd($subDeductions)}} --}}
{{-- {{dd($deductionDetails)}} --}}







                                    <!-- Modal -->
                                    <div class="modal fade" id="deductionDetails{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deductionDetails{{$user->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-color: red;">
                                                <h5 class="modal-title" id="deductionDetails{{$user->id}}Title">{{ $user->accountDetail->fullname ?? '' }} Deduction Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-7">Petty Cache</div>
                                                    <div class="col-md-5">{{'EGP '. number_format(0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Fp Days</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($deductionDetails['fpDaysDeduction'] ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Minutes</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($deductionDetails['minutesDeduction'] ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Abssent Days</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($subDeductions['total_absent'] * ($subDeductions['net_salary']/30) ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Deduction Leaves</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($deductionDetails['leavesDeduction'] ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Penalty</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($deductionDetails['penalty'] ?? 0, 2)}}</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between" style="background-color: #ccc;">
                                                {{-- <div class="row"> --}}
                                                    <div class="">Tota</div>
                                                    <div class="">{{'EGP '. number_format($deductionDetails['totalDeductions'] ?? 0, 2)}}</div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- Show Modal Deduction Details if It's the current Month. --}}






@endsection

@section('scripts')
<script>
    $(document).ready(function () {
      
    });
</script>

@endsection