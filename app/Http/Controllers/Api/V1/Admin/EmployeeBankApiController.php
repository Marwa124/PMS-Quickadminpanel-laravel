<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeBankRequest;
use App\Http\Requests\UpdateEmployeeBankRequest;
use App\Http\Resources\Admin\EmployeeBankResource;
use App\Models\EmployeeBank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeBankApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('employee_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeBankResource(EmployeeBank::with(['user'])->get());
    }

    public function store(StoreEmployeeBankRequest $request)
    {
        $employeeBank = EmployeeBank::create($request->all());

        return (new EmployeeBankResource($employeeBank))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EmployeeBank $employeeBank)
    {
        abort_if(Gate::denies('employee_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeBankResource($employeeBank->load(['user']));
    }

    public function update(UpdateEmployeeBankRequest $request, EmployeeBank $employeeBank)
    {
        $employeeBank->update($request->all());

        return (new EmployeeBankResource($employeeBank))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EmployeeBank $employeeBank)
    {
        abort_if(Gate::denies('employee_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeBank->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
