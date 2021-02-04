<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Client;
use Gate;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Modules\HR\Entities\Account;
use Modules\Payroll\Entities\PaymentMethod;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;

class ExpensesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('expenses'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('finance::admin.expenses.index');
    }

    public function get_data()
    {

        if (\request()->ajax()) {
            if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') ){
                $expenses = Expense::all();
            }else{
                $expenses = Expense::where('created_by',auth()->user()->id)->get();
            }



            return DataTables::of($expenses)
                ->addColumn('placeholder', '&nbsp;')
                ->addColumn('title', function (Expense $request) {
                    return view('finance::admin.expenses.partials.showModal', compact('request'));
                })
                ->addColumn('date', function (Expense $request) {
                    $date = $request->entry_date ?? '';
                    return $date;
                })
                ->addColumn('account_name', function (Expense $request) {
                    $account_name = $request->account->name ?? '';
                    return $account_name;
                })
                ->addColumn('amount', function (Expense $request) {
                    $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                    return $amount;
                })
                ->addColumn('status', function (Expense $request) {
                    $status = '';
                    if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') ){
                        if ($request->status == 'non_approved') {
                            $status = '<a href="' . route('finance.admin.expenses.getapproved',$request->id) . '" title="getapproved"> Non Approved</a>';

                        } else if ($request->status == 'unpaid') {
                            $status = '<a href="' . route('finance.admin.expenses.getpaid',$request->id) . '" title="getpaid"> Unpaid</a>';

                        } else{
                            $status = $request->status;
                        }
                    }else{
                        if ($request->status == 'non_approved') {
                            $status = 'Non Approved';

                        } else if ($request->status == 'unpaid') {
                            $status = 'Unpaid';

                        } else{
                            $status = $request->status;
                        }
                    }


                    return $status;
                })
                ->addColumn('attachment', function (Expense $request) {
                    $data = $request->hasMedia('attachments') ? trans('cruds.expenses.attach') : '';

                    $attachments = $request->getMedia('attachments') ?? null;
                    $id = $request->id;


                    return view('finance::admin.expenses.partials.modal', compact('data', 'attachments', 'id'));
                })
                ->addColumn('action', function (Expense $request) {
                    $delete_route = route('finance.admin.expenses.destroy', $request);
                    $edit_route = route('finance.admin.expenses.edit', $request);
                    return view('finance::partials.actions', compact('delete_route', 'edit_route'));
                })
                ->rawColumns(['action', 'placeholder', 'title', 'date', 'amount', 'status', 'attachment'])
                ->make(true);
        }
    }


    public function create()
    {
        abort_if(Gate::denies('expenses_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();
        $expenses_category = ExpenseCategory::all();
        $clients = Client::all();
        return view('finance::admin.expenses.create', compact('accounts', 'payment_methods','expenses_category','clients'));
    }

    public function store(Request $request)
    {
        $account = Account::findOrFail($request->account_id);

        $request->validate([
            'account_id' => 'numeric|required',
            'amount' => 'numeric|required|max:'.$account->balance
        ]);

        $data = $request->except('attachments');

        $expenses = Expense::create($data);

        $account->update([
            'balance'   => $account->balance - $request->amount
        ]);

        $expenses->update([
           'bank_balance'   =>  $account->balance
        ]);



        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $expenses->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.expenses.index');


    }

    public function edit($id)
    {
        abort_if(Gate::denies('expenses_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $expense = Expense::findOrFail($id);
        if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') || auth()->user()->id == $expense->created_by ){
            $accounts = Account::all();
            $payment_methods = PaymentMethod::all();
            $expenses_category = ExpenseCategory::all();
            $clients = Client::all();

            $attachments = $expense->getMedia('attachments') ?? null;


            $data = trans('cruds.expenses.attach');

            $attachments = view('finance::partials.editModal', compact('data', 'attachments', 'id', 'expense'));

            return view('finance::admin.expenses.edit', compact('accounts', 'payment_methods','expenses_category','clients','expense', 'attachments'));

        }else{
            abort( Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

    }

    public function update(Request $request, $id)
    {

        $expenses = Expense::findOrFail($id);



        $data = $request->except(['attachments', 'amount', 'account_id']);

        $expenses->update($data);


        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $expenses->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.expenses.index');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('expenses_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenses = Expense::findOrFail($id);

        $account = Account::findOrFail($expenses->account_id);

        $account->update([
            'balance' => $account->balance + $expenses->amount
        ]);


        $expenses->clearMediaCollection('attachments');
        $expenses->delete();
        return back();
    }


    public function massDestroy()
    {
        abort_if(Gate::denies('expenses_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        foreach (request('ids') as $id) {
            $expenses = Expense::findOrFail($id);


            $account = Account::findOrFail($expenses->account_id);

            $account->update([
                'balance' => $account->balance + $expenses->amount
            ]);



            $expenses->clearMediaCollection('attachments');
            $expenses->delete();

        }

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function downloadMedia($id)
    {
        $media = Media::findOrFail($id);
        return response()->download($media->getPath(), $media->file_name);
    }

    public function viewMedia($id)
    {
        $media = Media::findOrFail($id);
        return response()->file($media->getPath());
    }

    public function deleteMedia($id, $expenses)
    {
        Expense::findOrFail($expenses)->deleteMedia($id);
        return response()->json(['success' => 'File Deleted Successfully ;)']);

    }

    public function getapproved($id)
    {
        Expense::findOrFail($id)->update([
            'status'        =>  'unpaid'
        ]);
        return redirect()->route('finance.admin.expenses.index');

    }
    public function getpaid($id)
    {
        $expense = Expense::findOrFail($id);

        $account  =  Account::findOrFail($expense->account_id);

        if($account->balance > $expense->amount){
            $expense->update([
                'status'        =>  'paid'
            ]);

            $account->update([
                'balance' => $account->balance - $expense->amount
            ]);
        }
        else{
            //Error Balance
        }
        return redirect()->route('finance.admin.expenses.index');

    }


}
