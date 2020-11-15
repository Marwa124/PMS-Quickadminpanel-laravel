<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockCategoryRequest;
use App\Http\Resources\Admin\StockCategoryResource;
use App\Models\StockCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockCategoryResource(StockCategory::all());
    }

    public function store(StoreStockCategoryRequest $request)
    {
        $stockCategory = StockCategory::create($request->all());

        return (new StockCategoryResource($stockCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(StockCategory $stockCategory)
    {
        abort_if(Gate::denies('stock_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
