<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TechnicalCategoryResource;
use App\Models\TechnicalCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TechnicalCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('technical_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TechnicalCategoryResource(TechnicalCategory::all());
    }

    public function show(TechnicalCategory $technicalCategory)
    {
        abort_if(Gate::denies('technical_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TechnicalCategoryResource($technicalCategory);
    }
}
