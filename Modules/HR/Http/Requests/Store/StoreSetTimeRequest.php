<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\SetTime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
