<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ProjectManagement\Http\Requests\MassDestroyTaskTagRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskTagRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTaskTagRequest;
use Modules\ProjectManagement\Entities\TaskTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskTagController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_tag_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('task_tag_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;

            $taskTags = TaskTag::onlyTrashed()->get();

            return view('projectmanagement::admin.taskTags.index', compact('taskTags','trashed'));

        }

        $trashed = false;

        $taskTags = TaskTag::all();

        return view('projectmanagement::admin.taskTags.index', compact('taskTags','trashed'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_tag_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        return view('projectmanagement::admin.taskTags.create');
    }

    public function store(StoreTaskTagRequest $request)
    {
        abort_if(Gate::denies('task_tag_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $taskTag = TaskTag::create($request->all());

        return redirect()->route('projectmanagement.admin.task-tags.index');
    }

    public function edit(TaskTag $taskTag)
    {
        abort_if(Gate::denies('task_tag_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        return view('projectmanagement::admin.taskTags.edit', compact('taskTag'));
    }

    public function update(UpdateTaskTagRequest $request, TaskTag $taskTag)
    {
        abort_if(Gate::denies('task_tag_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $taskTag->update($request->all());

        return redirect()->route('projectmanagement.admin.task-tags.index');
    }

    public function show(TaskTag $taskTag)
    {
        abort(404, trans('global.page_not_exist'));
        abort_if(Gate::denies('task_tag_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        return view('projectmanagement::admin.taskTags.show', compact('taskTag'));
    }

    public function destroy(TaskTag $taskTag)
    {
        abort_if(Gate::denies('task_tag_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $taskTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskTagRequest $request)
    {
        abort_if(Gate::denies('task_tag_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        TaskTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function forceDelete(Request $request,$id)
    {

        abort_if(Gate::denies('task_tag_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $action = $request->action;

        if ($action == 'force_delete') {

            $taskTag = TaskTag::onlyTrashed()->where('id', $id)->first();

            //force Delete Task
            $taskTag->forceDelete();

        } else if ($action == 'restore') {
            //restore Task
            TaskTag::onlyTrashed()->where('id', $id)->restore();
        }

        return back();
    }
}
