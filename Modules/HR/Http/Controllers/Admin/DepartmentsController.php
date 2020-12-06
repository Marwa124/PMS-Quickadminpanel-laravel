<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Department;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\Designation;
use Modules\HR\Http\Request\Destroy\MassDestroyDepartmentRequest;
use Modules\HR\Http\Requests\Store\StoreDepartmentRequest;
use Modules\HR\Http\Requests\Update\UpdateDepartmentRequest;
use stdClass;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->designation_id) {
            $department_id = Designation::find($request->designation_id)->department()->first();
            $userAccounts = AccountDetail::where('designation_id', $request->designation_id)->get();
            $department_head_id = Designation::find($request->designation_id)
                ->department->department_head()->select('id')->first();

            $department_head = AccountDetail::where('user_id', $department_head_id->id)->get() ? AccountDetail::where('user_id', $department_head_id->id)->select('fullname')->first() : '';
            return view('hr::admin.departments.body_form', compact('result', 'department_id', 'department_head', 'userAccounts'));

        }
        return view('hr::admin.departments.index');

        return view('hr::admin.departments.index', compact('result', 'department', 'department_head', 'designationId', 'designationName'));
    }

    public function designationsDepartment(Request $request)
    {
        $designations =  Designation::where('department_id', $request->department_id)->pluck('designation_name', 'id');

        return response()->json(json_decode($designations));
    }

    public function create()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department_heads = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.departments.create', compact('department_heads'));
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->all());

        return redirect()->route('hr.admin.departments.index');
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department_heads = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department->load('department_head');

        return view('hr::admin.departments.edit', compact('department_heads', 'department'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->all());

        return redirect()->route('hr.admin.departments.index');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->load('department_head', 'departmentDesignations');

        return view('hr::admin.departments.show', compact('department'));
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartmentRequest $request)
    {
        Department::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
