<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\SalaryAllowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_allowance_create');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'required',
                'unique:salary_allowances',
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
