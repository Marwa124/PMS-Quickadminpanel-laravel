<?php

namespace Modules\Sales\Http\Requests\Destroy;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Sales\Entities\Country;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypeRequest extends FormRequest
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
            'ids.*' => 'exists:types,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
