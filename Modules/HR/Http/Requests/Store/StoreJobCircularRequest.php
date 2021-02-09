<?php

namespace Modules\HR\Http\Requests\store;

use Modules\HR\Entities\JobCircular;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobCircularRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_circular_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'designation_id'  => [
                'required',
                'exists:designations,id'
            ],
            'vacancy_no'      => [
                'string',
                'nullable',
            ],
            'posted_date'     => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'employment_type' => [
                'required',
                'in:contractual,full_time,part_time'
            ],
            'experience'      => [
                'integer',
                'max:50',
                'min:0',
                'nullable',
            ],
            'age'             => [
                'integer',
                'max:59',
                'min:18',
                'nullable',
            ],
            'salary_range'    => [
                'integer',
                'max:50000',
                'min:0',
                'nullable',
            ],
            'last_date'       => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'status'          => [
                'in:unpublished, published'
            ]
        ];
    }
}
