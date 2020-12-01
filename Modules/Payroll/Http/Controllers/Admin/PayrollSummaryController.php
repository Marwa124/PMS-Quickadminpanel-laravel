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
        deduction('2020-10');
        
        if ($date) {
            $userAccountDetails = AccountDetail::select('user_id', 'designation_id')->orderBy('user_id', 'DESC')->get();

            // $carbonDate = dateFormation('2020-09');
            $carbonDate = dateFormation($date);
            $holidays = getHolidaysWithInMonth($date);
            foreach ($userAccountDetails as $key => $value) {
                late_leave_deduction(4, '2020-10');
                
                
                $userVal = [];
                $userDesignation = $value->designation()->first();
                if ($userDesignation) {
                    $activeUser = User::where('id', $value->user_id)->where('banned', 0)->first();
                    
                    if ($activeUser && !$activeUser->hasRole('Board Members')) {

                        $userVal['userVacations'] = getVacationsWithInMonth($date, $value->user_id);
                        $userVal['totalAttendedDays'] = $activeUser->fingerPrintAttendances()->whereBetween('date', [$carbonDate['previousDate'], $carbonDate['currentDate']])->select('date')->distinct('date')->count();
                        $userVal['totalAbsentDays']   = $activeUser->absences()->whereBetween('date', [$carbonDate['previousDate'], $carbonDate['currentDate']])->select('date')->distinct('date')->count();
                        $userVal['detail'] = User::where('id', $value->user_id)->where('banned', 0)->first()->accountDetail()->first();
                        // dump($userVal['detail']);
                        $users[] = $userVal;
                    }
                }
            }
            // dump($users);

            // dd();
        }
        // dd($users);

        return view('payroll::admin.payrollSummary.index', compact('date', 'users', 'holidays'));   
    }
}