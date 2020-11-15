<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\SalaryPayslip;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryPayslipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payslip_edit');
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
