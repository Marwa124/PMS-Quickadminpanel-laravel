<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\AdvanceSalary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdvanceSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('advance_salary_edit');
    }

    public function rules()
    {
        return [
            'user_id'        => [
                'required',
                'integer',
            ],
            'advance_amount' => [
                'string',
                'required',
            ],
            'deduct_month'   => [
                'string',
                'nullable',
            ],
            'request_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'status'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'approve_by'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
