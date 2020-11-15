<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerformanceIndicatorRequest;
use App\Http\Requests\StorePerformanceIndicatorRequest;
use App\Http\Requests\UpdatePerformanceIndicatorRequest;
use App\Models\Designation;
use App\Models\PerformanceIndicator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerformanceIndicatorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('performance_indicator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performanceIndicators = PerformanceIndicator::all();

        return view('admin.performanceIndicators.index', compact('performanceIndicators'));
    }

    public function create()
    {
        abort_if(Gate::denies('performance_indicator_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('designation_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.performanceIndicators.create', compact('designations'));
    }

    public function store(StorePerformanceIndicatorRequest $request)
    {
        $performanceIndicator = PerformanceIndicator::create($request->all());

        return redirect()->route('admin.performance-indicators.index');
    }

    public function edit(PerformanceIndicator $performanceIndicator)
    {
        abort_if(Gate::denies('performance_indicator_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('designation_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $performanceIndicator->load('designation');

        return view('admin.performanceIndicators.edit', compact('designations', 'performanceIndicator'));
    }

    public function update(UpdatePerformanceIndicatorRequest $request, PerformanceIndicator $performanceIndicator)
    {
        $performanceIndicator->update($request->all());

        return redirect()->route('admin.performance-indicators.index');
    }

    public function show(PerformanceIndicator $performanceIndicator)
    {
        abort_if(Gate::denies('performance_indicator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performanceIndicator->load('designation');

        return view('admin.performanceIndicators.show', compact('performanceIndicator'));
    }

    public function destroy(PerformanceIndicator $performanceIndicator)
    {
        abort_if(Gate::denies('performance_indicator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performanceIndicator->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerformanceIndicatorRequest $request)
    {
        PerformanceIndicator::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
