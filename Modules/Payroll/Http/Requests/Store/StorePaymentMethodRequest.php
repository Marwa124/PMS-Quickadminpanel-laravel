<?php

namespace Modules\Payroll\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_method_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:payment_methods',
            ],
        ];
    }
}
