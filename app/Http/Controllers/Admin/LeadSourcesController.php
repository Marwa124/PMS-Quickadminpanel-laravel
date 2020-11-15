<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeadSourceRequest;
use App\Http\Requests\StoreLeadSourceRequest;
use App\Models\LeadSource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadSourcesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadSources = LeadSource::all();

        return view('admin.leadSources.index', compact('leadSources'));
    }

    public function create()
    {
        abort_if(Gate::denies('lead_source_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leadSources.create');
    }

    public function store(StoreLeadSourceRequest $request)
    {
        $leadSource = LeadSource::create($request->all());

        return redirect()->route('admin.lead-sources.index');
    }

    public function destroy(LeadSource $leadSource)
    {
        abort_if(Gate::denies('lead_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadSource->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadSourceRequest $request)
    {
        LeadSource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
