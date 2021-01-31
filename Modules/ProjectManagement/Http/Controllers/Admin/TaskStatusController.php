<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ProjectManagement\Http\Requests\MassDestroyTaskStatusRequest;
use Modules\ProjectManagement\Http\Requests\StoreTaskStatusRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTaskStatusRequest;
use Modules\ProjectManagement\Entities\TaskStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_status_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('task_status_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;

            $taskStatuses = TaskStatus::onlyTrashed()->get();

            return view('projectmanagement::admin.taskStatuses.index', compact('taskStatuses','trashed'));

        }

        $trashed = false;
        $taskStatuses = TaskStatus::all();

        return view('projectmanagement::admin.taskStatuses.index', compact('taskStatuses','trashed'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_status_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        return view('projectmanagement::admin.taskStatuses.create');
    }

    public function store(StoreTaskStatusRequest $request)
    {
        $taskStatus = TaskStatus::create($request->all());

        return redirect()->route('projectmanagement.admin.task-statuses.index');
    }

    public function edit(TaskStatus $taskStatus)
    {
        abort_if(Gate::denies('task_status_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        return view('projectmanagement::admin.taskStatuses.edit', compact('taskStatus'));
    }

    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $taskStatus->update($request->all());

        return redirect()->route('projectmanagement.admin.task-statuses.index');
    }

    public function show(TaskStatus $taskStatus)
    {
        abort(404, trans('global.page_not_exist'));
        abort_if(Gate::denies('task_status_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        return view('projectmanagement::admin.taskStatuses.show', compact('taskStatus'));
    }

    public function destroy(TaskStatus $taskStatus)
    {
        abort_if(Gate::denies('task_status_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $taskStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskStatusRequest $request)
    {
        TaskStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function forceDelete(Request $request,$id)
    {
        //dd($request->all(),$id);
        $action = $request->action;

        if ($action == 'force_delete') {

            $taskStatus = TaskStatus::onlyTrashed()->where('id', $id)->first();

            //force Delete Task
            $taskStatus->forceDelete();

        } else if ($action == 'restore') {
            //restore Task
            TaskStatus::onlyTrashed()->where('id', $id)->restore();
        }

        return back();

    }
}
