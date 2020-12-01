<?php

namespace Modules\ProjectManagement\Http\Requests;

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
            'name'               => [
                'string',
                'required',
            ],
            'status_id'          => [
                'required',
                'integer',
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
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'progress'           => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'calculate_progress' => [
                'string',
                'nullable',
            ],
            'task_hours'         => [
                'string',
                'nullable',
            ],
            'timer_status'       => [
                'required',
            ],
            'timer_started_by'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start_timer'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'logged_timer'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'created_by'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'permissions.*'      => [
                'integer',
            ],
            'permissions'        => [
                'array',
            ],
            'client_visible'     => [
                'string',
                'nullable',
            ],
            'hourly_rate'        => [
                'numeric',
            ],
            'billable'           => [
                'string',
                'required',
            ],
            'index_no'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
