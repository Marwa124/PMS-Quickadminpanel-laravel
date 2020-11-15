<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPenaltyCategoryRequest;
use App\Http\Requests\StorePenaltyCategoryRequest;
use App\Models\PenaltyCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenaltyCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('penalty_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penaltyCategories = PenaltyCategory::all();

        return view('admin.penaltyCategories.index', compact('penaltyCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('penalty_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penaltyCategories.create');
    }

    public function store(StorePenaltyCategoryRequest $request)
    {
        $penaltyCategory = PenaltyCategory::create($request->all());

        return redirect()->route('admin.penalty-categories.index');
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

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
