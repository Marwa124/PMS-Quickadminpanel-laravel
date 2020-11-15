<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\SalaryAllowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_allowance_edit');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'required',
                'unique:salary_allowances,name,' . request()->route('salary_allowance')->id,
            ],
            'value'              => [
                'string',
                'required',
            ],
            'salary_template_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
