<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOnlinePaymentRequest;
use App\Http\Requests\StoreOnlinePaymentRequest;
use App\Models\OnlinePayment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlinePaymentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('online_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlinePayments = OnlinePayment::all();

        return view('admin.onlinePayments.index', compact('onlinePayments'));
    }

    public function create()
    {
        abort_if(Gate::denies('online_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onlinePayments.create');
    }

    public function store(StoreOnlinePaymentRequest $request)
    {
        $onlinePayment = OnlinePayment::create($request->all());

        return redirect()->route('admin.online-payments.index');
    }

    public function destroy(OnlinePayment $onlinePayment)
    {
        abort_if(Gate::denies('online_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlinePayment->delete();

        return back();
    }

    public function massDestroy(MassDestroyOnlinePaymentRequest $request)
    {
        OnlinePayment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
