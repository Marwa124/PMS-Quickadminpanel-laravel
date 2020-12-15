<?php

namespace App\Http\Controllers;

use App\Call;
use App\Imports\CallsImport;
use App\Lead;
use App\LeadUsers;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;


class CallsController extends Controller
{




    public function addSheet(){


        return view('callupload');
    }


    public function processSheet(Request $request)
    {
        if ($request->file != null) { {
            $extension = strtolower($request->file->getClientOriginalExtension());
            if (in_array($extension, ['csv', 'xls', 'xlsx'])) {


                if (Excel::import(new CallsImport(), request()->file('file'))) {



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
        return view('calls.index');
    }

    public function getData(Request $request)
    {


        if ($request->ajax()) {

          if(session()->get('role') == 'admin' || session()->get('user_id') == 44){

            $calls = Call::with('result','lead');
          }
          else{

                $array = LeadUsers::where('user_id',session()->get('user_id'))->pluck('lead_id');
              $calls = Call::whereHas('lead' , function($q) use($array){
                 $q->whereIn('id',$array)->orWhere('added_by','=',session()->get('user_id'));
              })->with('result','lead');


          }



            return DataTables::eloquent($calls)
                ->addIndexColumn()
                ->addColumn('result', function (Call $request) {
                    $data = $request->result->name ?? '';
                    return $data;
                })
                ->addColumn('date', function (Call $request) {
                    $data = $request->date ?? '';
                    return $data;
                })
                ->addColumn('qualification', function (Call $request) {
                    $data =  $request->qualification ?? '';
                    return $data;
                })
                ->addColumn('note', function (Call $request) {
                    $data = $request->note ?? '';
                    return $data;
                })

                ->addColumn('next_action', function (Call $request) {
                    $data = $request->next_action ?? '';
                    return $data;
                })

                ->addColumn('next_action_date', function (Call $request) {
                    $data =  $request->next_action_date ?? '';
                    return $data;
                })
                ->addColumn('company', function (Call $request) {
                    $data = $request->lead->company ?? '';
                    return $data;
                })

                ->addColumn('call', function (Call $request) {
                    $data = $request->call ?? '';
                    return $data;
                })
                ->addColumn('actions', function(Call $request){
                    $actions =' <form class="text-center" action="'.route('calls.destroy',$request->id).'" method="post">
                      <a href="'.route('calls.edit',$request->id).'"><i class="fas fa-edit"></i></a>
                       <a href="'.route('finalresults.create','id='.$request->lead->id).'"><i class="fas fa-sign-out-alt"></i></a>

                        '.csrf_field().'
                        '.
                        method_field("DELETE").'
                        <button class="btn" type="submit"><i style="color:#cd0a0a" class="fas fa-trash"></i></button>
                    </form>';
                    return $actions;
                })
                ->rawColumns(['result','date','qualification', 'note' ,'next_action','next_action_date','company','call','actions'])
                ->make(true);



        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(session()->get('role') == 'admin' || session()->get('user_id') == 44){

        $leads = Lead::all();
      }
      else{
          $array = LeadUsers::where('user_id',session()->get('user_id'))->pluck('lead_id');
          $leads = Lead::whereIn('id',$array)->orWhere('added_by','=',session()->get('user_id'))->get();
      }

        $results = Result::all();
        return view('calls.create',compact('leads','results'));

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
            $lead = Lead::findOrFail($request->lead_id);


//            dd($lead->first_call_done);
            if($lead->first_call_done == 0){
                $request->call = 'first';
                $lead->first_call_done = 1;
                $lead->first_call_result_id = $request->result_id;
                $lead->save();
            }
            elseif($lead->second_call_done == 0){
                $request->call = 'second';
                $lead->second_call_done = 1;
                $lead->second_call_result_id = $request->result_id;
                $lead->save();
            }
            else{
                return redirect('calls');
            }

            Call::create($request->all());


            DB::commit();
            return redirect('calls');

        } catch (\Exception $e) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(session()->get('role') == 'admin' || session()->get('user_id') == 44){

        $leads = Lead::all();
      }
      else{
          $array = LeadUsers::where('user_id',session()->get('user_id'))->pluck('lead_id');
          $leads = Lead::whereIn('id',$array)->orWhere('added_by','=',session()->get('user_id'))->get();
      }


        $call = Call::findOrFail($id);
        $results = Result::all();
        return view('calls.edit', compact('call' , 'leads','results'));
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
            $call = Call::findOrFail($id);

            $call->update($request->all());

            $lead = Lead::findOrFail($call->lead_id);
//
            if($request->call == 'first'){
                $lead->first_call_done = 1;
                $lead->first_call_result_id = $call->result_id;
                $lead->save();
            }else{
                $lead->second_call_done = 1;
                $lead->second_call_result_id = $call->result_id;
                $lead->save();
            }



            DB::commit();
            return redirect('calls');

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
            Call::where('id', $id)->delete();
            DB::commit();
            return redirect('calls');
        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }
}
