<?php


namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Http\Requests\Destroy\MassDestroyProposalRequest;
use Modules\Sales\Http\Requests\Store\StoreProposalRequest;
use Modules\Sales\Http\Requests\Store\CloneProposalRequest;
use Modules\Sales\Http\Requests\Update\UpdateProposalRequest;
use Modules\Sales\Http\Requests;
use Modules\Sales\Entities\ProposalsItem;
use Modules\Sales\Entities\ProposalItemTax;
use Modules\Sales\Entities\ItemPorposalRelations;
use App\Models\Invoice;
use App\Models\InvoiceItemTax;
use App\Models\ItemInvoiceRelations;
use Modules\Finance\Http\Requests\Store\StoreInvoiceRequest;
use App\Models\Opportunity;
use App\Models\Client;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Modules\Sales\Entities\Proposal;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
class ProposalsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proposal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposals = Proposal::all();

        // $permissions = Permission::get();

        return view('sales::admin.proposals.index', compact('proposals'));
    }

    public function create()
    {
        abort_if(Gate::denies('proposal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereHas('accountDetail')->get()->pluck('accountDetail.fullname', 'id');
        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        return view('sales::admin.proposals.create', compact('users','ProposalsItem','taxRates'));
    }

    public function store(StoreProposalRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
        $total_tax=$request->total_tax ? array_sum($request->total_tax) : 0;
        $after_discount=$request->after_discount ? $request->after_discount : 0;
        $total=$request->total ? $request->total : 0;
        $discount_percent=$request->discount_percent ? $request->discount_percent : 0;
        $request->merge(['total_cost_price'=>$total,'total_tax'=>$total_tax,'after_discount'=>$after_discount,'discount_percent'=>$discount_percent,'convert'=>'No']);
        $proposal = Proposal::create($request->only([
        'reference_no',
        'subject',
        'module',
        'currency',
        'module_id',
        'convert',
        'status',
        'user_id',
        'proposal_validity',
        'materials_supply_delivery',
        'warranty',
        'prices',
        'maintenance_service_contract',
        'payment_terms',
        'notes',
        'expire_date',
        'proposal_date',
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

            $newitem=ItemPorposalRelations::create($value);
            $newitem->update([
                'proposals_id'=>$proposal['id'],
                'item_id'=>$value['saved_items_id'],
            ]);
       
            if($newitem && isset($value['tax'])){
                foreach($value['tax'] as $newtax){
                    $addtaxes=new ProposalItemTax;
                    $addtaxes->tax_cost=$proposal['id'];
                    $addtaxes->taxs_id=$newtax;
                    $addtaxes->proposals_id=$proposal['id'];
                    $addtaxes->item_id=$newitem->id;
                    $addtaxes->save();
                }

            }
        }


        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proposal->id]);
        }
        setActivity('proposal',$proposal->id,'Create proposal #','تم انشاء عرض الاقتراح#',$proposal->reference_no,$proposal->reference_no);
        DB::commit();
        return redirect()->route('sales.admin.proposals.index');

        } catch (\Exception $e) {
            DB::rollback();
             dd($e);
            return redirect()->back();
        }

    }

    public function edit(Proposal $proposal)
    {
        abort_if(Gate::denies('proposal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $datamodule=$proposal->module=="opportunities" || $proposal->module=="client" ?($proposal->module=="opportunities" ? $data=Opportunity::all()->pluck('name', 'id') : $data=Client::all()->pluck('name', 'id')) : null;
        $users = User::whereHas('accountDetail')->get()->pluck('accountDetail.fullname', 'id');
        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        return view('sales::admin.proposals.edit', compact('users','ProposalsItem','taxRates','proposal','datamodule'));
    }

    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {

        DB::beginTransaction();

        try {
        $total_tax=$request->total_tax ? array_sum($request->total_tax) : 0;
        $after_discount=$request->after_discount ? $request->after_discount : 0;
        $total=$request->total ? $request->total : 0;
        $discount_percent=$request->discount_percent ? $request->discount_percent : 0;
        $request->merge(['total_cost_price'=>$total,'status'=>'Waiting_approval','total_tax'=>$total_tax,'after_discount'=>$after_discount,'discount_percent'=>$discount_percent,'convert'=>'No']);
        // dd($request->all(),$request->item_relation_id,isset($request->item_relation_id),ItemPorposalRelations::whereIn('id',$request->item_relation_id)->get());
        $proposal->update($request->only([
        'reference_no',
        'subject',
        'module',
        'currency',
        'module_id',
        'convert',
        'status',
        'user_id',
        'proposal_validity',
        'materials_supply_delivery',
        'warranty',
        'prices',
        'maintenance_service_contract',
        'payment_terms',
        'notes',
        'expire_date',
        'proposal_date',
        'total_tax',
        'total_cost_price',
        'adjustment',
        'discount_percent',
        'after_discount',
        'discount_total',
        ]));

    
            if(isset($request->item_relation_id)){

                $deleteold=ItemPorposalRelations::whereIn('id',$request->item_relation_id)->forceDelete();
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

            
            $newitem=ItemPorposalRelations::create($value);
            $newitem->update([
                'proposals_id'=>$proposal['id'],
                'item_id'=>$value['saved_items_id'],
            ]);
       
            if($newitem && isset($value['tax'])){
                foreach($value['tax'] as $newtax){
                    $addtaxes=new ProposalItemTax;
                    $addtaxes->tax_cost=$proposal['id'];
                    $addtaxes->taxs_id=$newtax;
                    $addtaxes->proposals_id=$proposal['id'];
                    $addtaxes->item_id=$newitem->id;
                    $addtaxes->save();
                }

            }
        }


        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proposal->id]);
        }
        
        setActivity('proposal',$proposal->id,'Update proposal #','تم تعديل عرض الاقتراح#',$proposal->reference_no,$proposal->reference_no);
        DB::commit();
        return redirect()->route('sales.admin.proposals.index');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back();
        }

        
        
    }

    public function show(Proposal $proposal)
    {
        abort_if(Gate::denies('proposal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        $clients = Client::all();
        $projects = [];
        return view('sales::admin.proposals.show', compact('proposal','ProposalsItem','taxRates','clients','projects'));
    }

    public function destroy(Proposal $proposal)
    {
        abort_if(Gate::denies('proposal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposal->delete();

        return back();
    }

    public function massDestroy(MassDestroyProposalRequest $request)
    {
        Proposal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('proposal_create') && Gate::denies('proposal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Proposal();
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

            $loadview=view('sales::admin.proposals.ajaxload', compact('data','datataype','ajaxrequest'))->render();
        }else{
            $loadview="";
        }
        return response()->json($loadview, Response::HTTP_CREATED);

        
    }
    /**
     * get proposal item by id
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
     /**
     *change status of probosal ajax
     * **/ 
     public function changestatus(Request $request){
        $proposal = Proposal::findOrFail($request->id);
        if(!empty($proposal)){
            $proposal->update([
                'status'=>$request->status,
            ]);
        }
        setActivity('proposal',$proposal->id,'Change Status proposal #','تم تغير حالة العرض #',$proposal->reference_no,$proposal->reference_no);
        return response()->json(Response::HTTP_CREATED);
     }

     /** clone project  */
     public function cloneproposal(CloneProposalRequest $request,Proposal $proposal){
        DB::beginTransaction();

        try {
            
            //load relation of proposals
            $proposal->load('items','itemtaxs');
            //fill data with i need
            $newproposal = $proposal->replicate()->fill([
                'reference_no'=> generate_proposal_number(),
                'module'=>$request->module,
                'module_id'=>$request->module_id,
                'expire_date'=>$request->expire_date,
                'proposal_date'=>$request->proposal_date,
                ]);
                $newproposal->push();
                
                // load relation in new proposal 
                foreach($proposal->getRelations() as $relation => $items){
                    
                    foreach($items as $item){
                        
                        if($relation == 'items'){

                            $extra_attributes = Arr::except($item->toArray()['pivot'],['proposals_id','id']);
                            //new proposalitem relation
                            $newitem=ItemPorposalRelations::create($extra_attributes);
                            $newitem->update([
                                'proposals_id'=>$newproposal['id'],
                            ]);
                            //find taxes of proposal item relation 
                            $findtaxes=ProposalItemTax::where([['item_id',$item->pivot['id']],['proposals_id',$proposal->id]])->get();
                            //add tax of item
                            if($newitem && !empty($findtaxes)){
                                foreach($findtaxes as $newtax){
                                    $addtaxes=new ProposalItemTax;
                                    $addtaxes->tax_cost=$newtax['tax_cost'];
                                    $addtaxes->taxs_id=$newtax['taxs_id'];
                                    $addtaxes->proposals_id=$newproposal['id'];
                                    $addtaxes->item_id=$newitem->id;
                                    $addtaxes->save();
                                }
                
                            }
                        }
                       
                    }
                    
                   
                }
                setActivity('proposal',$proposal->id,'Change Status proposal #','تم تغير حالة العرض #',$proposal->reference_no,$proposal->reference_no);       
        // setActivity('proposal',$newproposal->id,'Change Status proposal #',$newproposal->reference_no);  
        DB::commit();
        return redirect()->route('sales.admin.proposals.index');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back();
        }
   
     }

    /*** History od Project  */

    public function historyproposal(Proposal $proposal){
        return view('sales::admin.proposals.history', compact('proposal'));
    }


    public function invoice(StoreInvoiceRequest $request,Proposal $proposal)
    {
    //    dd($request->all(),$proposal);
        DB::beginTransaction();

        try {
            $total_tax = $request->total_tax ? array_sum($request->total_tax) : 0;
            $after_discount = $request->after_discount ? $request->after_discount : 0;
            $total = $request->total ? $request->total : 0;
            $discount_percent = $request->discount_percent ? $request->discount_percent : 0;
            $request->merge(['total_cost_price' => $total, 'total_tax' => $total_tax, 'after_discount' => $after_discount, 'discount_percent' => $discount_percent]);


            $data = [
                'reference_no' => $request->reference_no,
                'recurring' => $request->recurring,
                'recur_start_date' => $request->recur_start_date,
                'recur_end_date' => $request->recur_end_date,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'notes' => $request->notes,
                'total_tax' => $request->total_tax,
                'client_id' => $request->client_id,
                'project_id' => $request->project_id,
                'adjustment' => $request->adjustment,
                'discount_status' => $request->discounts,
                'discount_total' => $request->discount_total,
                'before_discount' => $request->subtotal,
                'after_discount' => $request->after_discount,
                'total_amount' => floatval($request->total),
                'discount_percent' => intval($request->discount_percent),
                'user_id' => $request->user_id,
                'currency' => 'EGP',
            ];


            $invoice = Invoice::create($data);
            if ($request->items) {

                foreach ($request->items as $key => $value) {
                    $total_taxitem = 0;
                    if (isset($value['tax'])) {
                        # code...
                        $taxRates = TaxRate::whereIN('id', $value['tax'])->pluck('rate_percent');
                        if (!empty($taxRates)) {
                            foreach ($taxRates as $ratevalue) {
                                $total_taxitem = $total_taxitem + ($value['unit_cost'] * $value['total_qty'] * ($ratevalue / 100));
                            }
                        }
                    }

                    $newitem = ItemInvoiceRelations::create($value);
                    $newitem->update([
                        'invoices_id' => $invoice['id'],
                        'item_id' => $value['saved_items_id'],
                    ]);

                    if ($newitem && isset($value['tax'])) {
                        foreach ($value['tax'] as $index => $newtax) {
                            if(is_array($request->total_tax)){
                                $taxcost=$request->total_tax[$index] ? $request->total_tax[$index]: $request->total_tax;
                            }else{
                                $taxcost=$request->total_tax;
                            }
                            $addtaxes = new InvoiceItemTax;
                            $addtaxes->tax_cost = $taxcost ;
                            $addtaxes->taxs_id = $newtax;
                            $addtaxes->invoices_id = $invoice['id'];
                            $addtaxes->item_id = $newitem->id;
                            $addtaxes->save();
                        }

                    }
                }
            }


            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $invoice->id]);
            }

            /***************************************after save set invoice at proposal***********************************************/ 
                if($invoice){

                    $proposal->update([
                        'convert'=>'Yes',
                        'convert_module'=>'invoice',
                        'convert_module_id'=>$invoice['id'],
                         ]);
                }

            setActivity('proposal',$proposal->id,'Create Invoice For Proposal #','انشاء فاتور للعرض  #',$proposal->reference_no,$proposal->reference_no);

            /***************************************after save set invoice at proposal***********************************************/ 

            DB::commit();
            return redirect()->route('finance.admin.invoices.show', $invoice->id);

        } catch (\Exception $e) {
            DB::rollback();
                        dd($e);
            return redirect()->back();
        }

    }
}
