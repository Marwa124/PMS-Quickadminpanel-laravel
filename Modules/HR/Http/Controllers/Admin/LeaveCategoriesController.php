<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyLeaveCategoryRequest;
use Modules\HR\Http\Requests\Store\StoreLeaveCategoryRequest;
use Modules\HR\Http\Requests\Update\UpdateLeaveCategoryRequest;
use Modules\HR\Entities\LeaveCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveCategories = LeaveCategory::all();

        return view('hr::admin.leaveCategories.index', compact('leaveCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('leave_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('hr::admin.leaveCategories.create');
    }

    public function store(StoreLeaveCategoryRequest $request)
    {
        $leaveCategory = LeaveCategory::create($request->all());

        return redirect()->route('hr::admin.leave-categories.index');
    }

    public function edit(LeaveCategory $leaveCategory)
    {
        abort_if(Gate::denies('leave_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('hr::admin.leaveCategories.edit', compact('leaveCategory'));
    }

    public function update(UpdateLeaveCategoryRequest $request, LeaveCategory $leaveCategory)
    {
        $leaveCategory->update($request->all());

        return redirect()->route('hr::admin.leave-categories.index');
    }

    public function show(LeaveCategory $leaveCategory)
    {
        abort_if(Gate::denies('leave_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveCategory->load('leaveCategoryLeaveApplications');

        return view('hr::admin.leaveCategories.show', compact('leaveCategory'));
    }

    public function destroy(LeaveCategory $leaveCategory)
    {
        abort_if(Gate::denies('leave_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeaveCategoryRequest $request)
    {
        LeaveCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
