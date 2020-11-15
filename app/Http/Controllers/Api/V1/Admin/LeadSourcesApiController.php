<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadSourceRequest;
use App\Http\Resources\Admin\LeadSourceResource;
use App\Models\LeadSource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadSourcesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadSourceResource(LeadSource::all());
    }

    public function store(StoreLeadSourceRequest $request)
    {
        $leadSource = LeadSource::create($request->all());

        return (new LeadSourceResource($leadSource))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(LeadSource $leadSource)
    {
        abort_if(Gate::denies('lead_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadSource->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
