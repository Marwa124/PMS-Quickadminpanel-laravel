<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use DataTables;

class InvoicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('finance::admin.invoices.index');
    }

    public function get_data()
    {

        if (\request()->ajax()) {

            $invoices = Invoice::all();


            return DataTables::of($invoices)
                ->addColumn('placeholder', '&nbsp;')

                ->addColumn('from', function (Invoice $request) {
//                    $from_account = $request->from->name ?? '';
//                    return $from_account;
                    return view('finance::partials.showModal', compact( 'request'));
                })
                ->addColumn('to', function (Invoice $request) {
                    $to_account = $request->to->name ?? '';

                    return $to_account;
                })
                ->addColumn('amount', function (Invoice $request) {
                    $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                    return $amount;
                })
                ->addColumn('attachment', function (Invoice $request) {
                    $data = $request->hasMedia('attachments') ? trans('cruds.invoices.attach') : '';

                    $attachments = $request->getMedia('attachments') ?? null;
                    $id = $request->id;


                    return view('finance::partials.modal', compact('data','attachments','id'));
                })
                ->addColumn('action', function (Invoice $request) {
                    $delete_route = route('finance.admin.invoices.destroy', $request);
                    $edit_route = route('finance.admin.invoices.edit', $request);
                    return view('finance::partials.actions', compact('delete_route', 'edit_route'));
                })
                ->rawColumns(['action', 'placeholder', 'from', 'to', 'amount','attachment'])
                ->make(true);
        }
    }


    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();
        return view('finance::admin.invoices.create', compact('accounts', 'payment_methods'));
    }

    public function store(Request $request)
    {

        $from_account =  Account::findOrFail($request->from_account);
        $to_account   =  Account::findOrFail($request->to_account);

        $request->validate([
            'amount'   => 'numeric|min:1|max:'.$from_account->balance,
            'from_account'   => 'integer|not_in:'.$request->to_account,
            'to_account'   => 'integer|not_in:'.$request->from_account,
        ]);


        $data = $request->except('attachments');

        $invoice = Invoice::create($data);


        $from_account->update([
            'balance' => $from_account->balance - $request->amount
        ]);

        $to_account->update([
            'balance' => $to_account->balance + $request->amount
        ]);

        $invoice->update([
            'bank_balance'   => $to_account->balance
        ]);


        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $invoice->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.invoices.index');


    }

    public function edit($id)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $invoice = Invoice::findOrFail($id);
        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();




        $attachments = $invoice->getMedia('attachments') ?? null;


        $data = trans('cruds.invoices.attach');

        $attachments =view('finance::partials.editModal', compact('data','attachments','id','invoice'));

        return view('finance::admin.invoices.edit', compact('accounts', 'payment_methods' ,'invoice','attachments'));
    }

    public function update(Request $request, $id)
    {

        $invoice = Invoice::findOrFail($id);



        $from_account =  Account::findOrFail($invoice->from_account);

        $request->validate([
            'amount'   => 'numeric|min:1|max:'.$from_account->balance,
            'from_account'   => 'integer|not_in:'.$invoice->to_account,
            'to_account'   => 'integer|not_in:'.$invoice->from_account,
        ]);


        $data = $request->except(['attachments','amount','to_account','from_account']);

        $invoice->update($data);



        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $invoice->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.invoices.index');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice     = Invoice::findOrFail($id);

        $from_account = Account::findOrFail($invoice->from_account);
        $to_account   = Account::findOrFail($invoice->to_account);

        $from_account->update([
            'balance'   =>     $from_account->balance + $invoice->amount
        ]);

        $to_account->update([
            'balance'   =>     $to_account->balance - $invoice->amount
        ]);

        $invoice->clearMediaCollection('attachments');
        $invoice->delete();
        return back();
    }


    public function massDestroy()
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        foreach( request('ids') as $id){
            $invoice     = Invoice::findOrFail($id);

            $from_account = Account::findOrFail($invoice->from_account);
            $to_account   = Account::findOrFail($invoice->to_account);

            $from_account->update([
                'balance'   =>     $from_account->balance + $invoice->amount
            ]);

            $to_account->update([
                'balance'   =>     $to_account->balance - $invoice->amount
            ]);


            $invoice->clearMediaCollection('attachments');
            $invoice->delete();

        }

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
