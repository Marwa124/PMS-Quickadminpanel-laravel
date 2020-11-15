<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\SalaryDeduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_deduction_create');
    }

    public function rules()
    {
        return [
            'salary_template_id' => [
                'required',
                'integer',
            ],
            'name'               => [
                'string',
                'required',
                'unique:salary_deductions',
            ],
            'value'              => [
                'string',
                'required',
            ],
        ];
    }
}
