<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProposalsItemRequest;
use App\Http\Requests\StoreProposalsItemRequest;
use App\Http\Requests\UpdateProposalsItemRequest;
use App\Models\Proposal;
use App\Models\ProposalsItem;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProposalsItemsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proposals_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposalsItems = ProposalsItem::all();

        $proposals = Proposal::get();

        return view('admin.proposalsItems.index', compact('proposalsItems', 'proposals'));
    }

    public function create()
    {
        abort_if(Gate::denies('proposals_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposals = Proposal::all()->pluck('reference_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.proposalsItems.create', compact('proposals'));
    }

    public function store(StoreProposalsItemRequest $request)
    {
        $proposalsItem = ProposalsItem::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proposalsItem->id]);
        }

        return redirect()->route('admin.proposals-items.index');
    }

    public function edit(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposals = Proposal::all()->pluck('reference_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proposalsItem->load('proposals');

        return view('admin.proposalsItems.edit', compact('proposals', 'proposalsItem'));
    }

    public function update(UpdateProposalsItemRequest $request, ProposalsItem $proposalsItem)
    {
        $proposalsItem->update($request->all());

        return redirect()->route('admin.proposals-items.index');
    }

    public function show(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposalsItem->load('proposals');

        return view('admin.proposalsItems.show', compact('proposalsItem'));
    }

    public function destroy(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposalsItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyProposalsItemRequest $request)
    {
        ProposalsItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('proposals_item_create') && Gate::denies('proposals_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProposalsItem();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
