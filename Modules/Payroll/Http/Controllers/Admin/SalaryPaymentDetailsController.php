<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryPaymentDetailRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryPaymentDetailRequest;
use Modules\Payroll\Entities\SalaryPayment;
use Modules\Payroll\Entities\SalaryPaymentDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payment_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDetails = SalaryPaymentDetail::all();

        return view('payroll::admin.salaryPaymentDetails.index', compact('salaryPaymentDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_payment_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_payments = SalaryPayment::all()->pluck('payment_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.salaryPaymentDetails.create', compact('salary_payments'));
    }

    public function store(StoreSalaryPaymentDetailRequest $request)
    {
        $salaryPaymentDetail = SalaryPaymentDetail::create($request->all());

        return redirect()->route('admin.payroll.salary-payment-details.index');
    }

    public function destroy(SalaryPaymentDetail $salaryPaymentDetail)
    {
        abort_if(Gate::denies('salary_payment_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryPaymentDetailRequest $request)
    {
        SalaryPaymentDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
