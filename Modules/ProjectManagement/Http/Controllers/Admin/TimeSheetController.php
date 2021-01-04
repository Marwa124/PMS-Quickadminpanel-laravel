<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProjectManagement\Entities\TimeSheet;

class TimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('projectmanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('projectmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $user_id = auth()->user()->id;
        $start = strtotime($request->start_date . ' ' . $request->start_time);
        $end = strtotime($request->end_date . ' ' . $request->end_time);


        //dd($request->module_field_id);
        if ($request->timesheet_id)
        {

            $timeSheet = TimeSheet::findOrFail($request->timesheet_id);
            $timeSheet->update([
//                'module'            => 'project',
//                'module_field_id'   => $request->project_id,
                'timer_status'      => 'off',
                'start_time'        => $start,
                'end_time'          => $end,
                'reason'            => $request->reason,
                'edited_by'         => $user_id,
            ]);

            if($request->module == 'project'){

                $module_name =  $timeSheet->project->name ;

            }elseif($request->module == 'task'){

                $module_name =  $timeSheet->task->name ;
            }

            setActivity($request->module,$request->module_field_id,'Update Time Sheet',$module_name);
        }else{

            $timer = [
                'user_id'           => $user_id,
                'module'            => $request->module,
                'module_field_id'   => $request->project_id,
                'timer_status'      => 'off',
                'start_time'        => $start,
                'end_time'          => $end,
                'reason'            => $request->reason,
            ];

            $timeSheet = TimeSheet::create($timer);

            if($request->module == 'project'){

                $module_name =  $timeSheet->project->name ;

            }elseif($request->module == 'task'){

                $module_name =  $timeSheet->task->name ;
            }

            setActivity($request->module,$request->module_field_id,'Create Time Sheet',$module_name);
        }


        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('projectmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('projectmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $timeSheet = TimeSheet::findOrFail($id);

        $timeSheet->delete();

        return redirect()->back();
    }
}
