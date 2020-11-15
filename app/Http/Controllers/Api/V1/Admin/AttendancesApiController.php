<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendancesRequest;
use App\Http\Requests\UpdateAttendancesRequest;
use App\Http\Resources\Admin\attendancesResource;
use App\Models\attendances;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class attendancesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attendances_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new attendancesResource(attendances::with(['user', 'leave_application'])->get());
    }

    public function store(StoreAttendancesRequest $request)
    {
        $attendances = attendances::create($request->all());

        return (new attendancesResource($attendances))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(attendances $attendances)
    {
        abort_if(Gate::denies('attendances_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new attendancesResource($attendances->load(['user', 'leave_application']));
    }

    public function update(UpdateAttendancesRequest $request, attendances $attendances)
    {
        $attendances->update($request->all());

        return (new attendancesResource($attendances))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(attendances $attendances)
    {
        abort_if(Gate::denies('attendances_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendances->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
