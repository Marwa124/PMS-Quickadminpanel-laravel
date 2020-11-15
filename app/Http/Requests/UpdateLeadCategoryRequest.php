<?php

namespace App\Http\Requests;

use App\Models\LeadCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeadCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_category_edit');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
                'unique:lead_categories,name,' . request()->route('lead_category')->id,
            ],
            'type'     => [
                'string',
                'nullable',
            ],
            'order_no' => [
                'string',
                'nullable',
            ],
        ];
    }
}
