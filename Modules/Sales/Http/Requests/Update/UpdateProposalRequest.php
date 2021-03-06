<?php

namespace Modules\Sales\Http\Requests\Update;

use Modules\Sales\Entities\Proposal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProposalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proposal_edit');
    }

    public function rules()
    {
        return [
            'reference_no'   => [
                'string',
                'nullable',
            ],
            'subject'        => [
                'string',
                'required',
            ],
            'module'         => [
                'string',
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
            'currency'       => [
                'string',
                'nullable',
            ],
            'total_tax'      => [
                // 'string',
                'nullable',
            ],
            'status'         => [
                // 'string',
                'nullable',
            ],
            'date_sent'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'convert_module' => [
                'string',
                'nullable',
            ],
            // 'permissions.*'  => [
            //     'integer',
            // ],
            // 'permissions'    => [
            //     'array',
            // ],
        ];
    
    }
}
