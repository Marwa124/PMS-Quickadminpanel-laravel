<?php

namespace Modules\Payroll\Http\Requests\Destroy;

use App\Models\SalaryDeduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySalaryDeductionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('salary_deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:salary_deductions,id',
        ];
    }
}
