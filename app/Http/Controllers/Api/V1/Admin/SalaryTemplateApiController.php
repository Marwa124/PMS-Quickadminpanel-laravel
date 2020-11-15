<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryTemplateRequest;
use App\Http\Resources\Admin\SalaryTemplateResource;
use Modules\Payroll\Entities\SalaryTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryTemplateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryTemplateResource(SalaryTemplate::all());
    }

    public function store(StoreSalaryTemplateRequest $request)
    {
        $salaryTemplate = SalaryTemplate::create($request->all());

        return (new SalaryTemplateResource($salaryTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(SalaryTemplate $salaryTemplate)
    {
        abort_if(Gate::denies('salary_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryTemplate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
