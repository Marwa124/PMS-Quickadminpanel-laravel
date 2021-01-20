<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Modules\Finance\Entities\Transfer;
use Modules\HR\Entities\Account;
use Modules\Payroll\Entities\PaymentMethod;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;


class TransfersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('transfer'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('finance::admin.transfers.index');
    }

    public function get_data()
    {

        if (\request()->ajax()) {

            $transfers = Transfer::all();


            return DataTables::of($transfers)
                ->addColumn('placeholder', '&nbsp;')

                ->addColumn('from', function (Transfer $request) {
//                    $from_account = $request->from->name ?? '';
//                    return $from_account;
                    return view('finance::partials.showModal', compact( 'request'));
                })
                ->addColumn('to', function (Transfer $request) {
                    $to_account = $request->to->name ?? '';

                    return $to_account;
                })
                ->addColumn('amount', function (Transfer $request) {
                    $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                    return $amount;
                })
                ->addColumn('attachment', function (Transfer $request) {
                    $data = $request->hasMedia('attachments') ? trans('cruds.transfers.attach') : '';

                    $attachments = $request->getMedia('attachments') ?? null;
                    $id = $request->id;


                    return view('finance::partials.modal', compact('data','attachments','id'));
                })
                ->addColumn('action', function (Transfer $request) {
                    $delete_route = route('finance.admin.transfers.destroy', $request);
                    $edit_route = route('finance.admin.transfers.edit', $request);
                    return view('finance::partials.actions', compact('delete_route', 'edit_route'));
                })
                ->rawColumns(['action', 'placeholder', 'from', 'to', 'amount','attachment'])
                ->make(true);
        }
    }


    public function create()
    {
        abort_if(Gate::denies('transfer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();
        return view('finance::admin.transfers.create', compact('accounts', 'payment_methods'));
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

            $transfer = Transfer::create($data);


            $from_account->update([
                'balance' => $from_account->balance - $request->amount
            ]);

            $to_account->update([
                'balance' => $to_account->balance + $request->amount
            ]);

            if ($request->input('attachments', false)) {
                foreach ($request->attachments as $attachment) {
                    $transfer->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
                }
            }

            return redirect()->route('finance.admin.transfers.index');


    }

    public function edit($id)
    {
        abort_if(Gate::denies('transfer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $transfer = Transfer::findOrFail($id);
        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();




        $attachments = $transfer->getMedia('attachments') ?? null;


        $data = trans('cruds.transfers.attach');

        $attachments =view('finance::partials.editModal', compact('data','attachments','id','transfer'));

        return view('finance::admin.transfers.edit', compact('accounts', 'payment_methods' ,'transfer','attachments'));
    }

    public function update(Request $request, $id)
    {

        $transfer = Transfer::findOrFail($id);



        $from_account =  Account::findOrFail($transfer->from_account);

        $request->validate([
            'amount'   => 'numeric|min:1|max:'.$from_account->balance,
            'from_account'   => 'integer|not_in:'.$transfer->to_account,
            'to_account'   => 'integer|not_in:'.$transfer->from_account,
        ]);


        $data = $request->except(['attachments','amount','to_account','from_account']);

        $transfer->update($data);



        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $transfer->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.transfers.index');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer     = Transfer::findOrFail($id);

        $from_account = Account::findOrFail($transfer->from_account);
        $to_account   = Account::findOrFail($transfer->to_account);

        $from_account->update([
            'balance'   =>     $from_account->balance + $transfer->amount
        ]);

        $to_account->update([
            'balance'   =>     $to_account->balance - $transfer->amount
        ]);

        $transfer->clearMediaCollection('attachments');
        $transfer->delete();
        return back();
    }


    public function massDestroy()
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        foreach( request('ids') as $id){
            $transfer     = Transfer::findOrFail($id);

            $from_account = Account::findOrFail($transfer->from_account);
            $to_account   = Account::findOrFail($transfer->to_account);

            $from_account->update([
                'balance'   =>     $from_account->balance + $transfer->amount
            ]);

            $to_account->update([
                'balance'   =>     $to_account->balance - $transfer->amount
            ]);


            $transfer->clearMediaCollection('attachments');
            $transfer->delete();

        }

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function downloadMedia($id){
        $media = Media::findOrFail($id);
        return response()->download($media->getPath(), $media->file_name);
    }

    public function viewMedia($id){
        $media = Media::findOrFail($id);
        return response()->file($media->getPath());
    }

    public function deleteMedia($id,$transfer){
        Transfer::findOrFail($transfer)->deleteMedia($id);
        return response()->json(['success'=>'File Deleted Successfully ;)']);

    }


    public function report(){
        $transfers = Transfer::all();
        $total_balance = Transfer::sum('amount');
        return view('finance::admin.transfers.report',compact('transfers','total_balance'));
    }




}
