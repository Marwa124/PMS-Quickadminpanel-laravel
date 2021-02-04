<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_edit');
    }

    public function rules()
    {
        return [
            'name_en'               => [
                'string',
                'required',
                'unique:tasks,name,'. request()->route('task')->id.',id,milestone_id,'.request()->milestone_id,
            ],
            'name_ar'               => [
                'string',
                'required',
                'unique:tasks,name,'. request()->route('task')->id.',id,milestone_id,'.request()->milestone_id,
            ],
            'status'          => [
                'required',
                //'integer',
            ],
            'tags.*'             => [
                'integer',
            ],
            'tags'               => [
                'array',
            ],
            'start_date'         => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'due_date'           => [
                'required',
                'date_format:' . config('panel.date_format'),
                'after_or_equal:start_date',
            ],
//            'progress'           => [
//                'required',
//                'nullable',
//                'integer',
//                'min:-2147483648',
//                'max:2147483647',
//            ],
            'calculate_progress' => [
                'string',
                'nullable',
            ],
            'task_hours'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
