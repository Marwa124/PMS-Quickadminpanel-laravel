<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyAttendancesRequest;
use Modules\HR\Http\Requests\Store\StoreAttendancesRequest;
use Modules\HR\Http\Requests\Update\UpdateAttendancesRequest;
use Modules\HR\Entities\Attendance;
use Modules\HR\Entities\LeaveApplication;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\FingerprintAttendance;
use Symfony\Component\HttpFoundation\Response;

class AttendancesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attendances_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $attendances = FingerprintAttendance::get()->groupBy('date');
        $attendances = FingerprintAttendance::orderBy('date', 'desc')->get()->groupBy(['date', 'user_id']);
        // dd($attendances);

        return view('hr::admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        abort_if(Gate::denies('attendances_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = AccountDetail::all()->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.attendances.create', compact('users'));
    }

    public function store(StoreAttendancesRequest $request)
    {
        if ($request->date_in) {
            $attendances = FingerprintAttendance::create($request->except('date_out', 'date_in'));
            $attendances->update(['time' => $request->date_in]);
        }
        if ($request->date_out) {
            $attendances = FingerprintAttendance::create($request->except('date_out', 'date_in'));
            $attendances->update(['time' => $request->date_out]);
        }

        return redirect()->route('hr.admin.attendances.index');
    }

    public function edit(FingerprintAttendance $attendances)
    {
        abort_if(Gate::denies('attendances_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = AccountDetail::all()->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');

        $attendances->load('user', 'leave_application');

        return view('hr::admin.attendances.edit', compact('users', 'attendances'));
    }

    public function update(UpdateAttendancesRequest $request, FingerprintAttendance $attendances)
    {
        if ($request->time) {
            $attendances->update($request->time);
        }

        return redirect()->route('hr.admin.attendances.index');
    }

    // public function show(Attendance $attendances)
    // {
    //     abort_if(Gate::denies('attendances_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $attendances->load('user', 'leave_application');

    //     return view('hr::admin.attendances.show', compact('attendances'));
    // }

    public function destroy(FingerprintAttendance $attendances)
    {
        abort_if(Gate::denies('attendances_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendances->delete();

        return back();
    }

    public function massDestroy(MassDestroyAttendancesRequest $request)
    {
        Attendance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
