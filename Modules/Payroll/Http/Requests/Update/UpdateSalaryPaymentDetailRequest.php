<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\SalaryPaymentDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryPaymentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payment_detail_edit');
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
                'unique:salary_payment_details,name,' . request()->route('salary_payment_detail')->id,
            ],
            'value'             => [
                'string',
                'required',
            ],
        ];
    }
}
