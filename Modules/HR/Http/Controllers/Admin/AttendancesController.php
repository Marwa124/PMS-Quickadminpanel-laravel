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
use Symfony\Component\HttpFoundation\Response;

class AttendancesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attendances_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendances = Attendance::all();

        return view('hr::admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        abort_if(Gate::denies('attendances_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leave_applications = LeaveApplication::all()->pluck('leave_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.attendances.create', compact('users', 'leave_applications'));
    }

    public function store(StoreAttendancesRequest $request)
    {
        $attendances = attendances::create($request->all());

        return redirect()->route('admin.attendances.index');
    }

    public function edit(attendances $attendances)
    {
        abort_if(Gate::denies('attendances_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leave_applications = LeaveApplication::all()->pluck('leave_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $attendances->load('user', 'leave_application');

        return view('admin.attendances.edit', compact('users', 'leave_applications', 'attendances'));
    }

    public function update(UpdateAttendancesRequest $request, attendances $attendances)
    {
        $attendances->update($request->all());

        return redirect()->route('admin.attendances.index');
    }

    public function show(attendances $attendances)
    {
        abort_if(Gate::denies('attendances_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendances->load('user', 'leave_application');

        return view('admin.attendances.show', compact('attendances'));
    }

    public function destroy(attendances $attendances)
    {
        abort_if(Gate::denies('attendances_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendances->delete();

        return back();
    }

    public function massDestroy(MassDestroyAttendancesRequest $request)
    {
        attendances::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
