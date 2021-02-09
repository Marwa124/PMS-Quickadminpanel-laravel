<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryTemplateRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryTemplateRequest;
use Modules\Payroll\Entities\SalaryTemplate;
use Gate;
use Modules\Payroll\Entities\SalaryAllowance;
use Modules\Payroll\Entities\SalaryDeduction;
use Modules\Payroll\Http\Requests\Update\UpdateSalaryTemplateRequest;
use Symfony\Component\HttpFoundation\Response;
use PDF;

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
        // !!!: Add data to Salary Allowances
        try {
            foreach ($request->allowance as $key => $value) {
                SalaryAllowance::create([
                    'name' => $key,
                    'value' => $value,
                    'salary_template_id' => $salaryTemplate->id
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        // !!!: Add data to Salary Deductions
        try {
            foreach ($request->deduction as $key => $value) {
                SalaryDeduction::create([
                    'name' => $key,
                    'value' => $value,
                    'salary_template_id' => $salaryTemplate->id
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $message = array(
            'message'    =>  ' Created Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('payroll.admin.salary-templates.index')->with($flashMsg);
    }

    public function show($id)
    {
        abort_if(Gate::denies('salary_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryTemplate = SalaryTemplate::findOrFail($id);

        return view('payroll::admin.salaryTemplates.show', compact('salaryTemplate'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('salary_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryTemplate = SalaryTemplate::findOrFail($id);

        return view('payroll::admin.salaryTemplates.edit', compact('salaryTemplate'));
    }

    public function update(UpdateSalaryTemplateRequest $request, SalaryTemplate $salaryItem, $id)
    {
        $salaryItem->update($request->all());

        // !!!: Add data to Salary Allowances
        if ($request->allowance) {
            try {
                foreach ($request->allowance as $key => $value) {
                    SalaryAllowance::create([
                        'name' => $key,
                        'value' => $value,
                        'salary_template_id' => $id
                    ]);
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        // !!!: Add data to Salary Deductions
        try {
            foreach ($request->deduction as $key => $value) {
                SalaryDeduction::create([
                    'name' => $key,
                    'value' => $value,
                    'salary_template_id' => $id
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $message = array(
            'message'    =>  ' Updated Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('payroll.admin.salary-templates.index')->with($flashMsg);
    }

    public function destroy(SalaryTemplate $salaryTemplate)
    {
        abort_if(Gate::denies('salary_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryTemplate->delete();
        $salaryTemplate->salaryAllowances()->delete();
        $salaryTemplate->salaryDeductions()->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryTemplateRequest $request)
    {
        SalaryAllowance::whereIn('salary_template_id', request('ids'))->forceDelete();
        SalaryDeduction::whereIn('salary_template_id', request('ids'))->forceDelete();
        SalaryTemplate::whereIn('id', request('ids'))->forceDelete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
