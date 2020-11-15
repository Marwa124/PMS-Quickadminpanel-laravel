<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyEmployeeRequest;
use Modules\HR\Http\Requests\Store\StoreEmployeeRequest;
use Modules\HR\Http\Requests\Update\UpdateEmployeeRequest;
use Modules\HR\Entities\Employee;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = User::all();

        $roles = Role::get();

        $permissions = Permission::get();

        return view('hr::admin.employees.index', compact('employees', 'roles', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('hr::admin.employees.create', compact('roles', 'permissions'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = User::create($request->all());
        $employee->permissions()->sync($request->input('permissions', []));

        return redirect()->route('hr.admin.employees.index');
    }

    public function edit(User $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $employee->load('role', 'permissions');

        return view('hr::admin.employees.edit', compact('roles', 'permissions', 'employee'));
    }

    public function update(User $employee)
    {
        // $permission = Permission::whereIn('id', request()->permissions)->pluck('title');
        $role = Role::find(request()->role_id);
        $roleHasPermission = $role->permissions()->whereIn('permission_id', request()->permissions)->pluck('id')->toArray();
        // $assignPermissionToUser = $employee->permissions()->attach(array_diff(request()->permissions,$roleHasPermission));
        // dd($assignPermissionToUser);
        // dd(array_diff(request()->permissions,$roleHasPermission));

        $userNewRole = '';
        if (array_diff(request()->permissions,$roleHasPermission)) {
            $userNewRole = Role::create(['title' => $employee->id.'_'.$employee->name.'_'.Str::random(4)]);

            $userNewRole->permissions()->sync(array_diff(request()->permissions,$roleHasPermission));
        }
        request()->role_id ? $employee->update(['role_id' => $role->id]) : '';
        $userNewRole ? $employee->roles()->sync([request()->input('role_id'), $userNewRole->id]) : $employee->roles()->sync(request()->input('role_id'));
// dd($employee->roles()->get());
        // $employee->update($request->all());
        // $employee->permissions()->sync(request()->input('permissions', []));

        return redirect()->route('hr.admin.departments.index');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->load('role', 'permissions');

        return view('hr::admin.employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
