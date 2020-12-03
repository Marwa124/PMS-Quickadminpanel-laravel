<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLeadRequest;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Modules\Sales\Entities\InterestedIn;
use App\Models\Lead;
use App\Models\LeadCategory;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\Permission;
use App\Models\Salutation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LeadsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('lead_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leads = Lead::all();

        $salutations = Salutation::get();

        $interested_ins = InterestedIn::get();

        $lead_statuses = LeadStatus::get();

        $lead_sources = LeadSource::get();

        $lead_categories = LeadCategory::get();

        $permissions = Permission::get();

        return view('admin.leads.index', compact('leads', 'salutations', 'interested_ins', 'lead_statuses', 'lead_sources', 'lead_categories', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salutations = Salutation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $interesteds = InterestedIn::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_statuses = LeadStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_sources = LeadSource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_categories = LeadCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.leads.create', compact('salutations', 'interesteds', 'lead_statuses', 'lead_sources', 'lead_categories', 'permissions'));
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = Lead::create($request->all());
        $lead->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $lead->id]);
        }

        return redirect()->route('admin.leads.index');
    }

    public function edit(Lead $lead)
    {
        abort_if(Gate::denies('lead_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salutations = Salutation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $interesteds = InterestedIn::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_statuses = LeadStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_sources = LeadSource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead_categories = LeadCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $lead->load('salutation', 'interested', 'lead_status', 'lead_source', 'lead_category', 'permissions');

        return view('admin.leads.edit', compact('salutations', 'interesteds', 'lead_statuses', 'lead_sources', 'lead_categories', 'permissions', 'lead'));
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $lead->update($request->all());
        $lead->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.leads.index');
    }

    public function show(Lead $lead)
    {
        abort_if(Gate::denies('lead_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->load('salutation', 'interested', 'lead_status', 'lead_source', 'lead_category', 'permissions');

        return view('admin.leads.show', compact('lead'));
    }

    public function destroy(Lead $lead)
    {
        abort_if(Gate::denies('lead_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadRequest $request)
    {
        Lead::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('lead_create') && Gate::denies('lead_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Lead();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
