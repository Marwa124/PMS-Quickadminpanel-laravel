<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\SalaryDeduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_deduction_edit');
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
                'unique:salary_deductions,name,' . request()->route('salary_deduction')->id,
            ],
            'value'              => [
                'string',
                'required',
            ],
        ];
    }
}
