<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\TaskTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_tag_create');
    }

    public function rules()
    {
        return [
            'name_en' => [
                'string',
                'required',
                'unique:task_tags,name_en',
            ],

            'name_ar' => [
                'string',
                'required',
                'unique:task_tags,name_ar',
            ],
        ];
    }
}
