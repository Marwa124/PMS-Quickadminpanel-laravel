<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Entities\Client;
use Gate;
use App\Models\Pettycash;
use Modules\HR\Entities\Account;
use Modules\HR\Entities\Designation;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;

class PettycashController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
//        abort_if(Gate::denies('petty_cash'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('finance::admin.petty_cash.index');
    }

    public function get_data()
    {

        if (\request()->ajax()) {
            if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) {
                $petty_cash = Pettycash::all();
            } else {
                $petty_cash = Pettycash::where('created_by', auth()->user()->id)->get();
            }


            return DataTables::of($petty_cash)
                ->addColumn('placeholder', '&nbsp;')
                ->addColumn('amount', function (Pettycash $request) {
                    $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                    return $amount;
                })
                ->addColumn('date', function (Pettycash $request) {
                    $date = $request->date ?? '';
                    return $date;
                })
                ->addColumn('fullname', function (Pettycash $request) {
                    $fullname = $request->added_by->accountDetail->fullname ?? '';
                    return $fullname;
                })
                ->addColumn('status', function (Pettycash $request) {
                    $status = '';
                    if ((auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) && $request->added_by->id != auth()->user()->id) {
                        if ($request->pettycash_status == 'pending') {
                            $status = '
                            <a href="' . route('finance.admin.petty_cash.getapproved', $request->id) . '" title="getapproved"> ' . trans('cruds.petty_cash.fields.accepted') . '</a>
                            <a href="' . route('finance.admin.petty_cash.getrejected', $request->id) . '" title="getrejected"> ' . trans('cruds.petty_cash.fields.rejected') . '</a>
                            ';

                        } else {
                            $status = trans('cruds.petty_cash.fields.' . $request->pettycash_status);
                        }
                    } else {
                        $status = trans('cruds.petty_cash.fields.' . $request->pettycash_status);
                    }


                    return $status;
                })
                ->addColumn('attachment', function (Pettycash $request) {
                    $data = $request->hasMedia('attachments') ? trans('cruds.petty_cash.attach') : '';

                    $attachments = $request->getMedia('attachments') ?? null;
                    $id = $request->id;


                    return view('finance::admin.petty_cash.partials.modal', compact('data', 'attachments', 'id'));
                })
                ->addColumn('action', function (Pettycash $request) {
                    $view_route = view('finance::admin.petty_cash.partials.showModal', compact('request'));
                    $settlement_route = route('finance.admin.settlement.show', $request->id);
                    $pdf_route = route('finance.admin.petty_cash.pdf', $request->id);
                    $main_actions = view('finance::admin.petty_cash.partials.actions', compact('view_route', 'settlement_route', 'pdf_route'));

                    if ($request->pettycash_status == 'pending' || $request->pettycash_status == 'rejected') {
                        $delete_route = route('finance.admin.petty_cash.destroy', $request);
                        $main_actions .= view('finance::partials.actions', compact('delete_route'));
                    } elseif(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) {
                        $deduction_route = view('finance::admin.petty_cash.partials.deductionModal', compact('request'));
                        $main_actions .= view('finance::partials.actions', compact('deduction_route'));
                    }
                    return $main_actions;
                })
                ->rawColumns(['action', 'placeholder', 'fullname', 'date', 'amount', 'status', 'attachment'])
                ->make(true);
        }
    }


    public function create()
    {
//        abort_if(Gate::denies('petty_cash_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all();
        return view('finance::admin.petty_cash.create', compact('designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'sometimes',
        ]);
        if(!auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') && $request->user_id != auth()->user()->id){
            abort(Response::HTTP_FORBIDDEN, 'Access Denied');

        }
        $data = [
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'reference_no' => generate_pettycash_number(),
        ];


        $petty_cash = Pettycash::create($data);


        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $petty_cash->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.petty_cash.index');


    }

    public function edit($id)
    {

        abort(Response::HTTP_NOT_FOUND, '404 Not Found');


    }

    public function update(Request $request, $id)
    {

        abort(Response::HTTP_NOT_FOUND, '404 Not Found');

    }


    public function destroy($id)
    {
//        abort_if(Gate::denies('petty_cash_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petty_cash = Pettycash::findOrFail($id);

        if(!auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') && $petty_cash->user_id != auth()->user()->id && $petty_cash->pettycash_status == 'accepted'){
            abort(Response::HTTP_FORBIDDEN, 'Access Denied');
        }

        $petty_cash->delete();
        return back();
    }


    public function massDestroy()
    {
//        abort_if(Gate::denies('petty_cash_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Pettycash::whereIn('id', request('ids'))->where('pettycash_status', 'pending')->orWhere('pettycash_status', 'rejected')->delete();


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

    public function deleteMedia($id, $petty_cash)
    {
        Pettycash::findOrFail($petty_cash)->deleteMedia($id);
        return response()->json(['success' => 'File Deleted Successfully ;)']);

    }

    public function getapproved($id)
    {
        $pettycash = Pettycash::findOrFail($id);
        if ($pettycash->user_id != auth()->user()->id) {
            $pettycash->update([
                'pettycash_status' => 'accepted',
                'approved_by' => auth()->user()->id ?? '',
            ]);

        }

        return redirect()->route('finance.admin.petty_cash.index');
    }

    public function getrejected($id)
    {
        $pettycash = Pettycash::findOrFail($id);
        if ($pettycash->user_id != auth()->user()->id) {
            $pettycash->update([
                'pettycash_status' => 'rejected',
                'approved_by' => auth()->user()->id ?? '',

            ]);

        }
        return redirect()->route('finance.admin.petty_cash.index');


    }

    public function deduction(Request $request, $id)
    {

        if(!auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')){
            abort(Response::HTTP_FORBIDDEN, 'Access Denied');
        }

        $pettycash = Pettycash::findOrFail($id);
        $request->validate([
            'deduction_value' => 'required|numeric'
        ]);

        $pettycash->update([
            'deduction_value' => $request->deduction_value,
            'has_deduction' => 1,

        ]);
        return redirect()->route('finance.admin.petty_cash.index');


    }


    public function pdf($id)
    {

//        abort_if(Gate::denies('stocks'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));


        $pettycash = Pettycash::findOrFail($id);


        $title = $pettycash->reference_no . '_petty_cash.pdf' ?? 'petty_cash.pdf';
        $compact = [
            'pettycash' => $pettycash,
        ];

        $view = 'finance::admin.petty_cash.pdf';
        download_pdf($view, $compact, $title);


        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

}
