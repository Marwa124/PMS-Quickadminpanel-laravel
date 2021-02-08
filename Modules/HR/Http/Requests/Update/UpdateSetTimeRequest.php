<?php

namespace Modules\HR\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
class UpdateSetTimeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('set_time_edit');
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
                'date_format:' . config('panel.time_format_hour'),
            ],
            'out_time'   => [
                'required',
                'date_format:' . config('panel.time_format_hour'),
            ],
            'allow_clock_in_late' => [
                'nullable',
                'date_format:' . config('panel.time_format_hour'),
            ],
            'allow_leave_early'   => [
                'nullable',
                'date_format:' . config('panel.time_format_hour'),
            ],
        ];
    }
}
