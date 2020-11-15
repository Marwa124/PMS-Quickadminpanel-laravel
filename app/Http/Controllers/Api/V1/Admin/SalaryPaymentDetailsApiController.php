<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryPaymentDetailRequest;
use App\Http\Resources\Admin\SalaryPaymentDetailResource;
use App\Models\SalaryPaymentDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentDetailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payment_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPaymentDetailResource(SalaryPaymentDetail::with(['salary_payment'])->get());
    }

    public function store(StoreSalaryPaymentDetailRequest $request)
    {
        $salaryPaymentDetail = SalaryPaymentDetail::create($request->all());

        return (new SalaryPaymentDetailResource($salaryPaymentDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(SalaryPaymentDetail $salaryPaymentDetail)
    {
        abort_if(Gate::denies('salary_payment_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
