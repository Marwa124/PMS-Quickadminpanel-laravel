<?php

namespace Modules\HR\Http\Requests\store;

use Modules\HR\Entities\JobApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_application_create');
    }

    public function rules()
    {
        return [
            // 'job_circular_id' => [
            //     'required',
            //     'integer',
            // ],
            'name'            => [
                'string',
                'required',
            ],
            'mobile'          => [
                'required',
                'regex:/(^\+(?:[0-9]?){6,14}[0-9]$)|(^01(1|2|0|5)[0-9]{8}$)/'
            ],
            'email'      => [
                // 'email',
                'required',
            ],
            'resume'          => [
                'required'
            ]
            // 'apply_date'      => [
            //     'date_format:' . config('panel.date_format'),
            //     'nullable',
            // ],
            // 'interview_date'  => [
            //     'date_format:' . config('panel.date_format'),
            //     'nullable',
            // ],
        ];
    }
}
