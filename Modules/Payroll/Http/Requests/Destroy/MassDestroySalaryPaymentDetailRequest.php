<?php

namespace Modules\Payroll\Http\Requests\Destroy;

use App\Models\SalaryPaymentDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySalaryPaymentDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('salary_payment_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:salary_payment_details,id',
        ];
    }
}
