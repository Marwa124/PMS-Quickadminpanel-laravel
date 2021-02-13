<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Account;
use App\Models\ExpenseCategory;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Permission;
use App\Models\Project;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransactionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
//        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::all();

        return view('finance::admin.transactions.index', compact('transactions'));
    }


    public function pdf()
    {

//        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $transactions = Transaction::all();


        $title =  'Transactions.pdf' ;
        $compact = [
            'transactions' => $transactions,
        ];

        $view = 'finance::admin.transactions.pdf';
        download_pdf($view, $compact, $title);


        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }
    public function create()
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function store(StoreTransactionRequest $request)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function edit(Transaction $transaction)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function show(Transaction $transaction)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function destroy(Transaction $transaction)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
