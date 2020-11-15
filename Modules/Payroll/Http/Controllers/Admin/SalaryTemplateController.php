<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryTemplateRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryTemplateRequest;
use Modules\Payroll\Entities\SalaryTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryTemplates = SalaryTemplate::all();

        return view('payroll::admin.salaryTemplates.index', compact('salaryTemplates'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('payroll::admin.salaryTemplates.create');
    }

    public function store(StoreSalaryTemplateRequest $request)
    {
        $salaryTemplate = SalaryTemplate::create($request->all());

        return redirect()->route('admin.payroll.salary-templates.index');
    }

    public function destroy(SalaryTemplate $salaryTemplate)
    {
        abort_if(Gate::denies('salary_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryTemplate->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryTemplateRequest $request)
    {
        SalaryTemplate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
