<?php

namespace App\Http\Requests;

use App\Models\Opportunity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOpportunityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('opportunity_edit');
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
