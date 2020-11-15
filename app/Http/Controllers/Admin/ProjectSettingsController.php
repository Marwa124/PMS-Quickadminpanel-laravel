<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectSettingRequest;
use App\Http\Requests\StoreProjectSettingRequest;
use App\Models\ProjectSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectSettingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectSettings = ProjectSetting::all();

        return view('admin.projectSettings.index', compact('projectSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectSettings.create');
    }

    public function store(StoreProjectSettingRequest $request)
    {
        $projectSetting = ProjectSetting::create($request->all());

        return redirect()->route('admin.project-settings.index');
    }

    public function destroy(ProjectSetting $projectSetting)
    {
        abort_if(Gate::denies('project_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectSettingRequest $request)
    {
        ProjectSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
