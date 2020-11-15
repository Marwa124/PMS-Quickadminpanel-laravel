<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryPayslipRequest;
use App\Http\Requests\UpdateSalaryPayslipRequest;
use App\Http\Resources\Admin\SalaryPayslipResource;
use App\Models\SalaryPayslip;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPayslipApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payslip_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPayslipResource(SalaryPayslip::with(['salary_payment'])->get());
    }

    public function store(StoreSalaryPayslipRequest $request)
    {
        $salaryPayslip = SalaryPayslip::create($request->all());

        return (new SalaryPayslipResource($salaryPayslip))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SalaryPayslip $salaryPayslip)
    {
        abort_if(Gate::denies('salary_payslip_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPayslipResource($salaryPayslip->load(['salary_payment']));
    }

    public function update(UpdateSalaryPayslipRequest $request, SalaryPayslip $salaryPayslip)
    {
        $salaryPayslip->update($request->all());

        return (new SalaryPayslipResource($salaryPayslip))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SalaryPayslip $salaryPayslip)
    {
        abort_if(Gate::denies('salary_payslip_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPayslip->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
