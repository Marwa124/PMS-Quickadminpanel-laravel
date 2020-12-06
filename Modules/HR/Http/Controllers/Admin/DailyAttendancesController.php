<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyDailyAttendanceRequest;
use Modules\HR\Http\Requests\Store\StoreDailyAttendanceRequest;
use Modules\HR\Http\Requests\Update\UpdateDailyAttendanceRequest;
use Modules\HR\Entities\DailyAttendance;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\FingerprintAttendance;
use Modules\HR\Entities\Holiday;
use Modules\HR\Entities\SetTime;
use Modules\HR\Entities\LeaveCategory;
use Modules\HR\Entities\WorkingDay;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DailyAttendancesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('daily_attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $date = $request->date;
        if ($request['date'] == '') {
            $date = date('Y-m-d');
        }

            $fingerprintAttendances = [];
            $data_value = FingerprintAttendance::where('date', $date)->get();

            $users = User::where('banned', 0)->select('id')->get();
            foreach ($users as $key => $user) {
                if ($user->accountDetail()->first()) {
                    $result = [];
                    $result['user_account_id'] = $user->accountDetail->id;
                    $result['user_id'] = $user->id;
                    $result['id'] = $user->accountDetail->employment_id;
                    $result['name'] = $user->accountDetail->fullname;
                    $result['clock_out'] = $data_value->where('user_id', $user->id)->max('time') ?? '-';
                    $result['clock_in'] = $data_value->where('user_id', $user->id)->min('time') ?? '-';
                    $result['absent'] = getAbsentUsers($date, $user->id);
                    $result['vacation'] = getVacations($date, $user->id);
                    $result['holiday'] = getHolidays($date);
                    $fingerprintAttendances[] = $result;
                }
            }

            return view('hr::admin.dailyAttendances.index', compact('fingerprintAttendances', 'date'));
    }

    public function timeSet(Request $request) {
        $id=$request->id;

        $setimes= SetTime::all();

        if($setimes->count()>0){
            $setimes= SetTime::find($id);
            $setimes->in_time = $request->in_time;
            $setimes->out_time = $request->out_time;
            $setimes->save();

            return redirect()->back()->with('message', 'Set Update Successful!');
        }else{

            $setimes= new SetTime;
            $setimes->created_by = auth()->user()->id;
            $setimes->in_time = $request->in_time;
            $setimes->out_time = $request->out_time;
            $setimes->save();

            return redirect()->back()->with('message', 'Set Successful!');
        }

    }

    public function create()
    {
        abort_if(Gate::denies('daily_attendance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.dailyAttendances.create', compact('users'));
    }

    // public function store(StoreDailyAttendanceRequest $request)
    public function store(Request $request)
    {
        if ($request['day'] != '') {
            $fingerprintAttendances = FingerprintAttendance::where('date', $request['day'])->get();
            return view('hr::admin.dailyAttendances.index', compact('fingerprintAttendances'));
        }

        // $dailyAttendance = DailyAttendance::create($request->all());

        // return redirect()->route('hr.admin.daily-attendances.index');
    }

    public function edit(DailyAttendance $dailyAttendance)
    {
        abort_if(Gate::denies('daily_attendance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dailyAttendance->load('user');

        return view('hr::admin.dailyAttendances.edit', compact('users', 'dailyAttendance'));
    }

    public function update(UpdateDailyAttendanceRequest $request, DailyAttendance $dailyAttendance)
    {
        $dailyAttendance->update($request->all());

        return redirect()->route('hr.admin.daily-attendances.index');
    }

    public function show(DailyAttendance $dailyAttendance)
    {
        abort_if(Gate::denies('daily_attendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dailyAttendance->load('user');

        return view('hr::admin.dailyAttendances.show', compact('dailyAttendance'));
    }

    public function destroy(DailyAttendance $dailyAttendance)
    {
        abort_if(Gate::denies('daily_attendance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dailyAttendance->delete();

        return back();
    }

    public function massDestroy(MassDestroyDailyAttendanceRequest $request)
    {
        DailyAttendance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
