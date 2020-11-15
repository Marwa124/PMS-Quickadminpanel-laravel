<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\EmployeeAward;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeAwardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_award_create');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
            ],
            'user_id'      => [
                'required',
                'integer',
            ],
            'gift_item'    => [
                'string',
                'nullable',
            ],
            'award_amount' => [
                'required',
            ],
            'given_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
