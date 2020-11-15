<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryPaymentAllowanceRequest;
use App\Http\Resources\Admin\SalaryPaymentAllowanceResource;
use App\Models\SalaryPaymentAllowance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentAllowanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payment_allowance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPaymentAllowanceResource(SalaryPaymentAllowance::with(['salary_payment'])->get());
    }

    public function store(StoreSalaryPaymentAllowanceRequest $request)
    {
        $salaryPaymentAllowance = SalaryPaymentAllowance::create($request->all());

        return (new SalaryPaymentAllowanceResource($salaryPaymentAllowance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(SalaryPaymentAllowance $salaryPaymentAllowance)
    {
        abort_if(Gate::denies('salary_payment_allowance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentAllowance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
