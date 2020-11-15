<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTransferRequest;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Models\PaymentMethod;
use App\Models\Permission;
use App\Models\Transfer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TransfersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfers = Transfer::all();

        return view('admin.transfers.index', compact('transfers'));
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.transfers.create', compact('payment_methods', 'permissions'));
    }

    public function store(StoreTransferRequest $request)
    {
        $transfer = Transfer::create($request->all());
        $transfer->permissions()->sync($request->input('permissions', []));

        if ($request->input('attachment', false)) {
            $transfer->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $transfer->id]);
        }

        return redirect()->route('admin.transfers.index');
    }

    public function edit(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $transfer->load('payment_method', 'permissions');

        return view('admin.transfers.edit', compact('payment_methods', 'permissions', 'transfer'));
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

        return redirect()->route('admin.transfers.index');
    }

    public function show(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->load('payment_method', 'permissions');

        return view('admin.transfers.show', compact('transfer'));
    }

    public function destroy(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferRequest $request)
    {
        Transfer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('transfer_create') && Gate::denies('transfer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Transfer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
