<?php

namespace Modules\Payroll\Http\Requests\Update;

use App\Models\HourlyRate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
            ],
        ];
    }
}
