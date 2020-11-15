<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuotationDetailRequest;
use App\Http\Resources\Admin\QuotationDetailResource;
use App\Models\QuotationDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotationDetailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quotation_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuotationDetailResource(QuotationDetail::with(['quotation'])->get());
    }

    public function store(StoreQuotationDetailRequest $request)
    {
        $quotationDetail = QuotationDetail::create($request->all());

        return (new QuotationDetailResource($quotationDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(QuotationDetail $quotationDetail)
    {
        abort_if(Gate::denies('quotation_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
