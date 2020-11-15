<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryPaymentDeductionRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryPaymentDeductionRequest;
use Modules\Payroll\Entities\SalaryPayment;
use Modules\Payroll\Entities\SalaryPaymentDeduction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPaymentDeductionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payment_deduction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDeductions = SalaryPaymentDeduction::all();

        return view('payroll::admin.salaryPaymentDeductions.index', compact('salaryPaymentDeductions'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_payment_deduction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_payments = SalaryPayment::all()->pluck('payment_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.salaryPaymentDeductions.create', compact('salary_payments'));
    }

    public function store(StoreSalaryPaymentDeductionRequest $request)
    {
        $salaryPaymentDeduction = SalaryPaymentDeduction::create($request->all());

        return redirect()->route('admin.payroll.salary-payment-deductions.index');
    }

    public function destroy(SalaryPaymentDeduction $salaryPaymentDeduction)
    {
        abort_if(Gate::denies('salary_payment_deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDeduction->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryPaymentDeductionRequest $request)
    {
        SalaryPaymentDeduction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
