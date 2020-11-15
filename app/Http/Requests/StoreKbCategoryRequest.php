<?php

namespace App\Http\Requests;

use App\Models\KbCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKbCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kb_category_create');
    }

    public function rules()
    {
        return [
            'name'   => [
                'string',
                'required',
                'unique:kb_categories',
            ],
            'type'   => [
                'string',
                'required',
            ],
            'sort'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
