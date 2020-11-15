<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDailyAttendanceRequest;
use App\Http\Requests\UpdateDailyAttendanceRequest;
use App\Http\Resources\Admin\DailyAttendanceResource;
use App\Models\DailyAttendance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DailyAttendancesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('daily_attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DailyAttendanceResource(DailyAttendance::with(['user'])->get());
    }

    public function store(StoreDailyAttendanceRequest $request)
    {
        $dailyAttendance = DailyAttendance::create($request->all());

        return (new DailyAttendanceResource($dailyAttendance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DailyAttendance $dailyAttendance)
    {
        abort_if(Gate::denies('daily_attendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DailyAttendanceResource($dailyAttendance->load(['user']));
    }

    public function update(UpdateDailyAttendanceRequest $request, DailyAttendance $dailyAttendance)
    {
        $dailyAttendance->update($request->all());

        return (new DailyAttendanceResource($dailyAttendance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DailyAttendance $dailyAttendance)
    {
        abort_if(Gate::denies('daily_attendance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dailyAttendance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
