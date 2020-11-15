<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryAllowanceRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryAllowanceRequest;
use Modules\Payroll\Entities\SalaryAllowance;
use Modules\Payroll\Entities\SalaryTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryAllowanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_allowance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryAllowances = SalaryAllowance::all();

        return view('payroll::admin.salaryAllowances.index', compact('salaryAllowances'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_allowance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_templates = SalaryTemplate::all()->pluck('salary_grade', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.salaryAllowances.create', compact('salary_templates'));
    }

    public function store(StoreSalaryAllowanceRequest $request)
    {
        $SalaryAllowance = SalaryAllowance::create($request->all());

        return redirect()->route('admin.payroll.salary-allowances.index');
    }

    public function destroy(SalaryAllowance $SalaryAllowance)
    {
        abort_if(Gate::denies('salary_allowance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $SalaryAllowance->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryAllowanceRequest $request)
    {
        SalaryAllowance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
