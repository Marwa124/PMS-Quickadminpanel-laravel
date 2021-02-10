<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Models\Stock;
use App\Models\StockCategory;
use App\Models\StockSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use App\Models\AssignStock;
use Modules\HR\Entities\Designation;
use Symfony\Component\HttpFoundation\Response;

class AssignStocksController extends Controller
{
    public function index()
    {
//        abort_if(Gate::denies('assign_stocks'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $assign_stocks = AssignStock::all();
        return view('finance::admin.assign_stocks.index', compact('assign_stocks'));
    }


    public function create()
    {
//        abort_if(Gate::denies('assign_stocks_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock_categories = StockCategory::all();
        $designations = Designation::all();


        return view('finance::admin.assign_stocks.create', compact('stock_categories','designations'));
    }

    public function store(Request $request)
    {
        $stock = Stock::findOrFail($request->stock_id);
        $max = Stock::where([
            ['stock_sub_category_id',$stock->stock_sub_category_id],
            ['name',$stock->name],
        ])->sum('total_stock');


        $request->validate([
            'stock_sub_category_id' => 'required|integer|exists:stock_sub_categories,id',
            'stock_id' => 'required|integer|exists:stocks,id',
            'user_id' => 'required|integer|exists:users,id',
            'quantity' => 'required|numeric|max:'.$max,
            'assign_date' => 'required|date',
        ]);


        AssignStock::create([
            'assign_date'             =>$request->assign_date,
            'quantity'                =>$request->quantity,
            'user_id'                 =>$request->user_id,
            'stock_id'                =>$request->stock_id,
            'sub_category_id'         =>$request->stock_sub_category_id,
        ]);

        return redirect()->route('finance.admin.assign_stocks.index');
    }

    public function edit($id)
    {
        abort(Response::HTTP_NOT_FOUND, '404 Not Found');
    }

    public function update(Request $request, $id)
    {
        abort(Response::HTTP_NOT_FOUND, '404 Not Found');

    }

    public function show($id)
    {

    }


    public function destroy($id)
    {
//        abort_if(Gate::denies('assign_stocks_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        AssignStock::findOrFail($id)->delete();

        return back();
    }


    public function massDestroy()
    {
        AssignStock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function get_items(Request $request)
    {
        $items = Stock::where('stock_sub_category_id', $request->id)->get()->unique('name');
        if (count($items) > 0) {
            $loadview = view('finance::admin.assign_stocks.ajaxload', compact('items'))->render();
            return response()->json($loadview, Response::HTTP_CREATED);

        }
        return null;
    }

    public function report()
    {
        //        abort_if(Gate::denies('assign_stocks'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $designations = Designation::all();

        return view('finance::admin.assign_stocks.report', compact('designations'));

    }
    public function report_result(Request $request)
    {
        //        abort_if(Gate::denies('assign_stocks'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'id'  =>'required|integer|exists:users,id'
        ]);
        $assigned_stocks = AssignStock::where('user_id',$request->id)->get();

        $loadview = view('finance::admin.assign_stocks.ajaxload_report_data', compact('assigned_stocks'))->render();
        return response()->json($loadview, Response::HTTP_CREATED);

    }
}
