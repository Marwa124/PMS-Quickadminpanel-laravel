<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\TaskTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_tag_edit');
    }

    public function rules()
    {
        return [
            'name_en' => [
                'string',
                'required',
                'unique:task_tags,name_en,' . request()->route('task_tag')->id,
            ],
            'name_ar' => [
                'string',
                'required',
                'unique:task_tags,name_ar,' . request()->route('task_tag')->id,
            ],
        ];
    }
}
