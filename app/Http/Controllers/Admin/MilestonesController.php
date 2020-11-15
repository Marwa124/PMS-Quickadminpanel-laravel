<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMilestoneRequest;
use App\Http\Requests\StoreMilestoneRequest;
use App\Http\Requests\UpdateMilestoneRequest;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MilestonesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('milestone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $milestones = Milestone::all();

        return view('admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        abort_if(Gate::denies('milestone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.milestones.create', compact('users', 'projects'));
    }

    public function store(StoreMilestoneRequest $request)
    {
        $milestone = Milestone::create($request->all());

        return redirect()->route('admin.milestones.index');
    }

    public function edit(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $milestone->load('user', 'project');

        return view('admin.milestones.edit', compact('users', 'projects', 'milestone'));
    }

    public function update(UpdateMilestoneRequest $request, Milestone $milestone)
    {
        $milestone->update($request->all());

        return redirect()->route('admin.milestones.index');
    }

    public function show(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $milestone->load('user', 'project');

        return view('admin.milestones.show', compact('milestone'));
    }

    public function destroy(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $milestone->delete();

        return back();
    }

    public function massDestroy(MassDestroyMilestoneRequest $request)
    {
        Milestone::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
