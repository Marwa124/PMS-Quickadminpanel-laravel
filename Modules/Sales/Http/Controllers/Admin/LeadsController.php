<?php

namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Modules\Sales\Entities\Call;
use Modules\Sales\Entities\Country;
use Modules\Sales\Entities\Finalresult;
use Modules\Sales\Mail\Reminder;
use App\Imports\LeadsImport;
use Modules\Sales\Entities\Lead;
use App\Models\User;
use Modules\HR\Entities\AccountDetail;
use Modules\Sales\Entities\LeadUsers;
use Modules\Sales\Entities\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Auth;
use Modules\Sales\Http\Requests\Destroy\MassDestroyLeadRequest;
use Modules\Sales\Http\Requests\Store\AssignLeadRequest;
use Symfony\Component\HttpFoundation\Response;
class LeadsController extends Controller
{



    public function addSheet(){


        return view('leadupload');
    }


    public function processSheet(Request $request)
    {
        if ($request->file != null) { {
            $extension = strtolower($request->file->getClientOriginalExtension());
            if (in_array($extension, ['csv', 'xls', 'xlsx'])) {


                if (Excel::import(new LeadsImport(), request()->file('file'))) {



                    return back();

                }
                else {
                    return back();
                }
            } else {
                return back();
            }
        }
        } else {
            return back();
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::connection('mysql2')->table('tbl_users')->get();
        $types = Type::all();
        $codes = Country::all();
        $users = User::with('accountDetail')->get();
        // dd($users->first());
        return view('sales::admin.leads.index',compact('users','types','codes'));
    }


    public function getData(Request $request)
    {
 
        if ($request->ajax()) {

            $leads = Lead::with('type','firstCall','secondCall','secondassign','addby')->select('leads.*');
            // dd($leads);
                    $company = (!empty($request->get('company'))) ? ($request->get('company')) : ('');
                    if($company){
                     $leads->where('leads.company','like', '%' .$company. '%');
                    }
                    if(!empty($request->get('created_at'))){
                        $leads->whereDate('leads.created_at',$request->get('created_at'));
                    }
                    if(!empty($request->get('type'))){
                        $leads->where('leads.type_id',$request->get('type'));
                    }
                    if(!empty($request->get('product'))){
                        $leads->where('leads.product','like', '%' .$request->get('product'). '%');
                    }
                    if(!empty($request->get('client'))){
                        $leads->where('leads.client_name','like', '%' .$request->get('client'). '%');
                    }
                    if(!empty($request->get('url'))){
                        $leads->where('leads.site_url','like', '%' .$request->get('url'). '%');
                    }
                    if(!empty($request->get('phone_1'))){
                        $leads->where('leads.phone1','like', '%' .$request->get('phone_1'). '%');
                    }
                    if(!empty($request->get('phone_2'))){
                        $leads->where('leads.phone2','like', '%' .$request->get('phone_2'). '%');
                    }
                    if(!empty($request->get('email'))){
                        $leads->where('leads.phone2','like', '%' .$request->get('email'). '%');
                    }
                    if(!empty($request->get('callby'))){
                        $q=$request->get('callby');
                        $leads->whereHas('firstCall', function($query) use($q)
                        {
                            $query->where('call_by', 'like', '%' .$q. '%');
                        });
                    }
                    if(!empty($request->get('way_of_comm'))){
                        $leads->where('leads.way_of_communication','like', '%' .$request->get('way_of_comm'). '%');
                    }
                    if(!empty($request->get('contacted'))){
                        $leads->whereDate('leads.contacted_date',$request->get('contacted'));
                    }
                    if(!empty($request->get('contacedresult'))){
                        $leads->where('leads.contracted','like', '%' .$request->get('contacedresult'). '%');
                    }
                    if(!empty($request->get('assign_1_search'))){
                        $q=$request->get('assign_1_search');
                        $leads->whereHas('addby', function($query) use($q)
                        {
                            $query->where('fullname', 'like', '%' .$q. '%');
                        });
                    }
                    if(!empty($request->get('prioritysearch'))){
                        $leads->where('leads.priority',$request->get('prioritysearch'));
                    }

                    return DataTables::of($leads)
                    ->addIndexColumn()
                    // ->editColumn('assign', function ($request) { 
                    //      $requestActions = '';
                    //    return $requestActions;
                    //      }) 
                         ->editColumn('actions', function($request){
                            $actions =' <form class="text-center" action="'.route('sales.admin.leads.destroy',$request->id).'" method="post">
                            <a href="'.route('sales.admin.leads.edit',$request->id).'" calss="leads_edit" data-id="'.$request->id.'" data-toggle="modal" data-target="#exampleModal" 
                            data-client_id_on_pms="'.$request->client_id_on_pms.'" 
                            data-type_id="'.$request->type_id.'"
                            data-product="'.$request->product.'" 
                            data-company="'.$request->company.'" 
                            data-notes="'.$request->notes.'" 
                            data-site_url="'.$request->site_url.'" 
                            data-phone1="'.$request->phone1.'"
                            data-phone2="'.$request->phone2.'" 
                            data-email="'.$request->email.'" 
                            data-way_of_communication="'.$request->way_of_communication.'"
                            data-contacted_date="'.$request->contacted_date.'" 
                            data-next_action_date="'.$request->next_action_date.'"
                            data-priority="'.$request->priority.'" 
                            data-client_name="'.$request->client_name.'" 
                            data-contracted="'.$request->contracted.'" 
                            data-action="'.route('sales.admin.leads.update',$request->id).'" 
                            ><i class="fas fa-edit"></i></a>
                            <a href="'.route('sales.admin.calls.create','id='.$request->id).'"><i class="fas fa-phone-volume"></i></a>
                            <a href="'.route('sales.admin.convert.to.oppurtinuty',$request->id).'"><i class="fas fa-user"></i></a>
    
                            '.csrf_field().'
                            '.
                                method_field("DELETE").'
                            <button class="btn" type="submit" onsubmit="return confirm('.trans('global.areYouSure').');"><i style="color:#cd0a0a" class="fas fa-trash"  ></i></button>
                            </form>';
                            return $actions;
                        })
                        ->editColumn('created_at', function ($request) {
                            return \Carbon\Carbon::parse($request->created_at)->toDateString() ?? '';
                         })
                        ->editColumn('type', function ($request) {
                            
                            return $request->type() && $request->type->name ?  $request->type->name  : '';
                         })
                       
                         ->editColumn('client_name', function ($request) {
                            return '<a href="'.route('sales.admin.leads.show',$request->id).'">'.$request->client_name.'</a>';
                        })
                        ->editColumn('secondCall', function ($request) {
                            return $request->secondCall &&  $request->secondCall->call_by ?  $request->secondCall->call_by : '';
                        })
                        ->editColumn('firstCall', function ($request) {
                            $data = $request->firstCall && $request->firstCall->call_by  ? $request->firstCall->call_by  : '';
                            return $data;
                        })
                        ->editColumn('addby', function ($request) {
                            $data = $request->addby && $request->addby->fullname ? $request->addby->fullname : '';
                             return $data;
                            // return '<a data-toggle="modal" data-target="#modal_first_assign" href="#">' . $data. '</a>';
                         })
                        ->editColumn('secondassign', function ($request) {
                            // dd($request->secondassign);
                            $data =$request->secondassign && $request->secondassign->leaduser ? $request->secondassign->leaduser->fullname : '';
                             return $data;
                         })
                        // ->editColumn('firstCall_result', function ($request) {
                        //     $data = $request->firstCallResult && $request->firstCallResult->name ? $request->firstCallResult->name : '';
                        //     return $data;
                        // })
                        
                        ->rawColumns(['created_at','type','Client_Name','firstCall','secondassign','secondCall','addby','2st_assgin','actions'])
                        ->escapeColumns([])
                        ->make(true);
                        // dd($xyz);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();
        $codes = Country::all();
        return view('sales::admin.leads.create',compact('types','codes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            $data = [
                'type_id' => $request->type_id,
                'product' => $request->product,
                'company' => $request->company,
                'site_url' => $request->site_url,
                'phone1' => ($request->phone1 != '') ? $request->country_code. $request->phone1 : '',
                'phone2' => ($request->phone2 != '') ? $request->country_code. $request->phone2 : '',
                'email' => $request->email,
                'way_of_communication' => $request->way_of_communication,
                'contacted_date' => $request->contacted_date,
                'notes' => $request->notes,
                'next_action_date' => $request->next_action_date,
                'priority' => $request->priority,
                'client_name' => $request->client_name,
                'contracted' => $request->contracted,
                'added_by'  => Auth::user()->id
            ];

            Lead::create($data);

            DB::commit();
            return redirect()->route('sales.admin.leads.index');

        } catch (\Exception $e) {
            // dd($e);
            echo 'Process Failed';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try{
       
            $lead = Lead::findOrFail($id);
            $type = Type::where('id',$lead->type_id)->first();
            $firstCall = Call::where([
                ['lead_id',$id],
                ['call','first'],
            ])->get();
            $secondCall = Call::where([
                ['lead_id',$id],
                ['call','second'],
            ])->get();
            $finalresult = Finalresult::where('lead_id' , $id)->get();


        return view('sales::admin.leads.show',compact('lead','firstCall','secondCall','finalresult','type'));
      } catch (\Exception $e) {
          echo 'Not found';
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $codes = Country::all();
        $lead = Lead::findOrFail($id);
        return view('sales::admin.leads.edit', compact('lead','types','codes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $lead = Lead::findOrFail($id);

            // $id = DB::connection('mysql2')->table('tbl_leads')->where('leads_id', \DB::raw("(select max(`leads_id`) from tbl_leads)"))->first();
            //
            // $id = $id->leads_id+1;
            $data = [
                'client_id_on_pms' => $id,
                'type_id' => $request->type_id,
                'product' => $request->product,
                'company' => $request->company,
                'site_url' => $request->site_url,
                'phone1' => ($request->phone1 != '') ? $request->phone1 : '',
                'phone2' => ($request->phone2 != '') ? $request->phone2 : '',
                'email' => $request->email,
                'way_of_communication' => $request->way_of_communication,
                'contacted_date' => $request->contacted_date,
                'notes' => $request->notes,
                'next_action_date' => $request->next_action_date,
                'priority' => $request->priority,
                'client_name' => $request->client_name,
                'contracted' => $request->contracted,
            ];

            $lead->update($data);


            // DB::connection('mysql2')->table('tbl_leads')->where('leads_id', $lead->client_id_on_pms)->update([
            //     'leads_id' =>  $lead->client_id_on_pms,
            //     'type_id' => $data['type_id'],
            //     'product' => $data['product'],
            //     'company_name' => $data['company'],
            //     'site_url' => $data['site_url'],
            //     'phone' => $data['phone1'],
            //     'phone2' => $data['phone2'],
            //     'email' => $data['email'],
            //     'way_of_communication' => $data['way_of_communication'],
            //     'notes' => $data['notes'],
            //     'priority' => $data['priority'],
            //     'lead_name' => $data['client_name'],
            //     'contracted' => $data['contracted'],
            //     'next_action_date' => $data['next_action_date'],
            // ]);



            DB::commit();
            return redirect()->route('sales.admin.leads.index');



        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $finalresult = Finalresult::where('lead_id',$id)->delete();
            $call = Call::where('lead_id',$id)->delete();
            $lead = Lead::where('id', $id)->delete();

            // DB::connection('mysql2')->table('tbl_leads')->where('leads_id', $id)->delete();


            DB::commit();
            return redirect()->route('sales.admin.leads.index');

        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }




    //   public function assignLeadsView(){
    //     $leads = Lead::all();
    //     $users = DB::connection('mysql2')->table('tbl_users')->get();

    //     return view('sales::admin.assign.create',compact('leads','users'));
    //   }



          public function assignLeadsProcess(AssignLeadRequest $request){

            //   try
            //   {
               

                  foreach (request('ids') as $lead){
                      $check = LeadUsers::where('lead_id',$lead)->where('user_id',$request->user)->first();
                      if($check == null){
                          LeadUsers::create([
                             'user_id' => $request->user,
                             'lead_id' => $lead,
                          ]);
                      }
                  }
                  return response(null, Response::HTTP_NO_CONTENT);
            //       return redirect(route('sales.admin.leads.index'));
            //   }
            //   catch (\Exception $e){
            //       return back();
            //   }
          }


          public function convert_opportunity($id){
            try{
              $lead = DB::connection('mysql2')->table('tbl_leads')->where('leads_id', $id)->first();
              if($lead == null){
                $lead = Lead::findOrFail($id);

                DB::connection('mysql2')->table('tbl_leads')->insert([
                  'leads_id' => $lead->client_id_on_pms ?? null,
                  'type_id' => $lead->type_id ?? null,
                  'product' => $lead->product ?? null,
                  'company_name' => $lead->company  == null ? $lead->client_name : null,
                  'site_url' => $lead->site_url ?? null,
                  'phone' => $lead->phone1 ?? null,
                  'phone2' => $lead->phone2 ?? null,
                  'email' => $lead->email ?? null,
                  'way_of_communication' => $lead->way_of_communication ?? null,
                  'notes' => $lead->notes ?? null,
                  'priority' => $lead->priority ?? null,
                  'lead_name' => $lead->client_name ?? null,
                  'contracted' => $lead->contracted ?? null,
                  'next_action_date' => $lead->next_action_date ?? null,
              ]);
              }
              header('Location:http://pms.onetecgroup.com/admin/leads/leads_details/'.$id );

            } catch (\Exception $e) {
                echo 'Not found';
            }
          }



          public function reminder(){
            $leads = Lead::all();
            foreach ($leads as $lead) {
              $calls = Call::where('lead_id',$lead->id)->get();
              if(count($calls) > 0){
                foreach ($calls as $call) {
                  if(date('Y-m-d',strtotime($lead->next_action_date)) == date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days'))   || date('Y-m-d',strtotime($call->next_action_date)) == date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days'))){
                        if($lead->added_by != null){
                            $user = DB::connection('mysql2')->table('tbl_users')->where('user_id', $lead->added_by)->first();
                            Mail::to($user->email)->send(new Reminder($lead->client_name));
                        }
                       $users = LeadUsers::where('lead_id',$lead->id)->pluck('user_id');
                       if(count($users) > 0){
                         foreach ($users as $user) {
                             $sales_agent = DB::connection('mysql2')->table('tbl_users')->where('user_id', $user)->first();
                             Mail::to($sales_agent->email)->send(new Reminder($lead->client_name));
                         }
                       }


                  }
                }
              }
              else{

                if(date('Y-m-d',strtotime($lead->next_action_date)) == date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days'))){
                  if($lead->added_by != null){
                      $user = DB::connection('mysql2')->table('tbl_users')->where('user_id', $lead->added_by)->first();
                      Mail::to($user->email)->send(new Reminder($lead->client_name));
                  }
                 $users = LeadUsers::where('lead_id',$lead->id)->pluck('user_id');
                 if(count($users) > 0){
                   foreach ($users as $user) {
                       $sales_agent = DB::connection('mysql2')->table('tbl_users')->where('user_id', $user)->first();
                       Mail::to($sales_agent->email)->send(new Reminder($lead->client_name));
                   }
                 }
                }
              }
            }
          }


          public function massDestroy(MassDestroyInterestedInRequest $request)
          {
              Lead::whereIn('id', request('ids'))->delete();
      
              return response(null, Response::HTTP_NO_CONTENT);
          }
}
