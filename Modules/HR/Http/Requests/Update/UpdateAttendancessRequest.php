<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\attendances;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAttendancesRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attendances_edit');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'integer',
            ],
            'time'         => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
        ];
    }
}
