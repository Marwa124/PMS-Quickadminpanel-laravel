<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Client;
use Gate;
use App\Models\Deposit;
use App\Models\DepositCategory;
use Modules\HR\Entities\Account;
use Modules\Payroll\Entities\PaymentMethod;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;

class DepositsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('deposits'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('finance::admin.deposits.index');
    }

    public function get_data()
    {

        if (\request()->ajax()) {
            if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') ){
                $deposits = Deposit::all();
            }else{
                $deposits = Deposit::where('created_by',auth()->user()->id)->get();
            }



            return DataTables::of($deposits)
                ->addColumn('placeholder', '&nbsp;')
                ->addColumn('title', function (Deposit $request) {
                    return view('finance::admin.deposits.partials.showModal', compact('request'));
                })
                ->addColumn('date', function (Deposit $request) {
                    $date = $request->entry_date ?? '';
                    return $date;
                })
                ->addColumn('account_name', function (Deposit $request) {
                    $account_name = $request->account->name ?? '';
                    return $account_name;
                })
                ->addColumn('amount', function (Deposit $request) {
                    $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                    return $amount;
                })
                ->addColumn('balance', function (Deposit $request) {
                    $balance = round($request->bank_balance) . ' ' . 'EGP' ?? '';
                    return $balance;
                })
                ->addColumn('paid_by', function (Deposit $request) {
                    $paid_by = $request->paid_by->name ?? '';
                    return $paid_by;
                })
                ->addColumn('attachment', function (Deposit $request) {
                    $data = $request->hasMedia('attachments') ? trans('cruds.deposits.attach') : '';

                    $attachments = $request->getMedia('attachments') ?? null;
                    $id = $request->id;


                    return view('finance::admin.deposits.partials.modal', compact('data', 'attachments', 'id'));
                })
                ->addColumn('action', function (Deposit $request) {
                    $delete_route = route('finance.admin.deposits.destroy', $request);
                    $edit_route = route('finance.admin.deposits.edit', $request);
                    return view('finance::partials.actions', compact('delete_route', 'edit_route'));
                })
                ->rawColumns(['action', 'placeholder', 'title', 'date', 'amount', 'attachment','balance','paid_by'])
                ->make(true);
        }
    }


    public function create()
    {
        abort_if(Gate::denies('deposits_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();
        $deposits_category = DepositCategory::all();
        $clients = Client::all();
        return view('finance::admin.deposits.create', compact('accounts', 'payment_methods','deposits_category','clients'));
    }

    public function store(Request $request)
    {
        $account = Account::findOrFail($request->account_id);

        $request->validate([
            'account_id' => 'numeric|required',
            'amount' => 'numeric|required|max:'.$account->balance
        ]);

        $data = $request->except('attachments');

        $deposits = Deposit::create($data);

        $account->update([
            'balance'   => $account->balance + $request->amount
        ]);

        $deposits->update([
           'bank_balance'   =>  $account->balance
        ]);



        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $deposits->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.deposits.index');


    }

    public function edit($id)
    {
        abort_if(Gate::denies('deposits_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $deposit = Deposit::findOrFail($id);
        if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') || auth()->user()->id == $deposit->created_by ){
            $accounts = Account::all();
            $payment_methods = PaymentMethod::all();
            $deposits_category = DepositCategory::all();
            $clients = Client::all();

            $attachments = $deposit->getMedia('attachments') ?? null;


            $data = trans('cruds.deposits.attach');

            $attachments = view('finance::partials.editModal', compact('data', 'attachments', 'id', 'deposit'));

            return view('finance::admin.deposits.edit', compact('accounts', 'payment_methods','deposits_category','clients','deposit', 'attachments'));

        }else{
            abort( Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

    }

    public function update(Request $request, $id)
    {

        $deposits = Deposit::findOrFail($id);



        $data = $request->except(['attachments', 'amount', 'account_id']);

        $deposits->update($data);


        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $deposits->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.deposits.index');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('deposits_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deposits = Deposit::findOrFail($id);

        $account = Account::findOrFail($deposits->account_id);

        $account->update([
            'balance' => $account->balance - $deposits->amount
        ]);


        $deposits->clearMediaCollection('attachments');
        $deposits->delete();
        return back();
    }


    public function massDestroy()
    {
        abort_if(Gate::denies('deposits_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        foreach (request('ids') as $id) {
            $deposits = Deposit::findOrFail($id);


            $account = Account::findOrFail($deposits->account_id);

            $account->update([
                'balance' => $account->balance - $deposits->amount
            ]);



            $deposits->clearMediaCollection('attachments');
            $deposits->delete();

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

    public function deleteMedia($id, $deposits)
    {
        Deposit::findOrFail($deposits)->deleteMedia($id);
        return response()->json(['success' => 'File Deleted Successfully ;)']);

    }

//    public function getapproved($id)
//    {
//        Deposit::findOrFail($id)->update([
//            'status'        =>  'unpaid'
//        ]);
//        return redirect()->route('finance.admin.deposits.index');
//
//    }
//    public function getpaid($id)
//    {
//        $deposit = Deposit::findOrFail($id);
//
//        $account  =  Account::findOrFail($deposit->account_id);
//
//        if($account->balance > $deposit->amount){
//            $deposit->update([
//                'status'        =>  'paid'
//            ]);
//
//            $account->update([
//                'balance' => $account->balance - $deposit->amount
//            ]);
//        }
//        else{
//            //Error Balance
//        }
//        return redirect()->route('finance.admin.deposits.index');
//
//    }


}
