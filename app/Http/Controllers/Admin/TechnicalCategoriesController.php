<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnicalCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TechnicalCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('technical_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technicalCategories = TechnicalCategory::all();

        return view('admin.technicalCategories.index', compact('technicalCategories'));
    }

    public function show(TechnicalCategory $technicalCategory)
    {
        abort_if(Gate::denies('technical_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.technicalCategories.show', compact('technicalCategory'));
    }
}
