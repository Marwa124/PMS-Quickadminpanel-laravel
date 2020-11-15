<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeaveCategoryRequest;
use App\Http\Requests\UpdateLeaveCategoryRequest;
use App\Http\Resources\Admin\LeaveCategoryResource;
use App\Models\LeaveCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeaveCategoryResource(LeaveCategory::all());
    }

    public function store(StoreLeaveCategoryRequest $request)
    {
        $leaveCategory = LeaveCategory::create($request->all());

        return (new LeaveCategoryResource($leaveCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LeaveCategory $leaveCategory)
    {
        abort_if(Gate::denies('leave_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeaveCategoryResource($leaveCategory);
    }

    public function update(UpdateLeaveCategoryRequest $request, LeaveCategory $leaveCategory)
    {
        $leaveCategory->update($request->all());

        return (new LeaveCategoryResource($leaveCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LeaveCategory $leaveCategory)
    {
        abort_if(Gate::denies('leave_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
