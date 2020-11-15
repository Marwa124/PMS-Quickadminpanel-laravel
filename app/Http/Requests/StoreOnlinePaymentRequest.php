<?php

namespace App\Http\Requests;

use App\Models\OnlinePayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOnlinePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('online_payment_create');
    }

    public function rules()
    {
        return [
            'gateway_name' => [
                'string',
                'required',
                'unique:online_payments',
            ],
            'icon'         => [
                'string',
                'required',
            ],
        ];
    }
}
