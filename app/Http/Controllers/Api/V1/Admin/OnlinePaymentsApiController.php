<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOnlinePaymentRequest;
use App\Http\Resources\Admin\OnlinePaymentResource;
use App\Models\OnlinePayment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlinePaymentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('online_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OnlinePaymentResource(OnlinePayment::all());
    }

    public function store(StoreOnlinePaymentRequest $request)
    {
        $onlinePayment = OnlinePayment::create($request->all());

        return (new OnlinePaymentResource($onlinePayment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(OnlinePayment $onlinePayment)
    {
        abort_if(Gate::denies('online_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlinePayment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
