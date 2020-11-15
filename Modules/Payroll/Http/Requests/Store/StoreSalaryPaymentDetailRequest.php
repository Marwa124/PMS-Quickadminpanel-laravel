<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\SalaryPaymentDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryPaymentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payment_detail_create');
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
                'unique:salary_payment_details',
            ],
            'value'             => [
                'string',
                'required',
            ],
        ];
    }
}
