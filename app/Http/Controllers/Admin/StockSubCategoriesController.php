<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockSubCategoryRequest;
use App\Http\Requests\StoreStockSubCategoryRequest;
use App\Models\StockCategory;
use App\Models\StockSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockSubCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockSubCategories = StockSubCategory::all();

        return view('admin.stockSubCategories.index', compact('stockSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock_categories = StockCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stockSubCategories.create', compact('stock_categories'));
    }

    public function store(StoreStockSubCategoryRequest $request)
    {
        $stockSubCategory = StockSubCategory::create($request->all());

        return redirect()->route('admin.stock-sub-categories.index');
    }

    public function destroy(StockSubCategory $stockSubCategory)
    {
        abort_if(Gate::denies('stock_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockSubCategoryRequest $request)
    {
        StockSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
