<?php

namespace Modules\HR\Http\Requests\Destroy;

use Modules\HR\Entities\EmployeeAward;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmployeeAwardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('employee_award_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:employee_awards,id',
        ];
    }
}
