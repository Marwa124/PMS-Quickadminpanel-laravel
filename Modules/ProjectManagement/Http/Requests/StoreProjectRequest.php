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
            'name_en'               => [
                'string',
                'required',
                //'regex:/^[a-zA-Z0-9 ]+$/u',
                'min:3|max:255',
                'unique:projects,name_en',
            ],
            'name_ar'               => [
                'string',
                'required',
                //'regex:/^[اأإء-ي ][1-9]+$/ui',
                'min:3|max:255',
                'unique:projects,name_ar',
            ],
            'client_id'          => [
                'required',
                'exists:clients,id'
            ],
            'department_id'          => [
                'required',
                'exists:departments,id'
            ],
//            'progress'           => [
//                'string',
//                'nullable',
//            ],
            'calculate_progress' => [
                'string',
                'required',
                'between:0,100'
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
//            'alert_overdue'      => [
//                'required',
//                'integer',
//                'min:0',
//                'max:1',
//            ],
            'project_cost'       => [
                'required',
                'numeric',
            ],
            'demo_url'           => [
                'string',
                //'regex:/^[a-zA-Z][1-9]*+$/u',
                'nullable',
            ],
            'project_status'     => [
                'required',
                'string',
                'in:started,in_progress,on_hold,cancel,completed,overdue',
            ],
            'estimate_hours'     => [
                'numeric',
                'nullable',
            ],
            'description_en'     => [
                'string',
                'regex:/^[a-zA-Z ][1-9]*+$/u',
                'nullable',
            ],
            'description_ar'     => [
                'string',
                'regex:/^[اأإء-ي ][1-9]*+$/ui',
                'nullable',
            ],
        ];
    }
}
