<?php


namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Http\Requests\Destroy\MassDestroyProposalsItemRequest;
use Modules\Sales\Http\Requests\Store\StoreProposalsItemRequest;
use Modules\Sales\Http\Requests\Update\UpdateProposalsItemRequest;
use Modules\Sales\Entities\Proposal;
use Modules\Sales\Entities\ProposalsItem;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Gate;
use Modules\MaterialsSuppliers\Entities\CustomerGroup;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProposalsItemsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proposals_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $customerGroups = CustomerGroup::all();
        $proposalsItems = ProposalsItem::all();

        // $proposals = Proposal::get();

        return view('sales::admin.proposalsItems.index', compact('proposalsItems', 'customerGroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('proposals_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $customerGroups = CustomerGroup::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $taxRates = TaxRate::all()->pluck('rate_percent', 'id');
        return view('sales::admin.proposalsItems.create', compact('customerGroups','taxRates'));
    }

    public function store(StoreProposalsItemRequest $request)
    {
        // dd($request);
        //convert taxes to json
        $sub_total = $request['unit_cost'] * $request['quantity'];
        $request['total_cost_price'] = $sub_total;
        if(!empty($request->margin)){

            $request['selling_price'] = $sub_total + ($sub_total * ($request->margin/100));
        }
        $proposalsItem = ProposalsItem::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proposalsItem->id]);
        }

        return redirect()->route('sales.admin.proposals-items.index');
    }

    public function edit(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerGroups = CustomerGroup::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proposalsItem->load('proposals');
        $taxRates = TaxRate::all()->pluck('rate_percent', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('sales::admin.proposalsItems.edit', compact('customerGroups', 'proposalsItem','taxRates'));
    }

    public function update(UpdateProposalsItemRequest $request, ProposalsItem $proposalsItem)
    {
        $sub_total = $request['unit_cost'] * $request['quantity'];
        $request['total_cost_price'] = $sub_total;
        if(!empty($request->margin)){

            $request['selling_price'] = $sub_total + ($sub_total * ($request->margin/100));
        }
        $proposalsItem->update($request->all());

        return redirect()->route('sales.admin.proposals-items.index');
    }

    public function show(ProposalsItem $proposalsItem)
    {
        abort_if(Gate::denies('proposals_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposalsItem->load('proposals');

        return view('sales::admin.proposalsItems.show', compact('proposalsItem'));
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

        return response()->json(['id' => $media->id, 'url' => $media->getUrl(),'media'=>$media], Response::HTTP_CREATED);
    }
}
