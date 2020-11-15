<?php

namespace Modules\Payroll\Http\Requests\Destroy;

use App\Models\SalaryPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySalaryPaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('salary_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:salary_payments,id',
        ];
    }
}
