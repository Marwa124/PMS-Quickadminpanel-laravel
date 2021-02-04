<?php

namespace Modules\Sales\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Sales\Entities\Lead;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class CloneProposalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'id' => 'exists:proposals,id',
            'module'         => [
                'string',
                'required',
            ],
            'module_id'         => [
                'integer',
                'required',
            ],
            'proposal_date'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'expire_date'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
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
