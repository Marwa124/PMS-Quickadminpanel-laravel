<?php

namespace Modules\ProjectManagement\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\ProjectManagement\Entities\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_create');
    }

    public function rules()
    {
        return [
            'name_en'               => [
                'string',
                'required',
                Rule::unique('tasks','name_en')->where(function($query) {

                    $query->where('milestone_id', '=', request()->milestone_id);

                }),
            ],
            'name_ar'               => [
                'string',
                'required',
                Rule::unique('tasks','name_ar')->where(function($query) {

                    $query->where('milestone_id', '=', request()->milestone_id);

                }),
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
            'project_id'           => [
                'required',
            ],
            'milestone_id'           => [
                'required',
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
            'created_by'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],

            'hourly_rate'        => [
                'numeric',
            ],

        ];
    }
}
