<?php

namespace Modules\Payroll\Http\Requests\Destroy;

use App\Models\AdvanceSalary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdvanceSalaryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('advance_salary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:advance_salaries,id',
        ];
    }
}
