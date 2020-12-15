<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBugRequest;
use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use App\Models\Bug;
use App\Models\Opportunity;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\Task;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BugsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bug_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugs = Bug::all();

        $projects = Project::get();

        $opportunities = Opportunity::get();

        $tasks = Task::get();

        $permissions = Permission::get();

        return view('admin.bugs.index', compact('bugs', 'projects', 'opportunities', 'tasks', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('bug_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.bugs.create', compact('projects', 'opportunities', 'tasks', 'permissions'));
    }

    public function store(StoreBugRequest $request)
    {
        $bug = Bug::create($request->all());
        $bug->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bug->id]);
        }

        return redirect()->route('admin.bugs.index');
    }

    public function edit(Bug $bug)
    {
        abort_if(Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $opportunities = Opportunity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $bug->load('project', 'opportunities', 'task', 'permissions');

        return view('admin.bugs.edit', compact('projects', 'opportunities', 'tasks', 'permissions', 'bug'));
    }

    public function update(UpdateBugRequest $request, Bug $bug)
    {
        $bug->update($request->all());
        $bug->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.bugs.index');
    }

    public function show(Bug $bug)
    {
        abort_if(Gate::denies('bug_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bug->load('project', 'opportunities', 'task', 'permissions');

        return view('admin.bugs.show', compact('bug'));
    }

    public function destroy(Bug $bug)
    {
        abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bug->delete();

        return back();
    }

    public function massDestroy(MassDestroyBugRequest $request)
    {
        Bug::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bug_create') && Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Bug();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
