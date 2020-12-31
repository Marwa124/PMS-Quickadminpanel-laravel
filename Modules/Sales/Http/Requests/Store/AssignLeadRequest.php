<?php

namespace Modules\Sales\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Sales\Entities\Lead;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class AssignLeadRequest extends FormRequest
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
            'user'         => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //  return Gate::allows('proposal_create');
        return true;
    }
}
