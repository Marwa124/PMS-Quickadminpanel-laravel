<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkTrackingRequest;
use App\Http\Requests\StoreWorkTrackingRequest;
use App\Http\Requests\UpdateWorkTrackingRequest;
use App\Models\Account;
use App\Models\Permission;
use App\Models\TimeWorkType;
use App\Models\WorkTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkTrackingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workTrackings = WorkTracking::all();

        return view('admin.workTrackings.index', compact('workTrackings'));
    }

    public function create()
    {
        abort_if(Gate::denies('work_tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.workTrackings.create', compact('work_types', 'permissions', 'accounts'));
    }

    public function store(StoreWorkTrackingRequest $request)
    {
        $workTracking = WorkTracking::create($request->all());
        $workTracking->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.work-trackings.index');
    }

    public function edit(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $accounts = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workTracking->load('work_type', 'permissions', 'account');

        return view('admin.workTrackings.edit', compact('work_types', 'permissions', 'accounts', 'workTracking'));
    }

    public function update(UpdateWorkTrackingRequest $request, WorkTracking $workTracking)
    {
        $workTracking->update($request->all());
        $workTracking->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.work-trackings.index');
    }

    public function show(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workTracking->load('work_type', 'permissions', 'account');

        return view('admin.workTrackings.show', compact('workTracking'));
    }

    public function destroy(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workTracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkTrackingRequest $request)
    {
        WorkTracking::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
