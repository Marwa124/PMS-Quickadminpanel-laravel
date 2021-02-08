<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Http\Requests\Destroy\MassDestroyPenaltyCategoryRequest;
use Modules\HR\Http\Requests\Store\StorePenaltyCategoryRequest;
use Modules\HR\Http\Requests\Update\UpdatePenaltyCategoryRequest;
use Modules\HR\Entities\PenaltyCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PenaltyCategoriesController extends Controller
{
    public function index()
    {
        // dd(Gate::allows('account_detail_evaluate'));
        abort_if(Gate::denies('penalty_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penaltyCategories = PenaltyCategory::all();

        
        return view('hr::admin.penaltyCategories.index', compact('penaltyCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('penalty_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('hr::admin.penaltyCategories.create');
    }

    public function store(StorePenaltyCategoryRequest $request)
    {
        $penaltyCategory = PenaltyCategory::create($request->all());

        return redirect()->route('hr.admin.penalty-categories.index');
    }

    public function edit(PenaltyCategory $penaltyCategory)
    {
        abort_if(Gate::denies('penalty_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('hr::admin.penaltyCategories.edit', compact('penaltyCategory'));
    }

    public function update(UpdatePenaltyCategoryRequest $request, PenaltyCategory $penaltyCategory)
    {
        $penaltyCategory->update($request->all());

        return redirect()->route('hr.admin.penalty-categories.index');
    }

    public function destroy(PenaltyCategory $penaltyCategory)
    {
        abort_if(Gate::denies('penalty_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penaltyCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenaltyCategoryRequest $request)
    {
        PenaltyCategory::whereIn('id', request('ids'))->delete();
        
        return response()->json([
            'ids'   => request('ids'),
        ]);
        // return response(null, Response::HTTP_NO_CONTENT);
    }
}
