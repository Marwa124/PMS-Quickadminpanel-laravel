<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePurchasePaymentRequest;
use App\Http\Requests\UpdatePurchasePaymentRequest;
use App\Http\Resources\Admin\PurchasePaymentResource;
use App\Models\PurchasePayment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchasePaymentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('purchase_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasePaymentResource(PurchasePayment::with(['purchase', 'account', 'transaction'])->get());
    }

    public function store(StorePurchasePaymentRequest $request)
    {
        $purchasePayment = PurchasePayment::create($request->all());

        return (new PurchasePaymentResource($purchasePayment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PurchasePayment $purchasePayment)
    {
        abort_if(Gate::denies('purchase_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasePaymentResource($purchasePayment->load(['purchase', 'account', 'transaction']));
    }

    public function update(UpdatePurchasePaymentRequest $request, PurchasePayment $purchasePayment)
    {
        $purchasePayment->update($request->all());

        return (new PurchasePaymentResource($purchasePayment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PurchasePayment $purchasePayment)
    {
        abort_if(Gate::denies('purchase_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasePayment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
