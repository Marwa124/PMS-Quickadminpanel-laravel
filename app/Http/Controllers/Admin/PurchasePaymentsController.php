<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPurchasePaymentRequest;
use App\Http\Requests\StorePurchasePaymentRequest;
use App\Http\Requests\UpdatePurchasePaymentRequest;
use App\Models\Account;
use App\Models\Purchase;
use App\Models\PurchasePayment;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PurchasePaymentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('purchase_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasePayments = PurchasePayment::all();

        return view('admin.purchasePayments.index', compact('purchasePayments'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchases = Purchase::all()->pluck('reference_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchasePayments.create', compact('purchases', 'accounts', 'transactions'));
    }

    public function store(StorePurchasePaymentRequest $request)
    {
        $purchasePayment = PurchasePayment::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $purchasePayment->id]);
        }

        return redirect()->route('admin.purchase-payments.index');
    }

    public function edit(PurchasePayment $purchasePayment)
    {
        abort_if(Gate::denies('purchase_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchases = Purchase::all()->pluck('reference_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchasePayment->load('purchase', 'account', 'transaction');

        return view('admin.purchasePayments.edit', compact('purchases', 'accounts', 'transactions', 'purchasePayment'));
    }

    public function update(UpdatePurchasePaymentRequest $request, PurchasePayment $purchasePayment)
    {
        $purchasePayment->update($request->all());

        return redirect()->route('admin.purchase-payments.index');
    }

    public function show(PurchasePayment $purchasePayment)
    {
        abort_if(Gate::denies('purchase_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasePayment->load('purchase', 'account', 'transaction');

        return view('admin.purchasePayments.show', compact('purchasePayment'));
    }

    public function destroy(PurchasePayment $purchasePayment)
    {
        abort_if(Gate::denies('purchase_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasePayment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchasePaymentRequest $request)
    {
        PurchasePayment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('purchase_payment_create') && Gate::denies('purchase_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PurchasePayment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
