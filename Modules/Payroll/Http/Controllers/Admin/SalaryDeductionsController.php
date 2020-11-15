<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryDeductionRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryDeductionRequest;
use Modules\Payroll\Entities\SalaryDeduction;
use Modules\Payroll\Entities\SalaryTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryDeductionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_deduction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryDeductions = SalaryDeduction::all();

        return view('payroll::admin.salaryDeductions.index', compact('salaryDeductions'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_deduction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_templates = SalaryTemplate::all()->pluck('salary_grade', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.salaryDeductions.create', compact('salary_templates'));
    }

    public function store(StoreSalaryDeductionRequest $request)
    {
        $salaryDeduction = SalaryDeduction::create($request->all());

        return redirect()->route('admin.payroll.salary-deductions.index');
    }

    public function destroy(SalaryDeduction $salaryDeduction)
    {
        abort_if(Gate::denies('salary_deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryDeduction->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryDeductionRequest $request)
    {
        SalaryDeduction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
