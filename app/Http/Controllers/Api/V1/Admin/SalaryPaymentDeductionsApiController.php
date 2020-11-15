<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryPaymentDeductionRequest;
use App\Http\Resources\Admin\SalaryPaymentDeductionResource;
use App\Models\SalaryPaymentDeduction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentDeductionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payment_deduction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPaymentDeductionResource(SalaryPaymentDeduction::with(['salary_payment'])->get());
    }

    public function store(StoreSalaryPaymentDeductionRequest $request)
    {
        $salaryPaymentDeduction = SalaryPaymentDeduction::create($request->all());

        return (new SalaryPaymentDeductionResource($salaryPaymentDeduction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(SalaryPaymentDeduction $salaryPaymentDeduction)
    {
        abort_if(Gate::denies('salary_payment_deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDeduction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
