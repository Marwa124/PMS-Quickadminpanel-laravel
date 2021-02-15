<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Entities\Client;
use App\Models\Pettycash;
use Gate;
use App\Models\Settlement;
use Modules\HR\Entities\Account;
use Modules\HR\Entities\Designation;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;

class SettlementController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
//        abort_if(Gate::denies('settlement'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('finance::admin.settlement.index');
    }

    public function get_data()
    {
        if (\request()->ajax()) {
            if (request('type') != '' || request('id') != '') {

                if (request('type') == 'all') {
                    if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) {
                        $settlement = Settlement::all();
                    } else {
                        $settlement = Settlement::where('user_id', auth()->user()->id)->get();
                    }
                }
                elseif (request('type') == 'my_settlement') {
                    $settlement = Settlement::where('user_id', auth()->user()->id)->get();
                }
                elseif (request('type') == 'pending') {
                    if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) {
                        $settlement = Settlement::where('settlement_status', 'pending')->get();
                    } else {
                        $settlement = Settlement::where('settlement_status', 'pending')->where('user_id', auth()->user()->id)->get();
                    }
                }
                elseif (request('id') != '') {
                    if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) {
                        $settlement = Settlement::where('pettycash_id', request('id'))->get();
                    } else {
                        $settlement = Settlement::where('pettycash_id', request('id'))->where('user_id', auth()->user()->id)->get();
                    }
                }

                return DataTables::of($settlement)
                    ->addColumn('placeholder', '&nbsp;')
                    ->addColumn('amount', function (Settlement $request) {
                        $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                        return $amount;
                    })
                    ->addColumn('date', function (Settlement $request) {
                        $date = $request->date ?? '';
                        return $date;
                    })
                    ->addColumn('fullname', function (Settlement $request) {
                        $fullname = $request->added_by->accountDetail->fullname ?? '';
                        return $fullname;
                    })
                    ->addColumn('status', function (Settlement $request) {

                        $status = '';

                        if ((auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) && $request->added_by->id != auth()->user()->id) {

                            if ($request->settlement_status == 'pending') {

                                $status = '
                            <a href="' . route('finance.admin.settlement.getapproved', $request->id) . '" title="getapproved"> ' . trans('cruds.settlement.fields.accepted') . '</a>
                            <a href="' . route('finance.admin.settlement.getrejected', $request->id) . '" title="getrejected"> ' . trans('cruds.settlement.fields.rejected') . '</a>
                            ';

                            } else {
                                $status = trans('cruds.settlement.fields.' . $request->settlement_status);
                            }
                        } else {
                            $status = trans('cruds.settlement.fields.' . $request->settlement_status);
                        }


                        return $status;
                    })
                    ->addColumn('attachment', function (Settlement $request) {

                        $data = $request->hasMedia('attachments') ? trans('cruds.settlement.attach') : '';

                        $attachments = $request->getMedia('attachments') ?? null;

                        $id = $request->id;


                        return view('finance::admin.settlement.partials.modal', compact('data', 'attachments', 'id'));
                    })
                    ->addColumn('action', function (Settlement $request) {

                        $view_route = view('finance::admin.settlement.partials.showModal', compact('request'));
                        $settlement_route = route('finance.admin.settlement.show', $request->id);
                        $pdf_route = route('finance.admin.settlement.pdf', $request->id);
                        $main_actions = view('finance::admin.settlement.partials.actions', compact('view_route', 'settlement_route', 'pdf_route'));

                        if ($request->settlement_status == 'pending' || $request->settlement_status == 'rejected') {
                            $delete_route = route('finance.admin.settlement.destroy', $request);
                            $main_actions .= view('finance::partials.actions', compact('delete_route'));
                        } else {
                            $deduction_route = view('finance::admin.settlement.partials.deductionModal', compact('request'));
                            $main_actions .= view('finance::partials.actions', compact('deduction_route'));
                        }
                        return $main_actions;
                    })
                    ->rawColumns(['action', 'placeholder', 'fullname', 'date', 'amount', 'status', 'attachment'])
                    ->make(true);
            } else {
                if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) {
                    $settlement = Settlement::all();
                } else {
                    $settlement = Settlement::where('created_by', auth()->user()->id)->get();
                }


                return DataTables::of($settlement)
                    ->addColumn('placeholder', '&nbsp;')
                    ->addColumn('amount', function (Settlement $request) {
                        $amount = round($request->amount) . ' ' . 'EGP' ?? '';
                        return $amount;
                    })
                    ->addColumn('date', function (Settlement $request) {
                        $date = $request->date ?? '';
                        return $date;
                    })
                    ->addColumn('fullname', function (Settlement $request) {
                        $fullname = $request->added_by->accountDetail->fullname ?? '';
                        return $fullname;
                    })
                    ->addColumn('status', function (Settlement $request) {
                        $status = '';
                        if ((auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) && $request->added_by->id != auth()->user()->id) {
                            if ($request->settlement_status == 'pending') {
                                $status = '
                            <a href="' . route('finance.admin.settlement.getapproved', $request->id) . '" title="getapproved"> ' . trans('cruds.settlement.fields.accepted') . '</a>
                            <a href="' . route('finance.admin.settlement.getrejected', $request->id) . '" title="getrejected"> ' . trans('cruds.settlement.fields.rejected') . '</a>
                            ';

                            } else {
                                $status = trans('cruds.settlement.fields.' . $request->settlement_status);
                            }
                        } else {
                            $status = trans('cruds.settlement.fields.' . $request->settlement_status);
                        }


                        return $status;
                    })
                    ->addColumn('attachment', function (Settlement $request) {
                        $data = $request->hasMedia('attachments') ? trans('cruds.settlement.attach') : '';

                        $attachments = $request->getMedia('attachments') ?? null;
                        $id = $request->id;


                        return view('finance::admin.settlement.partials.modal', compact('data', 'attachments', 'id'));
                    })
                    ->addColumn('action', function (Settlement $request) {
                        $view_route = view('finance::admin.settlement.partials.showModal', compact('request'));
                        $settlement_route = route('finance.admin.settlement.show', $request->id);
                        $pdf_route = route('finance.admin.settlement.pdf', $request->id);
                        $main_actions = view('finance::admin.settlement.partials.actions', compact('view_route', 'settlement_route', 'pdf_route'));

                        if ($request->settlement_status == 'pending' || $request->settlement_status == 'rejected') {
                            $delete_route = route('finance.admin.settlement.destroy', $request);
                            $main_actions .= view('finance::partials.actions', compact('delete_route'));
                        } else {
                            $deduction_route = view('finance::admin.settlement.partials.deductionModal', compact('request'));
                            $main_actions .= view('finance::partials.actions', compact('deduction_route'));
                        }
                        return $main_actions;
                    })
                    ->rawColumns(['action', 'placeholder', 'fullname', 'date', 'amount', 'status', 'attachment'])
                    ->make(true);
            }
        }
    }



    public function show($id)
    {
        return view('finance::admin.settlement.show', compact('id'));
    }


    public function create()
    {
        abort(Response::HTTP_NOT_FOUND, '404 Not Found');
    }

    public function create_with_id($id)
    {
//        abort_if(Gate::denies('settlement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settlement = Pettycash::findOrFail($id);
        $clients = Client::all();
        $projects = Project::all();
        return view('finance::admin.settlement.create', compact('settlement', 'clients', 'projects'));
    }


    public function store(Request $request)
    {
//        |in:'.auth()->user()->id,
        if(!auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') && $request->user_id != auth()->user()->id ){
            abort(Response::HTTP_FORBIDDEN, 'Access Denied');
        }

        $request->validate([
            'pettycash_id' => 'required|integer|exists:settlementes,id',
            'user_id' => 'required|integer|exists:users,id',
            'settlement_type' => 'required|in:ST,TR,,E&W,TEL,IT,F&B,M&C',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'invoice_number' => 'required|string',
            'description' => 'sometimes',
        ]);

        if ($request->project_id != null) {
            $request->validate([
                'project_id' => 'sometimes|integer|exists:projects,id',
            ]);

        } elseif ($request->client_id != null) {
            $request->validate([
                'client_id' => 'sometimes|integer|exists:clients,id',
            ]);
        }

        $data = [
            'pettycash_id' => $request->pettycash_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'settlement_type' => $request->settlement_type,
            'project_id' => $request->project_id,
            'client_id' => $request->client_id,
            'invoice_number' => $request->invoice_number,
            'user_id' => $request->user_id,
        ];


        $settlement = Settlement::create($data);


        if ($request->input('attachments', false)) {
            foreach ($request->attachments as $attachment) {
                $settlement->addMedia(storage_path('tmp/uploads/' . $attachment))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('finance.admin.settlement.show', $request->pettycash_id);


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
//        abort_if(Gate::denies('settlement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settlement = Settlement::findOrFail($id);
        if(!auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') && $settlement->user_id != auth()->user()->id && $settlement->settlement_status == 'accepted'){
            abort(Response::HTTP_FORBIDDEN, 'Access Denied');
        }

        $settlement->delete();
        return back();
    }


    public function massDestroy()
    {
//        abort_if(Gate::denies('settlement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Settlement::whereIn('id', request('ids'))->where('settlement_status', 'pending')->orWhere('settlement_status', 'rejected')->delete();


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

    public function deleteMedia($id, $settlement)
    {
        Settlement::findOrFail($settlement)->deleteMedia($id);
        return response()->json(['success' => 'File Deleted Successfully ;)']);

    }

    public function getapproved($id)
    {
        $settlement = Settlement::findOrFail($id);
        if ($settlement->user_id != auth()->user()->id) {
            $settlement->update([
                'settlement_status' => 'accepted',
                'approved_by' => auth()->user()->id ?? '',
            ]);

        }

        return redirect()->route('finance.admin.settlement.index');
    }

    public function getrejected($id)
    {
        $settlement = Settlement::findOrFail($id);
        if ($settlement->user_id != auth()->user()->id) {
            $settlement->update([
                'settlement_status' => 'rejected',
                'approved_by' => auth()->user()->id ?? '',

            ]);

        }
        return redirect()->route('finance.admin.settlement.index');


    }

    public function deduction(Request $request, $id)
    {
        $settlement = Settlement::findOrFail($id);
        $request->validate([
            'deduction_value' => 'required|numeric'
        ]);

        $settlement->update([
            'deduction_value' => $request->deduction_value,
            'has_deduction' => 1,

        ]);
        return redirect()->route('finance.admin.settlement.index');


    }


    public function pdf($id)
    {

//        abort_if(Gate::denies('stocks'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));


        $pettycash = Pettycash::findOrFail($id);
        $settlements = Settlement::where('pettycash_id',$id)->get();


        $title = $pettycash->reference_no . '_settlements.pdf' ?? 'settlements.pdf';
        $compact = [
            'pettycash' => $pettycash,
            'settlements' => $settlements,
        ];

        $view = 'finance::admin.settlement.pdf';
        download_pdf($view, $compact, $title);


        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

}
