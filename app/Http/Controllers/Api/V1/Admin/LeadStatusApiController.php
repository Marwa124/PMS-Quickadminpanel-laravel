<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadStatusRequest;
use App\Http\Resources\Admin\LeadStatusResource;
use App\Models\LeadStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadStatusResource(LeadStatus::all());
    }

    public function store(StoreLeadStatusRequest $request)
    {
        $leadStatus = LeadStatus::create($request->all());

        return (new LeadStatusResource($leadStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(LeadStatus $leadStatus)
    {
        abort_if(Gate::denies('lead_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
