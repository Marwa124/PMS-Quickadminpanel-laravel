<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockSubCategoryRequest;
use App\Http\Resources\Admin\StockSubCategoryResource;
use App\Models\StockSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockSubCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockSubCategoryResource(StockSubCategory::with(['stock_category'])->get());
    }

    public function store(StoreStockSubCategoryRequest $request)
    {
        $stockSubCategory = StockSubCategory::create($request->all());

        return (new StockSubCategoryResource($stockSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(StockSubCategory $stockSubCategory)
    {
        abort_if(Gate::denies('stock_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
