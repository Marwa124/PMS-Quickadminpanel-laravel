<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenaltyCategoryRequest;
use App\Http\Resources\Admin\PenaltyCategoryResource;
use App\Models\PenaltyCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenaltyCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('penalty_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PenaltyCategoryResource(PenaltyCategory::all());
    }

    public function store(StorePenaltyCategoryRequest $request)
    {
        $penaltyCategory = PenaltyCategory::create($request->all());

        return (new PenaltyCategoryResource($penaltyCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(PenaltyCategory $penaltyCategory)
    {
        abort_if(Gate::denies('penalty_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penaltyCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
