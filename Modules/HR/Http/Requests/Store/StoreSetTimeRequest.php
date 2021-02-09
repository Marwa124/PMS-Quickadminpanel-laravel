<?php

namespace Modules\HR\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreSetTimeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('set_time_create');
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'in_time' => [
                'required',
                // 'date_format:' . config('panel.time_format_hour'),
            ],
            'out_time'   => [
                'required',
            ],
            'allow_clock_in_late' => [
                'nullable',
            ],
            'allow_leave_early'   => [
                'nullable',
            ],
        ];
    }
}
