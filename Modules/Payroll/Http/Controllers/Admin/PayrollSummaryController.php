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
use Modules\HR\Entities\LeaveCategory;
use Modules\Payroll\Entities\AdvanceSalary;
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
        // $date = date('2020-09');

        if ($date) { // inMonth
            if  ($date < date('Y-m')) {
            //     /* !!!: alert *///////////////////////////////////
            //     // Fetch Data From payroll summary Table
            //     /* !!!: alert *///////////////////////////////////
                $users = PayrollSummary::where('month', $date)->get();

// dd($users);
            }else{///////////////////// Return Back Again //////////

                /* !!!: alert *///////////////////////////////////////////////////
                deduction($date);
                PayrollSummary::where('month', $date)->delete();
                /* !!!: alert *///////////////////////////////////////////////////
                // dd();
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
                        // deductionDetails($date, $value->user_id, $dailySalary, $absent_value);
                        $deductionDetails = deductionDetails($date, $value->user_id, $dailySalary, $absent_value);

                        $userVal['totalDeductions']  = $deductionDetails['totalDeductions'];
                        $userVal['lateMinutes']      = $deductionDetails['lateMinutes'];
                        $userVal['extraMinutes']     = $deductionDetails['extraMinutes'];
                        $userVal['minutesDeduction'] = $deductionDetails['minutesDeduction'];
                        $userVal['fpDaysDeduction']  = $deductionDetails['fpDaysDeduction'];
                        $userVal['leavesDeduction']  = $deductionDetails['leavesDeduction'];
                        $userVal['penalty']          = $deductionDetails['penalty'];


                        // dump($deductionDetails['fpDaysDeduction']);
                        // dump($deductionDetails['minutesDeduction']);
                        // !!!: Check User Advanced Salary (Bonus)
                        $check_user_advanced_salary =  AdvanceSalary::where('month', $date)->where('user_id', $value->user_id)->first();
                        if ($check_user_advanced_salary) {
                            ($check_user_advanced_salary->type == 'Bonus') ?
                                $check_user_advanced_salary->amount : 0;
                        }
                        $userVal['bonus'] = deductionDetails($date, $value->user_id, $dailySalary, $absent_value)['extraMinutes'];


                        // dump($userVal);

                        PayrollSummary::create([
                            'username'      => $userVal['detail']->fullname ?? '',
                            'job_title'     => $userVal['salaryTemplate']->salary_grade ?? '',
                            'gross_salary'  => $userVal['salaryTemplate']->basic_salary ?? '0',
                            'net_salary'    => $userVal['netSalary'] ?? '0',
                            'daily_salary'  => round($dailySalary) ?? '0',
                            'total_days'    => $userVal['totalAttendedDays'] ?? '0',
                            'total_absence' => $userVal['totalAbsentDays'] ?? '0',
                            'holidays'      => $holidays ?? '0',
                            'vacations'     => $userVal['userVacations'] ?? '0',
                            'deductions'    => $userVal['totalDeductions'] ?? '0',
                            'leave_days'    => $userVal['leavesDeduction'] ?? '0',
                            'late_minutes'  => $userVal['lateMinutes'] ?? '0',
                            'extra_minutes' => $userVal['extraMinutes'] ?? '0',
                            'bonus'         => $userVal['bonus'] ?? '0',
                            'net_paid'      => $userVal['netSalary'] + $userVal['bonus'] - $userVal['totalDeductions'] ?? '0',
                            'month'         => $date ?? '',
                            'user_id'       => $value->user_id ?? '',
                        ]);


                        // dump($userVal['detail']);
                        $users[] = $userVal;

                    }






                }
            }
            } ///////////////////// Return Back Again //////////
            // dump($users);

            // dd();

        }



        // dd($categoryDetails);

        return view('payroll::admin.payrollSummary.index', compact('date', 'users', 'holidays'));
    }
}
