<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\JobApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_application_edit');
    }

    public function rules()
    {
        return [
            'job_circular_id' => [
                'required',
                'integer',
            ],
            'name'            => [
                'string',
                'required',
            ],
            'mobile'          => [
                'string',
                'nullable',
            ],
            'apply_date'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'send_email'      => [
                'string',
                'nullable',
            ],
            'interview_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
