<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ProjectManagement\Entities\Task;
use Modules\ProjectManagement\Entities\TaskStatus;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyWorkTrackingRequest;
use Modules\ProjectManagement\Http\Requests\StoreWorkTrackingRequest;
use Modules\ProjectManagement\Http\Requests\UpdateWorkTrackingRequest;
use Modules\HR\Entities\AccountDetail;
//use App\Models\Permission;
use Modules\ProjectManagement\Entities\TimeWorkType;
use Modules\ProjectManagement\Entities\WorkTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkTrackingController extends Controller
{
    use ProjectManagementHelperTrait;

    public function index()
    {
        abort_if(Gate::denies('work_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->segment(count(request()->segments())) == 'trashed') {

            abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $trashed = true;

            $workTrackings = WorkTracking::onlyTrashed()->get();

            return view('projectmanagement::admin.workTrackings.index', compact('workTrackings', 'trashed'));
        }


        $trashed = false;

        $workTrackings = WorkTracking::all();

        return view('projectmanagement::admin.workTrackings.index', compact('workTrackings', 'trashed'));
    }

    public function create()
    {
        abort_if(Gate::denies('work_tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = AccountDetail::all()->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('projectmanagement::admin.workTrackings.create', compact('work_types', 'accounts'));
    }

    public function store(StoreWorkTrackingRequest $request)
    {
        $workTracking = WorkTracking::create($request->all());

        setActivity('workTracking',$workTracking->id,'Create Work Tracking Details',$workTracking->subject);

        return redirect()->route('projectmanagement.admin.work-trackings.index');
    }

    public function edit(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$permissions = Permission::all()->pluck('title', 'id');

        //$accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workTracking->load('work_type');

        return view('projectmanagement::admin.workTrackings.edit', compact('work_types', 'workTracking'));
    }

    public function update(UpdateWorkTrackingRequest $request, WorkTracking $workTracking)
    {
        $workTracking->update($request->all());
        //$workTracking->permissions()->sync($request->input('permissions', []));

        setActivity('workTracking',$workTracking->id,'Update Work Tracking Details',$workTracking->subject);

        return redirect()->route('projectmanagement.admin.work-trackings.index');
    }

    public function show(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workTracking->load('work_type');
        $result = $this->get_progress_ofWorkTracking($workTracking);
        $today = date('Y-m-d');
//        dd($result);
        if ($workTracking->end_date > $today){

            $workTrakingStatus = 'On Going';
            $color = '#0d86ff';
        }else{
            if($workTracking->achievement <= $result['achievement_WorkTracking']){

                $workTrakingStatus = 'Achieved';
                $color ='#2d995b';
            }else{

                $workTrakingStatus = 'Failed';
                $color = '#b91d19';
            }

        }
        //dd($result);

        return view('projectmanagement::admin.workTrackings.show', compact('workTracking','result','workTrakingStatus','color'));
    }

    public function destroy(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workTracking->delete();

        setActivity('workTracking',$workTracking->id,'Delete Work Tracking',$workTracking->subject);

        return back();
    }

    public function massDestroy(MassDestroyWorkTrackingRequest $request)
    {
        $ids = request('ids');

        foreach ($ids as $id){
            $workTracking = WorkTracking::where('id',$id)->first();

            $workTracking->delete();

            //$project->accountDetails()->detach();
            setActivity('workTracking',$workTracking->id,'Delete Work Tracking',$workTracking->subject);
        }


        //WorkTracking::whereIn('id', request('ids'))->delete();


        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function forceDelete(Request $request, $id)
    {
        //dd($request->all(),$id);
        $action = $request->action;

        if ($action == 'force_delete') {

            $workTracking = WorkTracking::onlyTrashed()->where('id', $id)->first();

            // force delete bug
            $workTracking->forceDelete();

        } else if ($action == 'restore') {
            //restore WorkTracking
            WorkTracking::onlyTrashed()->where('id', $id)->restore();
            $workTracking = WorkTracking::findOrFail($id);

            setActivity('workTracking',$workTracking->id,'Restore Work Tracking Details',$workTracking->subject);
        }

        return back();

    }
}
