<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroyHourlyRateRequest;
use Modules\Payroll\Http\Requests\Store\StoreHourlyRateRequest;
use Modules\Payroll\Entities\HourlyRate;
use Gate;
use Modules\Payroll\Http\Requests\Update\UpdateHourlyRateRequest;
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

        $message = array(
            'message'    =>  ' Created Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('payroll.admin.hourly-rates.index')->with($flashMsg);
    }

    public function edit(HourlyRate $hourlyRate)
    {
        abort_if(Gate::denies('hourly_rate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('payroll::admin.hourlyRates.edit', compact('hourlyRate'));
    }

    public function update(UpdateHourlyRateRequest $request, HourlyRate $hourlyRate)
    {
        $hourlyRate->update($request->all());

        $message = array(
            'message'    =>  ' Updated Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('payroll.admin.hourly-rates.index')->with($flashMsg);
    }

    public function destroy(HourlyRate $hourlyRate)
    {
        abort_if(Gate::denies('hourly_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hourlyRate->forceDelete();

        return back();
    }

    public function massDestroy(MassDestroyHourlyRateRequest $request)
    {
        HourlyRate::whereIn('id', request('ids'))->forceDelete();

        return response()->json([
            'ids'   => request('ids'),
        ]);
        // return response(null, Response::HTTP_NO_CONTENT);
    }
}
