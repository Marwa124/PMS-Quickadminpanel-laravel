<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Store\StoreAttendancesRequest;
use Modules\HR\Http\Requests\Update\UpdateAttendancesRequest;
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

    public function update($id)
    {
        $rowData = explode('_', $id);
        FingerprintAttendance::where('date', $rowData[0])
                            ->where('user_id', $rowData[1])
                            ->where('time', request('oldTimeValue'))->update([
                                'time' => request('inputVal')
                            ]);
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('attendances_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rowData = explode('_', $id);
        FingerprintAttendance::where('date', $rowData[0])
                            ->where('user_id', $rowData[1])->delete();

        return back();
    }

    public function massDestroy()
    {
        FingerprintAttendance::whereIn('date', request('ids'))
                    ->whereIn('user_id', request('users'))->delete();

        return response()->json([
            'ids'   => request('ids'),
            'users' => request('users')
            ]);
    }
}
