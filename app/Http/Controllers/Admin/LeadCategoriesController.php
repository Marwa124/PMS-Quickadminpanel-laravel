<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeadCategoryRequest;
use App\Http\Requests\StoreLeadCategoryRequest;
use App\Http\Requests\UpdateLeadCategoryRequest;
use App\Models\LeadCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadCategories = LeadCategory::all();

        return view('admin.leadCategories.index', compact('leadCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('lead_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leadCategories.create');
    }

    public function store(StoreLeadCategoryRequest $request)
    {
        $leadCategory = LeadCategory::create($request->all());

        return redirect()->route('admin.lead-categories.index');
    }

    public function edit(LeadCategory $leadCategory)
    {
        abort_if(Gate::denies('lead_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leadCategories.edit', compact('leadCategory'));
    }

    public function update(UpdateLeadCategoryRequest $request, LeadCategory $leadCategory)
    {
        $leadCategory->update($request->all());

        return redirect()->route('admin.lead-categories.index');
    }

    public function show(LeadCategory $leadCategory)
    {
        abort_if(Gate::denies('lead_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leadCategories.show', compact('leadCategory'));
    }

    public function destroy(LeadCategory $leadCategory)
    {
        abort_if(Gate::denies('lead_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leadCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadCategoryRequest $request)
    {
        LeadCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
