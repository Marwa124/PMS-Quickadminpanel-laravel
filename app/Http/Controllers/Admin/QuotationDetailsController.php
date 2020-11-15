<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuotationDetailRequest;
use App\Http\Requests\StoreQuotationDetailRequest;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotationDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quotation_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationDetails = QuotationDetail::all();

        return view('admin.quotationDetails.index', compact('quotationDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('quotation_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotations = Quotation::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quotationDetails.create', compact('quotations'));
    }

    public function store(StoreQuotationDetailRequest $request)
    {
        $quotationDetail = QuotationDetail::create($request->all());

        return redirect()->route('admin.quotation-details.index');
    }

    public function destroy(QuotationDetail $quotationDetail)
    {
        abort_if(Gate::denies('quotation_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuotationDetailRequest $request)
    {
        QuotationDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
