<?php

namespace Modules\MaterialsSuppliers\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
// use Modules\MaterialsSuppliers\Http\Requests\Destroy\MassDestroySupplierRequest;
// use Modules\MaterialsSuppliers\Http\Requests\Store\StoreSupplierRequest;
// use Modules\MaterialsSuppliers\Http\Requests\Update\UpdateSupplierRequest;
use Gate;
use Illuminate\Http\Request;
use Modules\MaterialsSuppliers\Entities\Supplier;
use Modules\MaterialsSuppliers\Http\Resources\Admin\SupplierResource;
use Modules\Sales\Entities\ProposalsItem;
use Modules\Sales\Http\Resources\Admin\ProposalsItemResource;
use Symfony\Component\HttpFoundation\Response;

class ItemsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('supplier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new ProposalsItemResource(ProposalsItem::get());
        // return new ProposalsItemResource(ProposalsItem::with(['customer_group'])->get());
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create($request->all());

        return (new SupplierResource($supplier))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupplierResource($supplier->load(['customer_group', 'permissions']));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        $supplier->permissions()->sync($request->input('permissions', []));

        return (new SupplierResource($supplier))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
