<?php

namespace Modules\HR\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Modules\HR\Http\Controllers\Controller;

use Modules\HR\Http\Resources\Admin\DepartmentResource;

use Modules\HR\Entities\Department;
use Modules\HR\Http\Requests\Update\UpdateDepartmentRequest;
use Modules\HR\Http\Requests\Store\StoreDepartmentRequest;

use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\Designation;
use Modules\HR\Http\Controllers\Services\DepartmentExportServices;
use Symfony\Component\HttpFoundation\Response;

class DepartmentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DepartmentResource(Department::with(['department_head'])->get());
    }

    public function departmentListVue()
    {
        $model   = Department::select('id', 'department_name', 'department_head_id')
                        ->with('departmentDesignations')
                        ->with('department_head_account')
                        ->searchPaginateOrder();
        $columns = Department::$columns;
        $searchable = Department::$searchable;

        $constructDataExport = (new DepartmentExportServices())->dataExportedConstruct($model);

        return response()->json([
            'model'   => $model,
            'columns' => $columns,
            'searchable' => $searchable,
            'dataExport' => $constructDataExport
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create([
            'department_name' => $request->department_name,
            'department_head_id' => $request->user_head_department ? $request->user_head_department['user_id'] : null,
        ]);

        if ($request->designations) {
            foreach ($request->designations as $key => $designation) {
                $designation = Designation::find($designation['id']);
                $designation->update(['department_id' => $department->id]);
            }
        }

        return (new DepartmentResource($department->load(['department_head_account', 'departmentDesignations'])))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::where('department_id', $department->id)->get();

        return response()->json([
            // 'department' => new DepartmentResource($department->load(['department_head'])),
            'department' => new DepartmentResource($department->load(['department_head_account'])),
            'designations' => $designations,

            'permissions' => $department->department_head->getPermissionNames(),
        ]);

        // return new DepartmentResource($department->load(['department_head']));

    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->only(['department_name']));

        if ($request->user_head_department) {
            $department->update(['department_head_id' => $request->user_head_department['user_id']]);
        }
        if ($request->designations) {
            $designations = Designation::where('department_id', $department->id)->get();
            foreach ($request->designations as $key => $designation) {
                $designation = Designation::find($designation['id']);
                foreach ($designations as $value) {
                    if ($value->id != $designation->id) {
                        $value->update(['department_id' => 0]);
                    }
                }
                $designation->update(['department_id' => $department->id]);
            }
        }

        return (new DepartmentResource($department))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function setDepartmentPermissions($id = null)
    {
        if ($id) {
            $msg = ""; $status = 200;
            if (request()->department_head) {
                $user = User::find(request()->department_head['user_id']);
                $user->syncPermissions(request()->permissions);
            }else {
                $msg = "Department Head is Required";
                $status = 406;
            }
            return response($msg, $status);
        }
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($department->departmentDesignations()->get()->count() != 0) {
            return response()->json(['status' => '406']);
        }else{
            $department->forceDelete();
        }

        // return response()->json(['status' => '200']);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
