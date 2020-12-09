<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <title>Generate Payslip</title>
</head>
<body>
@inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate')
{{-- @inject('designationModel', 'Modules\HR\Entities\Designation') --}}
@inject('salaryDeductionModel', 'Modules\Payroll\Entities\SalaryDeduction')

    <?php
        $salaryTemplate = '';
        // dd($user);
        $designation = $user->accountDetail->designation()->first();
        if ($designation) {
            $salaryTemplate = $salaryTemplateModel->where('salary_grade', $designation->designation_name)->first();
            $departmentName = $designation->department()->select('department_name')->first();
        }
    ?>

    <div class="row">
        <img src="{{asset('images/image001.png')}}" alt="">
        <div>One Tec Group LLC</div>
    </div>
    <hr>

    <h2>{{$user->accountDetail->fullname}}</h2>

    <div class="card">
        <h5 class="card-header text-center">Payslip</h5>
        <h5 class="card-header text-center">Salary Month : {{$monthName}} {{$year}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">Employment ID : {{$user->accountDetail->employment_id}}</div>
                <div class="col-md-4">Payslip No : </div>
            </div>
            <div class="row">
                <div class="col-md-4">Mobile : {{$user->accountDetail->mobile}}</div>
                <div class="col-md-4">Email : {{$user->email}}</div>
                <div class="col-md-4">Address : {{$user->accountDetail->address}}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Departments : {{$departmentRequest}}</div>
                <div class="col-md-4">Designation : 
                    {{$designation->designation_name}}</div>
                <div class="col-md-4">Joining Date : {{$user->accountDetail->joining_date}}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>Earnings</h4>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Type of Pay</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Salary Grades :</td>
                    <td>{{$salaryTemplate->salary_grade}}</td>
                  </tr>
                  <tr>
                    <td>Basic Salary :</td>
                    <td>{{'EGP '. number_format($subDeductions['gross_salary'] ?? 0, 2)}}</td>
                  </tr>
                  <tr>
                    <td>Overtime Amount :  </td>
                    <td>{{$salaryTemplate->overtime_salary}}</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="col-md-6">
            <h4>Deductions</h4>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Type of Pay</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $deductions = $salaryDeductionModel::where('salary_template_id', $salaryTemplate->id)->get();
                ?>
                @foreach ($deductions as $item)
                <tr>
                    <td>{{$item->name}} : </td>
                    <td>{{$item->value}} : </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <h4>Total Details</h4>
            <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>Gross Salary :</td>
                    <td>{{'EGP '. number_format($subDeductions['gross_salary'] ?? 0, 2)}}</td>
                  </tr>
                  <tr>
                    <td>Total Deduction : </td>
                    <td>{{'EGP '. number_format(($subDeductions['salary_deduction'] + $deductionDetails['totalDeductions']) ?? 0, 2)}}</td>
                  </tr>
                  <tr>
                    <td>Net Salary : </td>
                    <td>{{'EGP '. number_format($subDeductions['net_salary'] ?? 0, 2)}}</td>
                  </tr>
                  <tr>
                    <td>Paid Amount : </td>
                    <td>{{'EGP '. number_format(($subDeductions['salary_deduction'] + $deductionDetails['totalDeductions'] - $subDeductions['net_salary']) ?? 0, 2)}}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>


{{-- <span class="m-auto">{{'EGP '.number_format($salaryTemplate ? $salaryTemplate->basic_salary : 0, 2)}}</span> --}}



</body>
</html>
