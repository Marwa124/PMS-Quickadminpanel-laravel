<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_create');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'required',
                'unique:projects,name',
            ],
            'client_id'          => [
                'required',
                'exists:clients,id'
            ],
            'progress'           => [
                'string',
                'nullable',
            ],
            'calculate_progress' => [
                'string',
                'nullable',
            ],
            'start_date'         => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'           => [
                'required',
                'date_format:' . config('panel.date_format'),
                'after_or_equal:start_date',
            ],
//            'actual_completion'  => [
//                'string',
//                'required',
//            ],
            'alert_overdue'      => [
                'required',
                'integer',
                'min:0',
                'max:1',
            ],
            'project_cost'       => [
                'required',
                'numeric',
            ],
            'demo_url'           => [
                'string',
                'nullable',
            ],
            'project_status'     => [
                'required',
                'string',
                //'nullable',
            ],
//            'timer_started_by'   => [
//                'nullable',
//                'integer',
//                'min:-2147483648',
//                'max:2147483647',
//            ],
//            'permissions.*'      => [
//                'integer',
//            ],
//            'permissions'        => [
//                'array',
//            ],
//            'with_tasks'         => [
//                'required',
//            ],
            'estimate_hours'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
