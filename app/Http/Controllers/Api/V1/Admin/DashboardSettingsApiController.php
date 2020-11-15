<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDashboardSettingRequest;
use App\Http\Resources\Admin\DashboardSettingResource;
use App\Models\DashboardSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardSettingsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DashboardSettingResource(DashboardSetting::all());
    }

    public function store(StoreDashboardSettingRequest $request)
    {
        $dashboardSetting = DashboardSetting::create($request->all());

        return (new DashboardSettingResource($dashboardSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(DashboardSetting $dashboardSetting)
    {
        abort_if(Gate::denies('dashboard_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dashboardSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
