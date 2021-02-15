<?php

namespace Modules\MaterialsSuppliers\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\MaterialsSuppliers\Http\Requests\Destroy\MassDestroyPurchaseRequest;
use Modules\MaterialsSuppliers\Http\Requests\Store\StorePurchaseRequest;
use Modules\MaterialsSuppliers\Http\Requests\Update\UpdatePurchaseRequest;
use App\Models\User;
use Modules\MaterialsSuppliers\Entities\Supplier;
use Gate;
use Illuminate\Http\Request;
use Modules\MaterialsSuppliers\Entities\Purchase;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Modules\MaterialsSuppliers\Http\Repository\PurchaseRepository;
use Modules\Sales\Entities\ProposalsItem;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PurchaseController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchases = Purchase::all();

        $suppliers = Supplier::get();

        $users = User::get();

        return view('materialssuppliers::admin.purchases.index', compact('purchases', 'suppliers', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('materialssuppliers::admin.purchases.create', compact('suppliers', 'users'));
    }

    public function store(StorePurchaseRequest $request, PurchaseRepository $purchase)
    {
        $purchase->createPurchase($request);
        dd($purchase->createPurchase($request));
        
        return response()->json(Response::HTTP_CREATED);
    }

    public function edit(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplierPurchase = $purchase->supplier()->select('id', 'name')->first();
        $userPurchase = $purchase->user->accountDetail()->select('fullname', 'user_id')->first();
        
        // $itemTaxesPurchase = [];
        $itemPurchase = $purchase->items()->get();
        $taxes = TaxRate::get();
        $itemTaxPurchase = [];
        $totalTaxPurchase = [];
        foreach ($itemPurchase as $value) {
            $itemTax = $purchase->itemtaxs->where('item_id',$value->id)->all();
            if ($itemTax) {
                foreach ($itemTax as $tax) {
                    $taxObj = TaxRate::find($tax->tax_id);
                    $taxval = $value->pivot->total * ($taxObj->rate_percent / 100);
                    array_push($totalTaxPurchase, [$taxval, $taxObj->name]);
                }
                
                array_push($itemTaxPurchase, [$value, $taxObj]);
            }
        }
        $value = '';
        $totalVal = [];
        foreach ($totalTaxPurchase as $indexVal) {
            if ($indexVal[1] == $value) {
                array_push($totalVal, ['name' => $indexVal[1], 'value' => $indexVal[0]]);
            }
            $value = $indexVal[1];
        }

        $fields = ['user', 'user_id', 'supplier_id'];
        $purchase = collect($purchase->toArray())->except($fields);

        return view('materialssuppliers::admin.purchases.edit',
            compact('supplierPurchase', 'userPurchase', 'itemPurchase', 'itemTaxPurchase', 'purchase', 'totalVal'));
    }


    public function update(UpdatePurchaseRequest $request, Purchase $purchase,  PurchaseRepository $repo)
    {
        // dd($request->all());
        $repo->updatePurchase($purchase, $request);
        // dd($repo->updatePurchase($purchase, $request));
        return response()->json(Response::HTTP_CREATED);
    }

    public function show(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->load('supplier', 'user', 'permissions');

        return view('materialssuppliers::admin.purchases.show', compact('purchase'));
    }

    public function destroy(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseRequest $request)
    {
        Purchase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('purchase_create') && Gate::denies('purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Purchase();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
