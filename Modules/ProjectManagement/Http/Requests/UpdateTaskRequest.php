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
                //'regex:/^[a-zA-Z ]+$/u',
                'min:3|max:255',
                'unique:tasks,name_en,'. request()->route('task')->id.',id,milestone_id,'.request()->milestone_id,
            ],
            'name_ar'               => [
                'string',
                'required',
                //'regex:/^[ اأإء-ي ]+$/ui',
                'min:3|max:255',
                'unique:tasks,name_ar,'. request()->route('task')->id.',id,milestone_id,'.request()->milestone_id,
            ],
            'status'          => [
                'required',
                'in:not_started,in_progress,completed,deffered,waiting_someone',
            ],
            'tags.*'             => [
                'integer',
                'exists:task_tags,id'
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
                'exists:projects,id'
            ],
            'milestone_id'           => [
                'required',
                'exists:milestones,id'
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
                'required',
                'between:0,100'
            ],
            'task_hours'         => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
