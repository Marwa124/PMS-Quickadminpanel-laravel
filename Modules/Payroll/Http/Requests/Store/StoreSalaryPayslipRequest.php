<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\SalaryPayslip;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryPayslipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payslip_create');
    }

    public function rules()
    {
        return [
            'payslip_number'        => [
                'string',
                'nullable',
            ],
            'salary_payment_id'     => [
                'required',
                'integer',
            ],
            'payslip_generate_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
