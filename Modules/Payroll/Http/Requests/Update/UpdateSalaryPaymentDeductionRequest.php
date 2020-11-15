<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\SalaryPaymentDeduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryPaymentDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payment_deduction_edit');
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
                'unique:salary_payment_deductions,name,' . request()->route('salary_payment_deduction')->id,
            ],
            'value'             => [
                'string',
                'required',
            ],
        ];
    }
}
