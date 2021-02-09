<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyEmployeeAwardRequest;
use Modules\HR\Http\Requests\Store\StoreEmployeeAwardRequest;
use Modules\HR\Http\Requests\Update\UpdateEmployeeAwardRequest;
use Modules\HR\Entities\EmployeeAward;
use App\Models\User;
use Gate;
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

        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');
        }

        return view('hr::admin.employeeAwards.create', compact('users'));
    }

    public function store(StoreEmployeeAwardRequest $request)
    {
        $employeeAward = EmployeeAward::create($request->all());
        
        $message = array(
            'message'    =>  ' Created Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.employee-awards.index')->with($flashMsg);
    }

    public function edit(EmployeeAward $employeeAward)
    {
        abort_if(Gate::denies('employee_award_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');
        }
        $employeeAward->load('user');

        return view('hr::admin.employeeAwards.edit', compact('users', 'employeeAward'));
    }

    public function update(UpdateEmployeeAwardRequest $request, EmployeeAward $employeeAward)
    {
        $employeeAward->update($request->all());

        $message = array(
            'message'    =>  ' Updated Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.employee-awards.index')->with($flashMsg);
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
