<?php


namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Http\Requests\Destroy\MassDestroyProposalRequest;
use Modules\Sales\Http\Requests\Store\StoreProposalRequest;
use Modules\Sales\Http\Requests\Update\UpdateProposalRequest;
use Modules\Sales\Http\Requests;
use Modules\Sales\Entities\ProposalsItem;
use Modules\Sales\Entities\ProposalItemTax;
use Modules\Sales\Entities\ItemPorposalRelations;
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
        $request->merge(['total_cost_price'=>$total,'total_tax'=>$total_tax,'after_discount'=>$after_discount,'discount_percent'=>$discount_percent]);
        $proposal = Proposal::create($request->only([
        'reference_no',
        'subject',
        'module',
        'currency',
        'module_id',
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
        $request->merge(['total_cost_price'=>$total,'total_tax'=>$total_tax,'after_discount'=>$after_discount,'discount_percent'=>$discount_percent]);
        // dd($request->all(),$request->item_relation_id,isset($request->item_relation_id),ItemPorposalRelations::whereIn('id',$request->item_relation_id)->get());
        $proposal->update($request->only([
        'reference_no',
        'subject',
        'module',
        'currency',
        'module_id',
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

    

            $deleteold=ItemPorposalRelations::whereIn('id',$request->item_relation_id)->forceDelete();
        
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

        $proposal->load('permissions');

        return view('sales::admin.proposals.show', compact('proposal'));
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
}
