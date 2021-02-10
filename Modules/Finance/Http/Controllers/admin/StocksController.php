<?php

namespace Modules\Finance\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Stock;
use App\Models\StockSubCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StocksController extends Controller
{
    public function index()
    {

//        abort_if(Gate::denies('stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quant = null;

        $stocks = Stock::all()->groupBy('name');

        foreach($stocks as $key => $stock){
            dd($stock->sum('total_stock'),$key,$stock);





        }

        dd($quant);

        return view('finance::admin.stocks.index', compact('stocks'));
    }

    public function create()
    {
//        abort_if(Gate::denies('stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock_sub_categories = StockSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('finance::admin.stocks.create', compact('stock_sub_categories'));
    }

    public function store(StoreStockRequest $request)
    {
        $stock_category = StockSubCategory::findOrFail($request->stock_sub_category_id);

        $data = [
            'stock_sub_category_id' => $request->stock_sub_category_id,
            'total_stock' => $request->total_stock,
            'buying_date' => $request->buying_date,
            'name' => $request->name,
            'stock_category_id' => $stock_category->stock_category->id,
        ];
        $stock = Stock::create($data);

        return redirect()->route('finance.admin.stocks.index');
    }

    public function edit(Stock $stock)
    {
//        abort_if(Gate::denies('stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock_sub_categories = StockSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stock->load('stock_sub_category');

        return view('finance::admin.stocks.edit', compact('stock_sub_categories', 'stock'));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->all());

        return redirect()->route('finance.admin.stocks.index');
    }

    public function destroy(Stock $stock)
    {
//        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
