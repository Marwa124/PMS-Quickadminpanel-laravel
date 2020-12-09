@extends('layouts.admin')
@section('content')

@inject('departmentModel', 'Modules\HR\Entities\Department')
@inject('paymentMethodModel', 'Modules\Payroll\Entities\PaymentMethod')
@inject('salaryPaymentModel', 'Modules\Payroll\Entities\SalaryPayment')
@inject('payrollSummaryModel', 'Modules\Payroll\Entities\PayrollSummary')


@can('salary_payment_show')
<!-- Search -->
<div class="card">
    <h5 class="card-header">Make Payment</h5>
    <form action="{{ route('payroll.admin.salary-payments.index') }}" method="get">
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
        {{-- <form action="{{ route('payroll.admin.salary-payments.store') }}" method="post">
            @csrf --}}
        <div class="card-body">
            <div class="form-group">
                <label for="">Gross Salary</label>
                <input type="text" class="form-control gross-salary" value="{{$subDeductions['gross_salary']}}" disabled>
            </div>
            <div class="form-group">
                <label for="">Total Deduction</label>
                <input type="text" class="form-control tax-deduction" value="{{$subDeductions['salary_deduction']}}" disabled>
            </div>
            <div class="form-group">
                <label for="">Net Salary</label>
                <input type="text" class="form-control" value="{{$subDeductions['net_salary']}}" disabled>
            </div>
            <div class="form-group">
                <label for="">Fine Deduction</label>
                <!-- Deduction Details Models -->
                <button type="button" data-userSalaryId="{{$user->id}}" class="btn btn-xs pt-1 {{($deductionDetails['totalDeductions'] == 0) ? 'btn-info' : 'btn-danger'}} "
                    data-toggle="modal" data-target="#deductionDetails{{$user->id}}">
                    {{'EGP '. number_format($deductionDetails['totalDeductions'] ?? 0, 2)}}
                </button>
                <!-- Deduction Details Models -->
                <input type="text" class="form-control fine-deduction" value="{{$deductionDetails['totalDeductions']}}">
            </div>
            <div class="form-group">
                <label for="">Payment Amount</label>
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

            <input type="text" name="payment_month" value="{{$date}}" hidden>
            <input type="text" name="paid_date" value="{{date('Y-m-d H:s:i')}}" hidden>
            <input type="submit" class="btn btn-primary store_salary_payment" value='Update'/>
        </div>
        {{-- </form> --}}
      </div>
      {{-- card End --}}
  </div>
  <div class="col-md-9">
      <?php
            $salaryPayment = $salaryPaymentModel::where('user_id', $user->id)->get();
      ?>
      <div class="card">
        <h5 class="card-header">Payroll History</h5>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Gross Salary</th>
                    <th scope="col">Total Deduction</th>
                    <th scope="col">Leaves</th>
                    <th scope="col">Net Salary</th>
                    <th scope="col">Fine Deduction</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($salaryPayment as $item)
                  <?php
                    $monthNum = explode('-', $item->payment_month);
                    $monthName = date('F', mktime(0, 0, 0, $monthNum[1], 10));
                    $totalLeaveDays = $payrollSummaryModel::where('user_id', $user->id)->where('month', $item->payment_month)->select('leave_days')->first();
                  ?>
                  {{-- {{dd($item->payment_month)}}
                  {{dd($payrollSummaryModel::where('user_id', $user->id)->where('month', $item->payment_month)->first())}} --}}

                    <tr data-user-id="{{$user->id}}" data-month="{{$item->payment_month}}" data-user-name="{{$user->accountDetail->fullname}}">
                      <td>{{$monthName.'-'.$monthNum[0]}}</td>
                      <td>{{$subDeductions['gross_salary']}}</td>
                      <td>{{$subDeductions['salary_deduction']}}</td>
                      <td>
                        <!-- Leave Details modal -->
                        <button type="button" class="btn btn-primary btn-xs leaveDetails" data-toggle="modal" data-target="#leavesDetails{{$item->payment_month ?? ''}}">
                          {{$totalLeaveDays ? $totalLeaveDays->leave_days : 0}}
                        </button>
                        <div class="leaveDetailsModal"></div>

                      </td>
                      <th>{{$subDeductions['net_salary']}}</th>
                      <td>{{$item->fine_deduction}}</td>
                      <td>{{(int) $subDeductions['net_salary'] - (int) $item->fine_deduction}}</td>
                    </tr>
                  @empty
                      <tr><td>No Data Found</td></tr>
                  @endforelse
                </tbody>
              </table>

        </div>
      </div>
      {{-- card End --}}
  </div>
</div>







                                    <!-- Modal -->
                                    <div class="modal fade" id="deductionDetails{{$item->payment_month}}" tabindex="-1" role="dialog" aria-labelledby="deductionDetails{{$user->id}}Title" aria-hidden="true">
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

      var gross_salary   = $('.gross-salary').val();
      var tax_deduction  = $('.tax-deduction').val();
      var fine_deduction = $('.fine-deduction').val();
      let payment_amount = gross_salary - tax_deduction - fine_deduction;

      $('input[name="payment_amount"').val(payment_amount);

      $('.fine-deduction').on('keyup', function() {
        payment_amount = gross_salary - tax_deduction - $(this).val();
        $('input[name="payment_amount"').val(payment_amount);
      });


    //   Store Salary Payment
    $('.store_salary_payment').click(function(){
        $.ajax({
            url: '{{route("payroll.admin.salary-payments.store")}}',
            type:'post',
            dataType: 'html',
            data: {
                _token:         '{{csrf_token()}}',
                user_id:        $(this).closest('.card-body').find('button').attr('data-userSalaryId'),
                payment_month:  $('input[name="payment_month"]').val(),
                paid_date:      $('input[name="paid_date"]').val(),
                fine_deduction: fine_deduction,
                payment_method_id:   $('select[name="payment_type"]').val(),
                comments:       $('input[name="comments"]').val(),
            },
            success: function(res){
                $('.store_salary_payment').attr('disabled', true);
                console.log(res);
            },
            error: function(err){
                console.log(err);
            }
        });
    });
    // End  Store Salary Payment




      $('.leaveDetailsModal').html(``);

      //Leave User Details Redirect Btn to modal blade
      $('.leaveDetails').click(function(){
          let userId     = $(this).closest("tr").attr("data-user-id");
          let userName   = $(this).closest("tr").attr("data-user-name");
          let date       = $(this).closest("tr").attr("data-month");

          var e = $(this);
          $.ajax({
              url: '{{route("hr.admin.leave-applications.details")}}',
              type:'get',
              dataType: 'html',
              data: {
                  user_id:   userId,
                  user_name: userName,
                  date:      date,
              },
              success: function(res){
                  e.closest('td').find('.leaveDetailsModal').html(res);

                  $('#leavesDetails'+userId).modal('toggle');
              }
          })
      });
    // End Leave User Details Redirect Btn to modal blade

    });
</script>

@endsection
