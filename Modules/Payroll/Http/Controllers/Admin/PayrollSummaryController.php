<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\FingerprintAttendance;
use Modules\Payroll\Entities\PayrollSummary;
use Modules\Payroll\Entities\SalaryDeduction;
use Modules\Payroll\Entities\SalaryTemplate;

class PayrollSummaryController extends Controller
{
    public $users = [];
    public $totalAttendedDays = [];
    public $totalAbsentDays = [];


    public function __invoke()
    {
        abort_if(Gate::denies('payroll_summary'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $date = request()->date;
        if (request()['date'] == '') {
            $date = date('Y-m');
        }
        // late_leave_deduction(4, '2020-10');
        // deduction('2020-09');
        // $date = date('2020-08');

        if ($date) { // inMonth
            // if  ($date < date('Y-m')) {
            //     /* !!!: alert *///////////////////////////////////
            //     // Fetch Data From payroll summary Table
            //     /* !!!: alert *///////////////////////////////////


            // }else{///////////////////// Return Back Again //////////

                /* !!!: alert *///////////////////////////////////////////////////
                deduction($date);
                PayrollSummary::where('month', $date)->delete();
                /* !!!: alert *///////////////////////////////////////////////////
                dd();
            $userAccountDetails = AccountDetail::select('user_id', 'designation_id')->orderBy('user_id', 'DESC')->get();

            // $carbonDate = dateFormation('2020-09');
            $carbonDate = dateFormation($date);
            $holidays = getHolidaysWithInMonth($date);
            foreach ($userAccountDetails as $key => $value) {
                // late_leave_deduction(4, '2020-10');


                $userVal = [];
                $userDesignation = $value->designation()->first();
                if ($userDesignation) {
                    $activeUser = User::where('id', $value->user_id)->where('banned', 0)->first();

                    if ($activeUser && !$activeUser->hasRole('Board Members', 'Supper Admin')) {
                        $userVal['userVacations'] = getVacationsWithInMonth($date, $value->user_id);
                        $userVal['totalAttendedDays'] = $activeUser->fingerPrintAttendances()->whereBetween('date', [$carbonDate['previousDate'], $carbonDate['currentDate']])->select('date')->distinct('date')->count();
                        $userVal['totalAbsentDays']   = $activeUser->absences()->whereBetween('date', [$carbonDate['previousDate'], $carbonDate['currentDate']])->select('date')->distinct('date')->count();
                        $userVal['detail'] = User::where('id', $value->user_id)->where('banned', 0)->first()->accountDetail()->first();


                        $userVal['salaryTemplate'] = '';
                        $designation = $userVal['detail']->designation()->first();
                        if ($designation) {
                            // $salaryTemplate = $userVal['detail']->designation->salaryTemplate()->get();
                            // $departmentName = $userVal['detail']->designation->department()->select('department_name')->first();
                            $userVal['salaryTemplate'] = SalaryTemplate::where('salary_grade', $designation->designation_name)->first();
                            // $departmentName = $userVal['detail']->designation->department()->select('department_name')->first();
                        }

                        $userVal['netSalary'] = 0;
                        if ($userVal['salaryTemplate']) {
                            $salaryDeduction = SalaryDeduction::where('salary_template_id', $userVal['salaryTemplate']->id)->sum('value');
                            $userVal['netSalary'] = (int) ($userVal['salaryTemplate']->basic_salary) - (int) $salaryDeduction;
                        }


                        $dailySalary = $userVal['netSalary']/30;
                        $absent_value = round($userVal['totalAbsentDays'] * $dailySalary);
                        // calcLateExtraMinutes($date, $value->user_id, $dailySalary, $absent_value);

                        $userVal['totalDeductions'] = calcLateExtraMinutes($date, $value->user_id, $dailySalary, $absent_value)['totalDeductions'];
                        $userVal['lateMinutes'] = calcLateExtraMinutes($date, $value->user_id, $dailySalary, $absent_value)['lateMinutes'];
                        $userVal['extraMinutes'] = calcLateExtraMinutes($date, $value->user_id, $dailySalary, $absent_value)['extraMinutes'];












                        // dump($userVal['detail']);
                        $users[] = $userVal;

                    }






                }
            }
            // } ///////////////////// Return Back Again //////////
            // dump($users);

            // dd();
        }
        // dd($users);

        return view('payroll::admin.payrollSummary.index', compact('date', 'users', 'holidays'));
    }
}
