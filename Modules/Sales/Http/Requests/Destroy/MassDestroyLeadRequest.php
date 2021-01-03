<?php

namespace Modules\Sales\Http\Requests\Destroy;
use Modules\Sales\Entities\Lead;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class MassDestroyLeadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:leads,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('lead_in_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }
}
