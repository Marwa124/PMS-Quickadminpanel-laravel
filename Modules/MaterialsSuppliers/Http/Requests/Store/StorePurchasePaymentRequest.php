<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Store;

use Modules\MaterialsSuppliers\Entities\PurchasePayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchasePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_payment_create');
    }

    public function rules()
    {
        return [
            'payment_method' => [
                'string',
                'nullable',
            ],
            'amount'         => [
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
            'paid_to'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
