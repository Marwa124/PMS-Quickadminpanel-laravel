<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSalaryPaymentRequest;
use App\Http\Requests\UpdateSalaryPaymentRequest;
use App\Http\Resources\Admin\SalaryPaymentResource;
use App\Models\SalaryPayment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('salary_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPaymentResource(SalaryPayment::with(['user'])->get());
    }

    public function store(StoreSalaryPaymentRequest $request)
    {
        $salaryPayment = SalaryPayment::create($request->all());

        return (new SalaryPaymentResource($salaryPayment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SalaryPayment $salaryPayment)
    {
        abort_if(Gate::denies('salary_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryPaymentResource($salaryPayment->load(['user']));
    }

    public function update(UpdateSalaryPaymentRequest $request, SalaryPayment $salaryPayment)
    {
        $salaryPayment->update($request->all());

        return (new SalaryPaymentResource($salaryPayment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SalaryPayment $salaryPayment)
    {
        abort_if(Gate::denies('salary_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPayment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
