<?php

namespace Modules\HR\Http\Requests\Destroy;

use Modules\HR\Entities\JobCircular;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJobCircularRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_circular_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:job_circulars,id',
        ];
    }
}
