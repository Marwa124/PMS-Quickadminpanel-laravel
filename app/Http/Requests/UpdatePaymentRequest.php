<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
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
