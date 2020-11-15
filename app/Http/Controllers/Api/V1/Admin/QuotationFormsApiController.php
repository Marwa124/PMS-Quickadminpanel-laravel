<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuotationFormRequest;
use App\Http\Requests\UpdateQuotationFormRequest;
use App\Http\Resources\Admin\QuotationFormResource;
use App\Models\QuotationForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotationFormsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quotation_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuotationFormResource(QuotationForm::with(['user'])->get());
    }

    public function store(StoreQuotationFormRequest $request)
    {
        $quotationForm = QuotationForm::create($request->all());

        return (new QuotationFormResource($quotationForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QuotationForm $quotationForm)
    {
        abort_if(Gate::denies('quotation_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuotationFormResource($quotationForm->load(['user']));
    }

    public function update(UpdateQuotationFormRequest $request, QuotationForm $quotationForm)
    {
        $quotationForm->update($request->all());

        return (new QuotationFormResource($quotationForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QuotationForm $quotationForm)
    {
        abort_if(Gate::denies('quotation_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
