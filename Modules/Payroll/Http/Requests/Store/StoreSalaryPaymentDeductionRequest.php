<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\SalaryPaymentDeduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryPaymentDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payment_deduction_create');
    }

    public function rules()
    {
        return [
            'salary_payment_id' => [
                'required',
                'integer',
            ],
            'name'              => [
                'string',
                'required',
                'unique:salary_payment_deductions',
            ],
            'value'             => [
                'string',
                'required',
            ],
        ];
    }
}
