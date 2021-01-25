<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\ItemInvoiceRelations;
use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use DataTables;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Modules\Sales\Entities\ProposalsItem;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InvoicesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all();

        // $permissions = Permission::get();

        return view('finance::admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereHas('accountDetail')->get()->pluck('accountDetail.fullname', 'id');
        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        return view('finance::admin.invoices.create', compact('users','ProposalsItem','taxRates'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $total_tax=$request->total_tax ? array_sum($request->total_tax) : 0;
            $after_discount=$request->after_discount ? $request->after_discount : 0;
            $total=$request->total ? $request->total : 0;
            $discount_percent=$request->discount_percent ? $request->discount_percent : 0;
            $request->merge(['total_cost_price'=>$total,'total_tax'=>$total_tax,'after_discount'=>$after_discount,'discount_percent'=>$discount_percent]);
            $invoice = Invoice::create($request->only([
                'reference_no',
                'subject',
                'module',
                'currency',
                'module_id',
                'status',
                'user_id',
                'invoice_validity',
                'materials_supply_delivery',
                'warranty',
                'prices',
                'maintenance_service_contract',
                'payment_terms',
                'notes',
                'expire_date',
                'invoice_date',
                'total_tax',
                'total_cost_price',
                'adjustment',
                'discount_percent',
                'after_discount',
                'discount_total',
            ]));

            foreach ($request->items as $key => $value) {
                $total_taxitem=0;
                if (isset($value['tax'])) {
                    # code...
                    $taxRates = TaxRate::whereIN('id',$value['tax'])->pluck('rate_percent');
                    if(!empty($taxRates)){
                        foreach ($taxRates as $ratevalue) {
                            $total_taxitem=$total_taxitem+($value['unit_cost']* $value['total_qty'] * ($ratevalue / 100));
                        }
                    }
                }

                $newitem=ItemInvoiceRelations::create($value);
                $newitem->update([
                    'invoices_id'=>$invoice['id'],
                    'item_id'=>$value['saved_items_id'],
                ]);

                if($newitem && isset($value['tax'])){
                    foreach($value['tax'] as $newtax){
                        $addtaxes=new InvoiceItemTax;
                        $addtaxes->tax_cost=$invoice['id'];
                        $addtaxes->taxs_id=$newtax;
                        $addtaxes->invoices_id=$invoice['id'];
                        $addtaxes->item_id=$newitem->id;
                        $addtaxes->save();
                    }

                }
            }


            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $invoice->id]);
            }

            DB::commit();
            return redirect()->route('finance.admin.invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
//             dd($e);
            return redirect()->back();
        }

    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $datamodule=$invoice->module=="opportunities" || $invoice->module=="client" ?($invoice->module=="opportunities" ? $data=Opportunity::all()->pluck('name', 'id') : $data=Client::all()->pluck('name', 'id')) : null;
        $users = User::whereHas('accountDetail')->get()->pluck('accountDetail.fullname', 'id');
        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        return view('finance::admin.invoices.edit', compact('users','ProposalsItem','taxRates','invoice','datamodule'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {

        DB::beginTransaction();

        try {
            $total_tax=$request->total_tax ? array_sum($request->total_tax) : 0;
            $after_discount=$request->after_discount ? $request->after_discount : 0;
            $total=$request->total ? $request->total : 0;
            $discount_percent=$request->discount_percent ? $request->discount_percent : 0;
            $request->merge(['total_cost_price'=>$total,'total_tax'=>$total_tax,'after_discount'=>$after_discount,'discount_percent'=>$discount_percent]);
            // dd($request->all(),$request->item_relation_id,isset($request->item_relation_id),ItemInvoiceRelations::whereIn('id',$request->item_relation_id)->get());
            $invoice->update($request->only([
                'reference_no',
                'subject',
                'module',
                'currency',
                'module_id',
                'status',
                'user_id',
                'invoice_validity',
                'materials_supply_delivery',
                'warranty',
                'prices',
                'maintenance_service_contract',
                'payment_terms',
                'notes',
                'expire_date',
                'invoice_date',
                'total_tax',
                'total_cost_price',
                'adjustment',
                'discount_percent',
                'after_discount',
                'discount_total',
            ]));


            if(isset($request->item_relation_id)){

                $deleteold=ItemInvoiceRelations::whereIn('id',$request->item_relation_id)->forceDelete();
            }

            foreach ($request->items as $key => $value) {
                $total_taxitem=0;
                if (isset($value['tax'])) {
                    # code...
                    $taxRates = TaxRate::whereIN('id',$value['tax'])->pluck('rate_percent');
                    if(!empty($taxRates)){
                        foreach ($taxRates as $ratevalue) {
                            $total_taxitem=$total_taxitem+($value['unit_cost']* $value['total_qty'] * ($ratevalue / 100));
                        }
                    }
                }


                $newitem=ItemInvoiceRelations::create($value);
                $newitem->update([
                    'invoices_id'=>$invoice['id'],
                    'item_id'=>$value['saved_items_id'],
                ]);

                if($newitem && isset($value['tax'])){
                    foreach($value['tax'] as $newtax){
                        $addtaxes=new InvoiceItemTax;
                        $addtaxes->tax_cost=$invoice['id'];
                        $addtaxes->taxs_id=$newtax;
                        $addtaxes->invoices_id=$invoice['id'];
                        $addtaxes->item_id=$newitem->id;
                        $addtaxes->save();
                    }

                }
            }


            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $invoice->id]);
            }

            DB::commit();
            return redirect()->route('finance.admin.invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back();
        }


    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        return view('finance::admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('invoice_create') && Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Invoice();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getmodule(Request $request)
    {
        $ajaxrequest="getmodule";
        if($request->id=="opportunities"){
            $data=Opportunity::all()->pluck('name', 'id');
            $datataype=$request->id;
        }elseif ($request->id=="client") {
            $data=Client::all()->pluck('name', 'id');
            $datataype=$request->id;
        }
        if($request->id != null){

            $loadview=view('finance::admin.invoices.ajaxload', compact('data','datataype','ajaxrequest'))->render();
        }else{
            $loadview="";
        }
        return response()->json($loadview, Response::HTTP_CREATED);


    }
    /**
     * get invoice item by id
     * **/
    public function get_item_by_id(Request $request)
    {
        if($request->id != null){

            $item = ProposalsItem::find($request->id);
            $item->setAttribute('group_name', (!empty($item->customer_group) ? $item->customer_group->name : null));
            $item->setAttribute('taxname' , (!empty($item->taxes) ? $item->taxes->name : null));
            $item->setAttribute('taxrate' , (!empty($item->taxes) ? $item->taxes->rate_percent : null));
            $item->setAttribute('description' , strip_tags($item->description));

            return response()->json($item, Response::HTTP_CREATED);
        }else{

            return response()->json(null,500);
        }
    }
    /**
     * get taxes
     * **/
    public function get_taxes_ajax(Request $request){
        $taxRates = TaxRate::all();
        return response()->json($taxRates, Response::HTTP_CREATED);
    }
}
