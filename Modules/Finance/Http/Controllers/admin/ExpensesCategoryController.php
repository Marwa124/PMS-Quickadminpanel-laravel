<?php

namespace Modules\Finance\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use Modules\Finance\Entities\ExpenseCategory;
use Symfony\Component\HttpFoundation\Response;

class ExpensesCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_category'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $expenses_category = ExpenseCategory::all();
        return view('finance::admin.expenses_category.index',compact('expenses_category'));
    }


    public function create()
    {
        abort_if(Gate::denies('expenses_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('finance::admin.expenses_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);
        ExpenseCategory::create($request->all());

        return redirect()->route('finance.admin.expenses_category.index');
    }

    public function edit( $payment)
    {
        abort_if(Gate::denies('expenses_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payment = ExpenseCategory::findOrFail($payment);
        return view('finance::admin.expenses_category.edit', compact('payment'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'  => 'required'
        ]);
        ExpenseCategory::findOrFail($id)->update($request->all());

        return redirect()->route('finance.admin.expenses_category.index');
    }

    public function show($id)
    {

    }



    public function destroy($id)
    {
        abort_if(Gate::denies('expenses_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        ExpenseCategory::findOrFail($id)->delete();

        return back();
    }


    public function massDestroy()
    {
        ExpenseCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
