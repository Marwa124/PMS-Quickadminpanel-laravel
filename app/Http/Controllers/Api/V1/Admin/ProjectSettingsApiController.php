<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectSettingRequest;
use App\Http\Resources\Admin\ProjectSettingResource;
use App\Models\ProjectSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectSettingsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectSettingResource(ProjectSetting::all());
    }

    public function store(StoreProjectSettingRequest $request)
    {
        $projectSetting = ProjectSetting::create($request->all());

        return (new ProjectSettingResource($projectSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(ProjectSetting $projectSetting)
    {
        abort_if(Gate::denies('project_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
