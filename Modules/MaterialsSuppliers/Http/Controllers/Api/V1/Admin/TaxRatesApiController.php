<?php

namespace Modules\MaterialsSuppliers\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Modules\MaterialsSuppliers\Http\Requests\Destroy\MassDestroyTaxRateRequest;
use Modules\MaterialsSuppliers\Http\Requests\Store\StoreTaxRateRequest;
use Modules\MaterialsSuppliers\Http\Requests\Update\UpdateTaxRateRequest;
use Gate;
use Illuminate\Http\Request;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Modules\MaterialsSuppliers\Http\Resources\Admin\TaxRateResource;
use Symfony\Component\HttpFoundation\Response;


class TaxRatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_rate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxRateResource(TaxRate::get());
    }

    public function store(StoreTaxRateRequest $request)
    {
        dd($request->all());
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
