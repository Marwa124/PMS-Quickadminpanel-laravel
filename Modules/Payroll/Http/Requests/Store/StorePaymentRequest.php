<?php

namespace Modules\Payroll\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_create');
    }

    public function rules()
    {
        return [
            'invoice_id'     => [
                'required',
                'integer',
            ],
            'payer_email'    => [
                'string',
                'nullable',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
            'currency'       => [
                'string',
                'nullable',
            ],
            'payment_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'paid_by'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
