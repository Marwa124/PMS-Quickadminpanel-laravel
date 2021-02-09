<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Entities\SalaryPayment;
use App\Models\User;
use PDF;
use Gate;
use Modules\HR\Entities\AccountDetail;
use Modules\Payroll\Entities\SalaryDeduction;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentsController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('salary_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(request()->has('date')) {
            request()->validate([
                'date' => 'required|date_format:Y-m',
                'department_id' => 'required|exists:departments,id|integer',
            ]);
        }

        $date = request()->date;
        if (request()['date'] == '') {
            $date = date('Y-m');
        }
        $departmentRequest = request()->department_id ?? '';

        $users = [];
        if ($departmentRequest && $date) {
            $salaryPayments = AccountDetail::select('user_id', 'designation_id')->orderBy('user_id', 'DESC')->get();

            foreach ($salaryPayments as $key => $value) {
                $userInDepartment = $value->designation()->first() ? $value->designation->department()->where('id', $departmentRequest)->first() : '';
                $activeUser = User::where('id', $value->user_id)->where('banned', 0)->first();
                if ($activeUser && !$activeUser->hasRole('Board Members') && $userInDepartment) {
                    $users[] = User::where('id', $value->user_id)->where('banned', 0)->first()->accountDetail()->first();
                }
            }
        }
        return view('payroll::admin.salaryPayments.index', compact('users', 'date', 'departmentRequest'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $result = [];
        foreach (request()->all() as $key => $value) {
            $result[] = $key;
        }
        $date = $result[0];
        $departmentRequest = $result[1];

        $monthNum = explode('-', $date);
        $monthName = date('F', mktime(0, 0, 0, $monthNum[1], 10));
        $year      = $monthNum[0];

        // $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $user = User::findOrFail($result[2]);

        /* !!!: Deduction Details */
        $carbonDate = dateFormation($date);
        $basic_salary = $user->accountDetail->designation->salaryTemplate()->first();
        $salaryDeduction = SalaryDeduction::where('salary_template_id', $basic_salary->id)->sum('value');
        $netSalary = (int) ($basic_salary->basic_salary) - (int) $salaryDeduction;
        $dailySalary = $netSalary/30;
        $totalAbsentDays   = $user->absences()->whereBetween('date', [$carbonDate['previousDate'], $carbonDate['currentDate']])->select('date')->distinct('date')->count();
        $absent_value = round($totalAbsentDays * $dailySalary);

        $deductionDetails = deductionDetails($date, $user->id, $dailySalary, $absent_value);

        $subDeductions = [
            'gross_salary'     => $basic_salary->basic_salary,
            'total_absent'     => $totalAbsentDays,
            'salary_deduction' => $salaryDeduction,
            'net_salary'       => $netSalary
        ];
        /* !!!: Deduction Details */

        return view('payroll::admin.salaryPayments.create',
            compact('user', 'subDeductions', 'deductionDetails', 'date', 'departmentRequest', 'monthName', 'year'));
    }

    public function store()
    {
        $totalLeaveDays = SalaryPayment::where('user_id', request()->id)->where('payment_month', request()->payment_month)->select('id')->first();
        if(!$totalLeaveDays){
            SalaryPayment::create(request()->all());
        }

        // return redirect()->route('payroll.admin.salary-payments.index');
    }

    public function payslipGenerate()
    {
        $salaryPayment = $this->createPayslip();

        $pdf = PDF::loadView('payroll::admin.salaryPayments.payslip_generate', $salaryPayment);

        return $pdf->download('Payslip Details '.$salaryPayment['user']->accountDetail->fullname.'.pdf');
    }

    public function createPayslip()
    {
        $result = [];
        foreach (request()->all() as $key => $value) {
            $result[] = $key;
        }
        $result['date'] = $result[0];
        $result['departmentRequest'] = $result[1];

        $monthNum = explode('-', $result['date']);
        $result['monthName'] = date('F', mktime(0, 0, 0, $monthNum[1], 10));
        $result['year'] = $monthNum[0];

        $result['user'] = $user = User::find($result[2]);

        /* !!!: Deduction Details */
        $carbonDate = dateFormation($result['date']);
        $basic_salary = $user->accountDetail->designation->salaryTemplate()->first();
        $salaryDeduction = SalaryDeduction::where('salary_template_id', $basic_salary->id)->sum('value');
        $netSalary = (int) ($basic_salary->basic_salary) - (int) $salaryDeduction;
        $dailySalary = $netSalary/30;
        $totalAbsentDays   = $user->absences()->whereBetween('date', [$carbonDate['previousDate'], $carbonDate['currentDate']])->select('date')->distinct('date')->count();
        $absent_value = round($totalAbsentDays * $dailySalary);

        $result['deductionDetails'] = deductionDetails($result['date'], $user->id, $dailySalary, $absent_value);

        $result['subDeductions'] = [
            'gross_salary'     => $basic_salary->basic_salary,
            'total_absent'     => $totalAbsentDays,
            'salary_deduction' => $salaryDeduction,
            'net_salary'       => $netSalary
        ];
        /* !!!: Deduction Details */

        return $result;
    }

    // public function show(SalaryPayment $salaryPayment)
    // {
    //     abort_if(Gate::denies('salary_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $salaryPayment->load('user');

    //     return view('payroll::admin.salaryPayments.show', compact('salaryPayment'));
    // }

    // public function destroy(SalaryPayment $salaryPayment)
    // {
    //     abort_if(Gate::denies('salary_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $salaryPayment->delete();

    //     return back();
    // }
}
