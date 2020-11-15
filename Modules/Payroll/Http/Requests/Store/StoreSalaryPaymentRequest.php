<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\SalaryPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_payment_create');
    }

    public function rules()
    {
        return [
            'user_id'        => [
                'required',
                'integer',
            ],
            'payment_amount' => [
                'string',
                'required',
            ],
            'fine_deductio'  => [
                'string',
                'required',
            ],
            'payment_type'   => [
                'string',
                'required',
            ],
            'paid_date'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'deduct_from'    => [
                'string',
                'required',
            ],
        ];
    }
}
