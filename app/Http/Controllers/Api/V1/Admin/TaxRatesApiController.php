<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxRateRequest;
use App\Http\Requests\UpdateTaxRateRequest;
use App\Http\Resources\Admin\TaxRateResource;
use App\Models\TaxRate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxRatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_rate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxRateResource(TaxRate::with(['permissions'])->get());
    }

    public function store(StoreTaxRateRequest $request)
    {
        $taxRate = TaxRate::create($request->all());
        $taxRate->permissions()->sync($request->input('permissions', []));

        return (new TaxRateResource($taxRate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TaxRate $taxRate)
    {
        abort_if(Gate::denies('tax_rate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxRateResource($taxRate->load(['permissions']));
    }

    public function update(UpdateTaxRateRequest $request, TaxRate $taxRate)
    {
        $taxRate->update($request->all());
        $taxRate->permissions()->sync($request->input('permissions', []));

        return (new TaxRateResource($taxRate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TaxRate $taxRate)
    {
        abort_if(Gate::denies('tax_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxRate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
