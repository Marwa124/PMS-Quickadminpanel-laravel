<?php

namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Http\Requests\Destroy\MassDestroyOpportunityRequest;
use Modules\Sales\Http\Requests\Store\StoreOpportunityRequest;
use Modules\Sales\Http\Requests\Update\UpdateOpportunityRequest;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Result;
use Modules\Sales\Entities\Opportunity;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Client;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use DB;
class OpportunitiesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('opportunity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunities = Opportunity::all();

        $leads = Lead::get();
        
        return view('sales::admin.opportunities.index', compact('opportunities', 'leads'));
    }

    public function create()
    {
        abort_if(Gate::denies('opportunity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
 
        $permissions =PermissionGroup::with('permissions')->where('name','opportunity')->first();

        return view('sales::admin.opportunities.create', compact('leads', 'permissions'));
    }

    public function store(StoreOpportunityRequest $request)
    {
       
        $opportunity = Opportunity::create($request->all());
        // $opportunity->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $opportunity->id]);
        }

        return redirect()->route('sales.admin.opportunities.index');
    }

    public function edit(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $leads = Lead::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions =PermissionGroup::with('permissions')->where('name','opportunity')->first();

        return view('sales::admin.opportunities.edit', compact('permissions', 'opportunity'));
    }

    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->all());
        // $opportunity->permissions()->sync($request->input('permissions', []));

        return redirect()->route('sales.admin.opportunities.index');
    }

    public function show(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients=Client::all()->pluck('name', 'id');
        $results=Result::all()->pluck('name', 'id');
        return view('sales::admin.opportunities.show', compact('opportunity','clients','results'));
    }

    public function destroy(Opportunity $opportunity)
    {
        abort_if(Gate::denies('opportunity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunity->delete();

        return back();
    }

    public function massDestroy(MassDestroyOpportunityRequest $request)
    {
        Opportunity::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('opportunity_create') && Gate::denies('opportunity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Opportunity();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function createcalls(Request $request)
    {
        DB::beginTransaction();

        try {
            $opportunities = Opportunity::findOrFail($request->opportunities_id);
            Call::create($request->all());
            DB::commit();
            return redirect()->route('sales.admin.calls.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something wrong happen','alert-type' => 'error']);
        }
    }
}
