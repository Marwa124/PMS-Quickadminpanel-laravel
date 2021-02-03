<?php

namespace Modules\Finance\Http\Controllers\admin;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Payroll\Entities\PaymentMethod;
use Symfony\Component\HttpFoundation\Response;

class PaymentmethodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_method'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payment_methods = PaymentMethod::all();
        return view('finance::admin.payments.index',compact('payment_methods'));
    }


    public function create()
    {
        abort_if(Gate::denies('payment_method_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('finance::admin.payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);
         PaymentMethod::create($request->all());

        return redirect()->route('finance.admin.payment_method.index');
    }

    public function edit( $payment)
    {
        abort_if(Gate::denies('payment_method_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payment = PaymentMethod::findOrFail($payment);
        return view('finance::admin.payments.edit', compact('payment'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'  => 'required'
        ]);
        PaymentMethod::findOrFail($id)->update($request->all());

        return redirect()->route('finance.admin.payment_method.index');
    }

    public function show($id)
    {

    }



    public function destroy($id)
    {
        abort_if(Gate::denies('payment_method_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        PaymentMethod::findOrFail($id)->delete();

        return back();
    }


    public function massDestroy()
    {
        PaymentMethod::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
