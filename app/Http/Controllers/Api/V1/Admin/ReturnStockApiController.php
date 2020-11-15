<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreReturnStockRequest;
use App\Http\Requests\UpdateReturnStockRequest;
use App\Http\Resources\Admin\ReturnStockResource;
use App\Models\ReturnStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReturnStockApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('return_stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReturnStockResource(ReturnStock::with(['supplier', 'user', 'permissions'])->get());
    }

    public function store(StoreReturnStockRequest $request)
    {
        $returnStock = ReturnStock::create($request->all());
        $returnStock->permissions()->sync($request->input('permissions', []));

        return (new ReturnStockResource($returnStock))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReturnStock $returnStock)
    {
        abort_if(Gate::denies('return_stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReturnStockResource($returnStock->load(['supplier', 'user', 'permissions']));
    }

    public function update(UpdateReturnStockRequest $request, ReturnStock $returnStock)
    {
        $returnStock->update($request->all());
        $returnStock->permissions()->sync($request->input('permissions', []));

        return (new ReturnStockResource($returnStock))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReturnStock $returnStock)
    {
        abort_if(Gate::denies('return_stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $returnStock->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
