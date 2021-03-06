<?php

namespace Modules\Sales\Http\Requests\Store;

use Modules\Sales\Entities\Opportunity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOpportunityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('opportunity_create');
    }

    public function rules()
    {
        return [
            'name'             => [
                'string',
                'nullable',
            ],
            'probability'      => [
                'string',
                'nullable',
            ],
            'stages'           => [
                'string',
                'nullable',
            ],
            'closed_date'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'expected_revenue' => [
                'numeric',
            ],
            'new_link'         => [
                'string',
                'nullable',
            ],
            'next_action'      => [
                'string',
                'nullable',
            ],
            'permissions.*'    => [
                'integer',
            ],
            'permissions'      => [
                'array',
            ],
        ];
    }
}
