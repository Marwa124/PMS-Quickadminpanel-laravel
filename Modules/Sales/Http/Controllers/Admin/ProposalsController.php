<?php


namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Http\Requests\Destroy\MassDestroyProposalRequest;
use Modules\Sales\Http\Requests\Store\StoreProposalRequest;
use Modules\Sales\Http\Requests\Update\UpdateProposalRequest;
use Modules\Sales\Http\Requests;
use Modules\Sales\Entities\ProposalsItem;
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

        $permissions = Permission::get();

        return view('sales::admin.proposals.index', compact('proposals', 'permissions'));
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
        // DB::beginTransaction();

        // try {
            
        //     DB::commit();
        //     return redirect()->route('sales.admin.leads.index');

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back();
        // }
        // dd($request->all());
//   "porposal_item" => "1"
//   "item_name" => null
//   "item_desc" => null
//   "group_name" => null
//   "quantity" => null
//   "unit" => null
//   "brand" => null
//   "part" => null
//   "unit_cost" => null
//   "total_cost_price" => null
//   "margin" => null
//   "delivery" => null
//   "new_itmes_id" => null
//   "" => "0"
//   "adjustment" => "0"


// 'total_tax',
// 'total_cost_price',
// 'tax',

// 'date_sent',
// 'proposal_deleted',
// 'emailed',
// 'show_client',
// 'convert',
// 'convert_module',
// 'module_id',

// 'discount_type',
// 'discount_percent',
// 'after_discount',
// 'discount_total',
// 'adjustment',
// 'show_quantity_as',
// 'allowed_cmments',
// 'proposal_validity',
// 'materials_supply_delivery',
// 'warranty',
// 'prices',
// 'user_id',
// 'payment_terms',
        $tax=$request->tax ? json_encode($request->tax) : '';
        $total_tax=$request->total_tax ? array_sum($request->total_tax) : 0;
        $after_discount=$request->after_discount ? $request->after_discount : 0;
        $total=$request->total ? $request->total : 0;
        $discount_percent=$request->discount_percent ? $request->discount_percent : 0;
        $request->merge(['tax'=>$tax,'total_tax'=>$total_tax,'after_discount'=>$after_discount,'total'=>$total,'discount_percent'=>$discount_percent]);

        dd($request->all());
        $proposal = Proposal::create($request->only([
        'reference_no',
        'subject',
        'module',
        'currency',
        'module_id',
        // 'status',
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
        'tax',
        'adjustment',
        'discount_percent',
        ])->all());
        // $request->only('username', 'password')
        
        $proposal->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proposal->id]);
        }

        return redirect()->route('sales.admin.proposals.index');
    }

    public function edit(Proposal $proposal)
    {
        abort_if(Gate::denies('proposal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $proposal->load('permissions');

        return view('sales::admin.proposals.edit', compact('permissions', 'proposal'));
    }

    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        $proposal->update($request->all());
        $proposal->permissions()->sync($request->input('permissions', []));

        return redirect()->route('sales.admin.proposals.index');
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
