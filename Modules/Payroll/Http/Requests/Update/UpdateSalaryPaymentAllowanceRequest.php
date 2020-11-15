<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\SalaryPaymentAllowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryPaymentAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payment_allowance_edit');
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
                'unique:salary_payment_allowances,name,' . request()->route('salary_payment_allowance')->id,
            ],
            'value'             => [
                'string',
                'required',
            ],
        ];
    }
}
