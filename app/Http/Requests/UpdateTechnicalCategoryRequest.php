<?php

namespace App\Http\Requests;

use App\Models\TechnicalCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTechnicalCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('technical_category_edit');
    }

    public function rules()
    {
        return [
            'intermediate'  => [
                'string',
                'nullable',
            ],
            'advanced'      => [
                'string',
                'nullable',
            ],
            'expert_leader' => [
                'string',
                'nullable',
            ],
        ];
    }
}
