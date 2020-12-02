<?php

namespace Modules\Sales\Http\Requests\Destory;

use Modules\Sales\Entities\InterestedIn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInterestedInRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('interested_in_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:interested_ins,id',
        ];
    }
}
