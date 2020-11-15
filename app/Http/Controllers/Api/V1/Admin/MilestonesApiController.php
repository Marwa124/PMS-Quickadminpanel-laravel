<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMilestoneRequest;
use App\Http\Requests\UpdateMilestoneRequest;
use App\Http\Resources\Admin\MilestoneResource;
use App\Models\Milestone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MilestonesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('milestone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MilestoneResource(Milestone::with(['user', 'project'])->get());
    }

    public function store(StoreMilestoneRequest $request)
    {
        $milestone = Milestone::create($request->all());

        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MilestoneResource($milestone->load(['user', 'project']));
    }

    public function update(UpdateMilestoneRequest $request, Milestone $milestone)
    {
        $milestone->update($request->all());

        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $milestone->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
