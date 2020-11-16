<?php

namespace Modules\HR\Http\Requests\Destroy;

use Modules\HR\Entities\attendances;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAttendancesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('attendances_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:attendances,id',
        ];
    }
}
