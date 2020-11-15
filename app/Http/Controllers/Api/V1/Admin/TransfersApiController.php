<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Http\Resources\Admin\TransferResource;
use App\Models\Transfer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransfersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransferResource(Transfer::with(['payment_method', 'permissions'])->get());
    }

    public function store(StoreTransferRequest $request)
    {
        $transfer = Transfer::create($request->all());
        $transfer->permissions()->sync($request->input('permissions', []));

        if ($request->input('attachment', false)) {
            $transfer->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        return (new TransferResource($transfer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransferResource($transfer->load(['payment_method', 'permissions']));
    }

    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        $transfer->update($request->all());
        $transfer->permissions()->sync($request->input('permissions', []));

        if ($request->input('attachment', false)) {
            if (!$transfer->attachment || $request->input('attachment') !== $transfer->attachment->file_name) {
                if ($transfer->attachment) {
                    $transfer->attachment->delete();
                }

                $transfer->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
            }
        } elseif ($transfer->attachment) {
            $transfer->attachment->delete();
        }

        return (new TransferResource($transfer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
