<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProposalsItemRequest;
use App\Http\Requests\UpdateProposalsItemRequest;
use App\Http\Resources\Admin\ProposalsItemResource;
use App\Models\ProposalsItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProposalsItemsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proposals_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProposalsItemResource(ProposalsItem::with(['proposals'])->get());
    }

    public function store(StoreProposalsItemRequest $request)
    {
        $proposalsItem = ProposalsItem::create($request->all());

        return (new ProposalsItemResource($proposalsItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProposalsItemResource($proposalsItem->load(['proposals']));
    }

    public function update(UpdateProposalsItemRequest $request, ProposalsItem $proposalsItem)
    {
        $proposalsItem->update($request->all());

        return (new ProposalsItemResource($proposalsItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposalsItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
