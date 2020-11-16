<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyEmployeeAwardRequest;
use Modules\HR\Http\Requests\Store\StoreEmployeeAwardRequest;
use Modules\HR\Http\Requests\Update\UpdateEmployeeAwardRequest;
use Modules\HR\Entities\EmployeeAward;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeAwardsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('employee_award_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeAwards = EmployeeAward::all();

        return view('hr::admin.employeeAwards.index', compact('employeeAwards'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_award_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.employeeAwards.create', compact('users'));
    }

    public function store(StoreEmployeeAwardRequest $request)
    {
        $employeeAward = EmployeeAward::create($request->all());

        return redirect()->route('hr.admin.employee-awards.index');
    }

    public function edit(EmployeeAward $employeeAward)
    {
        abort_if(Gate::denies('employee_award_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employeeAward->load('user');

        return view('hr::admin.employeeAwards.edit', compact('users', 'employeeAward'));
    }

    public function update(UpdateEmployeeAwardRequest $request, EmployeeAward $employeeAward)
    {
        $employeeAward->update($request->all());

        return redirect()->route('hr.admin.employee-awards.index');
    }

    public function show(EmployeeAward $employeeAward)
    {
        abort_if(Gate::denies('employee_award_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeAward->load('user');

        return view('hr::admin.employeeAwards.show', compact('employeeAward'));
    }

    public function destroy(EmployeeAward $employeeAward)
    {
        abort_if(Gate::denies('employee_award_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeAward->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeAwardRequest $request)
    {
        EmployeeAward::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
