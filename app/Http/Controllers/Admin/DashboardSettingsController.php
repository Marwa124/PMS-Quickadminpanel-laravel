<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDashboardSettingRequest;
use App\Http\Requests\StoreDashboardSettingRequest;
use App\Models\DashboardSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardSettingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dashboardSettings = DashboardSetting::all();

        return view('admin.dashboardSettings.index', compact('dashboardSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('dashboard_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dashboardSettings.create');
    }

    public function store(StoreDashboardSettingRequest $request)
    {
        $dashboardSetting = DashboardSetting::create($request->all());

        return redirect()->route('admin.dashboard-settings.index');
    }

    public function destroy(DashboardSetting $dashboardSetting)
    {
        abort_if(Gate::denies('dashboard_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dashboardSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyDashboardSettingRequest $request)
    {
        DashboardSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
