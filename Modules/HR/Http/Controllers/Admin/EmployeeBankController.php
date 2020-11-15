<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyEmployeeBankRequest;
use Modules\HR\Http\Requests\Store\StoreEmployeeBankRequest;
use Modules\HR\Http\Requests\Update\UpdateEmployeeBankRequest;
use Modules\HR\Entities\EmployeeBank;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeBankController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('employee_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeBanks = EmployeeBank::all();

        return view('admin.employeeBanks.index', compact('employeeBanks'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employeeBanks.create', compact('users'));
    }

    public function store(StoreEmployeeBankRequest $request)
    {
        $employeeBank = EmployeeBank::create($request->all());

        return redirect()->route('admin.employee-banks.index');
    }

    public function edit(EmployeeBank $employeeBank)
    {
        abort_if(Gate::denies('employee_bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employeeBank->load('user');

        return view('admin.employeeBanks.edit', compact('users', 'employeeBank'));
    }

    public function update(UpdateEmployeeBankRequest $request, EmployeeBank $employeeBank)
    {
        $employeeBank->update($request->all());

        return redirect()->route('admin.employee-banks.index');
    }

    public function show(EmployeeBank $employeeBank)
    {
        abort_if(Gate::denies('employee_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeBank->load('user');

        return view('admin.employeeBanks.show', compact('employeeBank'));
    }

    public function destroy(EmployeeBank $employeeBank)
    {
        abort_if(Gate::denies('employee_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeBank->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeBankRequest $request)
    {
        EmployeeBank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
