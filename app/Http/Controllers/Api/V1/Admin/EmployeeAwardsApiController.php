<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeAwardRequest;
use App\Http\Requests\UpdateEmployeeAwardRequest;
use App\Http\Resources\Admin\EmployeeAwardResource;
use App\Models\EmployeeAward;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeAwardsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('employee_award_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeAwardResource(EmployeeAward::with(['user'])->get());
    }

    public function store(StoreEmployeeAwardRequest $request)
    {
        $employeeAward = EmployeeAward::create($request->all());

        return (new EmployeeAwardResource($employeeAward))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EmployeeAward $employeeAward)
    {
        abort_if(Gate::denies('employee_award_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeAwardResource($employeeAward->load(['user']));
    }

    public function update(UpdateEmployeeAwardRequest $request, EmployeeAward $employeeAward)
    {
        $employeeAward->update($request->all());

        return (new EmployeeAwardResource($employeeAward))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EmployeeAward $employeeAward)
    {
        abort_if(Gate::denies('employee_award_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeAward->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
