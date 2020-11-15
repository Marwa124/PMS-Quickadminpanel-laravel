<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockCategoryRequest;
use App\Http\Requests\StoreStockCategoryRequest;
use App\Models\StockCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockCategories = StockCategory::all();

        return view('admin.stockCategories.index', compact('stockCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockCategories.create');
    }

    public function store(StoreStockCategoryRequest $request)
    {
        $stockCategory = StockCategory::create($request->all());

        return redirect()->route('admin.stock-categories.index');
    }

    public function destroy(StockCategory $stockCategory)
    {
        abort_if(Gate::denies('stock_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockCategoryRequest $request)
    {
        StockCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
