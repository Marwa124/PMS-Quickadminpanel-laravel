<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'name_en'               => [
                'string',
                'required',
                'unique:projects,name_en,' . request()->route('project')->id,
            ],
            'name_ar'               => [
                'string',
                'required',
                'unique:projects,name_ar,' . request()->route('project')->id,
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
            ],
            'estimate_hours'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
