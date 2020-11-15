<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadCategoryRequest;
use App\Http\Requests\UpdateLeadCategoryRequest;
use App\Http\Resources\Admin\LeadCategoryResource;
use App\Models\LeadCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadCategoryResource(LeadCategory::all());
    }

    public function store(StoreLeadCategoryRequest $request)
    {
        $leadCategory = LeadCategory::create($request->all());

        return (new LeadCategoryResource($leadCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LeadCategory $leadCategory)
    {
        abort_if(Gate::denies('lead_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadCategoryResource($leadCategory);
    }

    public function update(UpdateLeadCategoryRequest $request, LeadCategory $leadCategory)
    {
        $leadCategory->update($request->all());

        return (new LeadCategoryResource($leadCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LeadCategory $leadCategory)
    {
        abort_if(Gate::denies('lead_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
