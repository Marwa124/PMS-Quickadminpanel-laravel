<?php

namespace Modules\Finance\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use App\Models\DepositCategory;
use Symfony\Component\HttpFoundation\Response;

class DepositsCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deposits_category'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $deposits_category = DepositCategory::all();
        return view('finance::admin.deposits_category.index', compact('deposits_category'));
    }


    public function create()
    {
        abort_if(Gate::denies('deposits_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('finance::admin.deposits_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required',
                'string',
                'max:15',
                'regex:/^[a-zA-Z]*([a-zA-Z][a-zA-Z])[a-zA-Z]*$/'
            ]
        ]);
        DepositCategory::create($request->all());

        return redirect()->route('finance.admin.deposits_category.index');
    }

    public function edit($payment)
    {
        abort_if(Gate::denies('deposits_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payment = DepositCategory::findOrFail($payment);
        return view('finance::admin.deposits_category.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required',
                'string',
                'max:15',
                'regex:/^[a-zA-Z]*([a-zA-Z][a-zA-Z])[a-zA-Z]*$/'
            ]
        ]);
        DepositCategory::findOrFail($id)->update($request->all());

        return redirect()->route('finance.admin.deposits_category.index');
    }

    public function show($id)
    {

    }


    public function destroy($id)
    {
        abort_if(Gate::denies('deposits_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DepositCategory::findOrFail($id)->delete();

        return back();
    }


    public function massDestroy()
    {
        DepositCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
