<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\AdvanceSalary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdvanceSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('advance_salary_create');
        // return true;
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'integer',
                'required',
            ],
            'month' => [
                'string',
                'nullable',
            ],
            'reason' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => trans('cruds.accountDetail.salaryForm.amount'),
            'amount.integer' => trans('cruds.accountDetail.salaryForm.amount_int'),
            'type.required'   => trans('cruds.accountDetail.salaryForm.type'),
            'type.string'   => trans('cruds.accountDetail.salaryForm.type_str'),
        ];
    }
}
