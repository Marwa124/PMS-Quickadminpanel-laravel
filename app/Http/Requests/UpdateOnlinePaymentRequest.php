<?php

namespace App\Http\Requests;

use App\Models\OnlinePayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOnlinePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('online_payment_edit');
    }

    public function rules()
    {
        return [
            'gateway_name' => [
                'string',
                'required',
                'unique:online_payments,gateway_name,' . request()->route('online_payment')->id,
            ],
            'icon'         => [
                'string',
                'required',
            ],
        ];
    }
}
