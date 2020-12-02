<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Payroll\Http\Requests\Destroy\MassDestroyPaymentRequest;
use Modules\Payroll\Http\Requests\Store\StorePaymentRequest;
use Modules\Payroll\Http\Requests\Update\UpdatePaymentRequest;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Modules\Payroll\Entities\Payment;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = Payment::all();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all()->pluck('recur_start_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payments.create', compact('invoices', 'accounts', 'transactions'));
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $payment->id]);
        }

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all()->pluck('recur_start_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('invoice', 'account', 'transaction');

        return view('admin.payments.edit', compact('invoices', 'accounts', 'transactions', 'payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('invoice', 'account', 'transaction');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('payment_create') && Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Payment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
