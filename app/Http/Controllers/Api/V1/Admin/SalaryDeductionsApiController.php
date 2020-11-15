<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryDeductionRequest;
use App\Http\Resources\Admin\SalaryDeductionResource;
use App\Models\SalaryDeduction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryDeductionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_deduction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryDeductionResource(SalaryDeduction::with(['salary_template'])->get());
    }

    public function store(StoreSalaryDeductionRequest $request)
    {
        $salaryDeduction = SalaryDeduction::create($request->all());

        return (new SalaryDeductionResource($salaryDeduction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(SalaryDeduction $salaryDeduction)
    {
        abort_if(Gate::denies('salary_deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryDeduction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
