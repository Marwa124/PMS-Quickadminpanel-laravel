<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerformanceIndicatorRequest;
use App\Http\Requests\UpdatePerformanceIndicatorRequest;
use App\Http\Resources\Admin\PerformanceIndicatorResource;
use App\Models\PerformanceIndicator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerformanceIndicatorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('performance_indicator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerformanceIndicatorResource(PerformanceIndicator::with(['designation'])->get());
    }

    public function store(StorePerformanceIndicatorRequest $request)
    {
        $performanceIndicator = PerformanceIndicator::create($request->all());

        return (new PerformanceIndicatorResource($performanceIndicator))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PerformanceIndicator $performanceIndicator)
    {
        abort_if(Gate::denies('performance_indicator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerformanceIndicatorResource($performanceIndicator->load(['designation']));
    }

    public function update(UpdatePerformanceIndicatorRequest $request, PerformanceIndicator $performanceIndicator)
    {
        $performanceIndicator->update($request->all());

        return (new PerformanceIndicatorResource($performanceIndicator))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PerformanceIndicator $performanceIndicator)
    {
        abort_if(Gate::denies('performance_indicator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performanceIndicator->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
