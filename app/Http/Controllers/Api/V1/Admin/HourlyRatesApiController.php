<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHourlyRateRequest;
use App\Http\Resources\Admin\HourlyRateResource;
use App\Models\HourlyRate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HourlyRatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hourly_rate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HourlyRateResource(HourlyRate::all());
    }

    public function store(StoreHourlyRateRequest $request)
    {
        $hourlyRate = HourlyRate::create($request->all());

        return (new HourlyRateResource($hourlyRate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(HourlyRate $hourlyRate)
    {
        abort_if(Gate::denies('hourly_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hourlyRate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
