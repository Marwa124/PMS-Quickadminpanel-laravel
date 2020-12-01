<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\ProjectSetting;
use Modules\ProjectManagement\Http\Requests\MassDestroyProjectRequest;
use Modules\ProjectManagement\Http\Requests\StoreProjectRequest;
use Modules\ProjectManagement\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Permission;
use Modules\ProjectManagement\Entities\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();

        $clients = Client::get();

        $permissions = Permission::get();

        return view('projectmanagement::admin.projects.index', compact('projects', 'clients', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $project_settings = ProjectSetting::all();

        return view('projectmanagement::admin.projects.create', compact('clients', 'permissions','project_settings'));
    }

    public function store(StoreProjectRequest $request)
    {
        $sittings = json_encode($request->settings);
        unset($request['settings']);
        $request['settings'] = $sittings;
        //dd($request->all(),$request['settings']);
        $project = Project::create($request->all());
        $project->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $project->load('client', 'permissions');

        $project_settings = ProjectSetting::all();

        return view('projectmanagement::admin.projects.edit', compact('clients', 'permissions', 'project','project_settings'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->permissions()->sync($request->input('permissions', []));

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('client', 'permissions');

        return view('projectmanagement::admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function assignTo(){

    }

}
