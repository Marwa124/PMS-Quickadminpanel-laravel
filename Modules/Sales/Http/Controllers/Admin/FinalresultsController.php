<?php

namespace App\Http\Controllers;

use App\Finalresult;
use App\Imports\FinalresultssImport;
use App\Lead;
use App\LeadUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class FinalresultsController extends Controller
{




    public function addSheet(){


        return view('finalresultsupload');
    }


    public function processSheet(Request $request)
    {
        if ($request->file != null) { {
            $extension = strtolower($request->file->getClientOriginalExtension());
            if (in_array($extension, ['csv', 'xls', 'xlsx'])) {


                if (Excel::import(new FinalresultssImport(), request()->file('file'))) {



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


        return view('finalresults.index');
    }


    public function getData(Request $request)
    {


        if ($request->ajax()) {

          if(session()->get('role') == 'admin' || session()->get('user_id') == 44){
            $finalresults = Finalresult::with('lead');
          }
          else{
          $array = LeadUsers::where('user_id',session()->get('user_id'))->pluck('lead_id');

              $finalresults = Finalresult::whereHas('lead' , function($q) use($array){
                 $q->whereIn('id',$array)->orWhere('added_by','=',session()->get('user_id'));
              })->with('lead');

          }


            return DataTables::eloquent($finalresults)
                ->addIndexColumn()
                ->addColumn('sub_status', function (Finalresult $request) {
                    $data = $request->sub_status ?? '';
                    return $data;
                })
                ->addColumn('status', function (Finalresult $request) {
                    $data = $request->status ?? '';
                    return $data;
                })
                ->addColumn('ceo_comment', function (Finalresult $request) {
                    $data =  $request->ceo_comment ?? '';
                    return $data;
                })
                ->addColumn('note', function (Finalresult $request) {
                    $data = $request->note ?? '';
                    return $data;
                })

                ->addColumn('client_name', function (Finalresult $request) {
                    $data = $request->lead->client_name ?? '';
                    return $data;
                })

                ->addColumn('actions', function(Finalresult $request){
                    $actions =' <form class="text-center" action="'.route('finalresults.destroy',$request->id).'" method="post">
                      <a href="'.route('finalresults.edit',$request->id).'"><i class="fas fa-edit"></i></a>

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

        return view('finalresults.create',compact('leads'));

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
            Finalresult::create($request->all());

            DB::commit();
            return redirect('finalresults');

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
        $finalresult = Finalresult::findOrFail($id);
        if(session()->get('role') == 'admin' || session()->get('user_id') == 44){

          $leads = Lead::all();
        }
        else{
            $array = LeadUsers::where('user_id',session()->get('user_id'))->pluck('lead_id');
            $leads = Lead::whereIn('id',$array)->orWhere('added_by','=',session()->get('user_id'))->get();
        }
        return view('finalresults.edit', compact('finalresult','leads'));
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
            $finalresult = Finalresult::findOrFail($id);
            $finalresult->update($request->all());
            DB::commit();
            return redirect('finalresults');

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
            Finalresult::where('id', $id)->delete();
            DB::commit();
            return redirect('finalresults');

        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }
}
