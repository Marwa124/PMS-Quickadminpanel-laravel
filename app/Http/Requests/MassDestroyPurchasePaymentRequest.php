<?php

namespace App\Http\Requests;

use App\Models\PurchasePayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchasePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchase_payments,id',
        ];
    }
}
