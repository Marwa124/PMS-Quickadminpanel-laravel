<?php

namespace Modules\HR\Http\Requests\store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_application_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'mobile'          => [
                'required',
                'regex:/(^\+(?:[0-9]?){6,14}[0-9]$)|(^01(1|2|0|5)[0-9]{8}$)/'
            ],
            'email'      => [
                'email',
                'required',
            ],
            'resume'          => [
                'required'
            ]
        ];
    }
}
