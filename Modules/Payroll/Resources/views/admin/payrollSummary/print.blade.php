<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <title>Salary Details {{$detail->fullname}}</title>
</head>
<body>
@inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate')

    <?php
        $salaryTemplate = '';
        $designation = $detail->designation()->first();
        if ($designation) {
            $salaryTemplate = $salaryTemplateModel->where('salary_grade', $designation->designation_name)->first();
            $departmentName = $detail->designation->department()->select('department_name')->first();
        }
    ?>

    <div class="row">
        <img src="{{asset('images/image001.png')}}" alt="">
        <div>One Tec Group LLC</div>
    </div>
    <hr>
    {{-- <h1>Welcome to ItSolutionStuff.com - {{ $title }}</h1> --}}
	<div class="modal fade" id="showModal{{$detail->user_id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="showModalLabel">{{ trans('cruds.salaryPaymentDetail.title_singular') }}</h5>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-5 d-flex justify-content-center align-self-center">
                    @if($detail->avatar )
                        {{-- <a href="{{ str_replace('storage', 'public/storage', $detail->avatar->getUrl()) }}" target="_blank">
                            <img class="rounded-circle img-thumbnail d-flex m-auto"
                            src="{{ str_replace('storage', 'public/storage', $detail->avatar->getUrl('thumb')) }}">
                        </a> --}}
                        <a href="{{ str_replace('storage', 'storage/app/public', $detail->avatar->getUrl()) }}" target="_blank">
                            <img class="rounded-circle img-thumbnail d-flex m-auto"
                            src="{{ str_replace('storage', 'storage/app/public', $detail->avatar->getUrl('thumb')) }}">
                        </a>
                    @else
                        <a href="javascript:void(0)" style="display: inline-block">
                            <img class="rounded-circle img-thumbnail d-flex m-auto" src="{{ asset('images/default.png') }}">
                        </a>
                    @endif
                </div>
                <div class="col-md-7">
                    <h4 class="font-weight-bold">{{$detail->fullname}}</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">EMP ID: </div>
                        <div class="col-md-7">{{ $detail->employment_id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Departments: </div>
                        <div class="col-md-7"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Designation: </div>
                        <div class="col-md-7">{{ $salaryTemplate ? $salaryTemplate->salary_grade : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Joining Date: </div>
                        <div class="col-md-7">{{ $detail->joining_date }}</div>
                    </div>
                </div>
            </div><!--Row End-->
            <div class="modal-header" style="border-color: tomato; background-color: #ccc;">
                <h5 class="modal-title">Salary Detail</h5>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold m-auto">Salary Grades</div>
                <div class="m-auto">{{ $salaryTemplate ? $salaryTemplate->salary_grade : '' }}</div>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold m-auto">{{ trans('cruds.salaryPaymentDetail.fields.basic_salary') }}</div>
                <span class="m-auto">{{'EGP '.number_format($salaryTemplate ? $salaryTemplate->basic_salary : 0, 2)}}</span>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold m-auto">{{ trans('cruds.salaryPaymentDetail.fields.overtime') }}</div>
                <span class="m-auto"></span>
            </div>
            </div>
        </div>
        </div>
    </div>

</body>
</html>
