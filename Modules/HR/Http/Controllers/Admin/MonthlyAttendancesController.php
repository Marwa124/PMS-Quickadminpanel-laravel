<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\HR\Entities\MonthlyAttendance;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Modules\HR\Entities\FingerprintAttendance;
use Symfony\Component\HttpFoundation\Response;

class MonthlyAttendancesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('monthly_attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $date = $request->date;
        if ($request['date'] == '') {
            $date = date('Y-m');
        }
        $userRequest = $request->user_id ?? '';

        $monthlyAttendances = [];
        if ($request->user_id != '') {
            foreach (getDateRange($date) as $key => $value) {
                $result = [];
                $data_value = FingerprintAttendance::where('date', $value)->where('user_id', $request->user_id)->get();
                $result['fingerDate'] = $value;
                // $result['dateName'] = trans('global.' . date('l', strtotime($value)));
                $result['dateName'] = (Lang::getLocale() == 'en') ? date('l', strtotime($value)) : getArabicDayName($value);
                $result['clock_in'] = $data_value->min('time');
                $result['clock_out'] = $data_value->max('time');
                $result['absent'] = getAbsentUsers($value, $request->user_id);
                $result['vacation'] = getVacations($value, $request->user_id);
                $result['holiday'] = getHolidays($value);
                $result['leave_request'] = getHolidays($value) ? 0 : getUserLeaves($value, $request->user_id);
                $result['weekEnd'] = weekEnds($value);
                
                $monthlyAttendances[] = $result;
            }
        }

        $users = User::where('banned', 0)->select('id')->get();
        $userAccounts = [];
        foreach ($users as $key => $user) {
            $userAccounts[] = $user->accountDetail;
        }
        return view('hr::admin.monthlyAttendances.index', compact('monthlyAttendances', 'date', 'userAccounts', 'userRequest'));
    }

    public function show(MonthlyAttendance $monthlyAttendance)
    {
        abort_if(Gate::denies('monthly_attendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monthlyAttendance->load('user');

        return view('hr::admin.monthlyAttendances.show', compact('monthlyAttendance'));
    }
}
