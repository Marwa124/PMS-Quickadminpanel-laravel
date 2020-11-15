<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroyHourlyRateRequest;
use Modules\Payroll\Http\Requests\Store\StoreHourlyRateRequest;
use Modules\Payroll\Entities\HourlyRate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HourlyRatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hourly_rate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hourlyRates = HourlyRate::all();

        return view('payroll::admin.hourlyRates.index', compact('hourlyRates'));
    }

    public function create()
    {
        abort_if(Gate::denies('hourly_rate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('payroll::admin.hourlyRates.create');
    }

    public function store(StoreHourlyRateRequest $request)
    {
        $hourlyRate = HourlyRate::create($request->all());

        return redirect()->route('admin.payroll.hourly-rates.index');
    }

    public function destroy(HourlyRate $hourlyRate)
    {
        abort_if(Gate::denies('hourly_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hourlyRate->delete();

        return back();
    }

    public function massDestroy(MassDestroyHourlyRateRequest $request)
    {
        HourlyRate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
