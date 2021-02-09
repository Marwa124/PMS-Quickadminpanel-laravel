<?php

namespace Modules\Payroll\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHourlyRateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hourly_rate_edit');
        // return true;
    }

    public function rules()
    {
        return [
            'hourly_grade' => [
                'string',
                'required',
            ],
            'hourly_rate'  => [
                'integer',
                'required',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
