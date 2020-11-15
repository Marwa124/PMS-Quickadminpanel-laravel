<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOpportunityRequest;
use App\Http\Requests\UpdateOpportunityRequest;
use App\Http\Resources\Admin\OpportunityResource;
use App\Models\Opportunity;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpportunitiesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('opportunity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OpportunityResource(Opportunity::with(['lead', 'permissions'])->get());
    }

    public function store(StoreOpportunityRequest $request)
    {
        $opportunity = Opportunity::create($request->all());
        $opportunity->permissions()->sync($request->input('permissions', []));

        return (new OpportunityResource($opportunity))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OpportunityResource($opportunity->load(['lead', 'permissions']));
    }

    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->all());
        $opportunity->permissions()->sync($request->input('permissions', []));

        return (new OpportunityResource($opportunity))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunity->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
