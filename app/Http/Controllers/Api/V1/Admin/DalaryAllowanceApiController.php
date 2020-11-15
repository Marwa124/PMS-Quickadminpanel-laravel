<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoresalaryAllowanceRequest;
use App\Http\Resources\Admin\salaryAllowanceResource;
use App\Models\salaryAllowance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class salaryAllowanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_allowance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new salaryAllowanceResource(salaryAllowance::with(['salary_template'])->get());
    }

    public function store(StoresalaryAllowanceRequest $request)
    {
        $salaryAllowance = salaryAllowance::create($request->all());

        return (new salaryAllowanceResource($salaryAllowance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(salaryAllowance $salaryAllowance)
    {
        abort_if(Gate::denies('salary_allowance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryAllowance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
