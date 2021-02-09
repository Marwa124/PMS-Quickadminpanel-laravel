<?php

namespace Modules\Payroll\Http\Requests\Store;

use App\Models\HourlyRate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHourlyRateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hourly_rate_create');
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
