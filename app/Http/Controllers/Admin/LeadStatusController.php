<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeadStatusRequest;
use App\Http\Requests\StoreLeadStatusRequest;
use App\Models\LeadStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatuses = LeadStatus::all();

        return view('admin.leadStatuses.index', compact('leadStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('lead_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leadStatuses.create');
    }

    public function store(StoreLeadStatusRequest $request)
    {
        $leadStatus = LeadStatus::create($request->all());

        return redirect()->route('admin.lead-statuses.index');
    }

    public function destroy(LeadStatus $leadStatus)
    {
        abort_if(Gate::denies('lead_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadStatusRequest $request)
    {
        LeadStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
