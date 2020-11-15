<?php

namespace App\Http\Requests;

use App\Models\OnlinePayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOnlinePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('online_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:online_payments,id',
        ];
    }
}
