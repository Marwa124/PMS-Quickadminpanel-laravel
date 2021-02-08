<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Models\StockSubCategory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use App\Models\StockCategory;
use Symfony\Component\HttpFoundation\Response;

class StockCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_category'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $stock_category = StockCategory::all();
        return view('finance::admin.stock_category.index',compact('stock_category'));
    }


    public function create()
    {
        abort_if(Gate::denies('stock_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = StockCategory::all();
        return view('finance::admin.stock_category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_sub_category'  => 'required',
        ]);
        if($request->sub_category){
            $parent = StockCategory::findOrFail($request->sub_category);

            StockSubCategory::create([
                'name'                  => $request->name_sub_category,
                'stock_category_id'     => $parent->id
            ]);
        }else{
            $parent = StockCategory::create([
                'name'                  => $request->name
            ]);
            StockSubCategory::create([
                'name'                  => $request->name_sub_category,
                'stock_category_id'     => $parent->id
            ]);
        }

        return redirect()->route('finance.admin.stock_category.index');
    }

    public function edit( $payment)
    {
        abort_if(Gate::denies('stock_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payment = StockCategory::findOrFail($payment);
        return view('finance::admin.stock_category.edit', compact('payment'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'name'  => 'required'
        ]);
        StockCategory::findOrFail($request->id)->update($request->all());

        return redirect()->route('finance.admin.stock_category.index');
    }

    public function show($id)
    {
        $stock = StockCategory::findOrFail($id);
        return  response()->json($stock);
    }



    public function destroy($id)
    {
        abort_if(Gate::denies('stock_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        StockCategory::findOrFail($id)->delete();

        return back();
    }


    public function subCategoryDestroy(Request $request)
    {
        abort_if(Gate::denies('stock_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        StockSubCategory::where('id',$request->id)->delete();

        return back();

    }


    public function massDestroy()
    {
        StockSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
