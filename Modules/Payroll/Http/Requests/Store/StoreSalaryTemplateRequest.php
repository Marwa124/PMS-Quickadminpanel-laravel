<?php

namespace Modules\Payroll\Http\Requests\Store;

use Modules\Payroll\Entities\SalaryTemplate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_template_create');
    }

    public function rules()
    {
        return [
            'designation_id'    => [
                'integer',
                'required',
                'exists:designations,id'
            ],
            'salary_grade'    => [
                'string',
                'required',
            ],
            'basic_salary'    => [
                'integer',
                'min:0',
                'max:2147483647',
                'required',
            ],
            'overtime_salary' => [
                'integer',
                'min:0',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
