<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use App\Models\User;
use Modules\HR\Http\Requests\Destroy\MassDestroyDesignationRequest;
use Modules\HR\Http\Requests\Store\StoreDesignationRequest;
use Modules\HR\Http\Requests\Update\UpdateDesignationRequest;
use Modules\HR\Entities\Department;
use Modules\HR\Entities\Designation;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\AccountDetail;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class DesignationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('designation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all();

        return view('hr::admin.designations.index', compact('designations'));
    }

    public function create()
    {
        abort_if(Gate::denies('designation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = AccountDetail::all()->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.designations.create', compact('departments', 'users'));
    }

    public function store(StoreDesignationRequest $request)
    {
        $designation = Designation::create($request->all());
        return redirect()->route('hr.admin.designations.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('designation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $designation = Designation::findOrFail($id);
        $users = AccountDetail::all()->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::get()->groupBy('permission_group_id');

        $userLead = $designation->designationLeader()->first();
        $userPermissions = $userLead ? $userLead->getPermissionNames()->toArray() : [];

        return view('hr::admin.designations.edit', compact('departments', 'users', 'designation', 'permissions', 'userPermissions'));
    }

    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        $user = User::findOrFail(request()->designation_leader_id);

        if (!$request->designation_leader_id) {
            $user = $designation->designationLeader()->first();
        }

        $user->syncPermissions(request()->permissions);

        $designation->update($request->except(['permissions']));

        return redirect()->route('hr.admin.designations.index');
    }

    public function show(Designation $designation)
    {
        abort_if(Gate::denies('designation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designation->load('department');

        return view('hr::admin.designations.show', compact('designation'));
    }

    public function destroy(Designation $designation)
    {
        abort_if(Gate::denies('designation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designation->delete();

        return back();
    }

    public function massDestroy(MassDestroyDesignationRequest $request)
    {
        Designation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
