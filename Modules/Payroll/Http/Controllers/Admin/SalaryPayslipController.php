<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryPayslipRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryPayslipRequest;
use Modules\Payroll\Http\Requests\Update\UpdateSalaryPayslipRequest;
use Modules\Payroll\Entities\SalaryPayment;
use Modules\Payroll\Entities\SalaryPayslip;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryPayslipController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payslip_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPayslips = SalaryPayslip::all();

        return view('payroll::admin.salaryPayslips.index', compact('salaryPayslips'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_payslip_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_payments = SalaryPayment::all()->pluck('payment_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.salaryPayslips.create', compact('salary_payments'));
    }

    public function store(StoreSalaryPayslipRequest $request)
    {
        $salaryPayslip = SalaryPayslip::create($request->all());

        return redirect()->route('admin.payroll.salary-payslips.index');
    }

    public function edit(SalaryPayslip $salaryPayslip)
    {
        abort_if(Gate::denies('salary_payslip_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_payments = SalaryPayment::all()->pluck('payment_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaryPayslip->load('salary_payment');

        return view('payroll::admin.salaryPayslips.edit', compact('salary_payments', 'salaryPayslip'));
    }

    public function update(UpdateSalaryPayslipRequest $request, SalaryPayslip $salaryPayslip)
    {
        $salaryPayslip->update($request->all());

        return redirect()->route('admin.payroll.salary-payslips.index');
    }

    public function show(SalaryPayslip $salaryPayslip)
    {
        abort_if(Gate::denies('salary_payslip_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPayslip->load('salary_payment');

        return view('payroll::admin.salaryPayslips.show', compact('salaryPayslip'));
    }

    public function destroy(SalaryPayslip $salaryPayslip)
    {
        abort_if(Gate::denies('salary_payslip_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPayslip->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryPayslipRequest $request)
    {
        SalaryPayslip::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
