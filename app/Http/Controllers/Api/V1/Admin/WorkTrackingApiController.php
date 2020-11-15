<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkTrackingRequest;
use App\Http\Requests\UpdateWorkTrackingRequest;
use App\Http\Resources\Admin\WorkTrackingResource;
use App\Models\WorkTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkTrackingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WorkTrackingResource(WorkTracking::with(['work_type', 'permissions', 'account'])->get());
    }

    public function store(StoreWorkTrackingRequest $request)
    {
        $workTracking = WorkTracking::create($request->all());
        $workTracking->permissions()->sync($request->input('permissions', []));

        return (new WorkTrackingResource($workTracking))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WorkTrackingResource($workTracking->load(['work_type', 'permissions', 'account']));
    }

    public function update(UpdateWorkTrackingRequest $request, WorkTracking $workTracking)
    {
        $workTracking->update($request->all());
        $workTracking->permissions()->sync($request->input('permissions', []));

        return (new WorkTrackingResource($workTracking))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workTracking->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
