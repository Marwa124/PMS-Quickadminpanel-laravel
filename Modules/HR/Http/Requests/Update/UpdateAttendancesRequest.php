<?php

namespace Modules\HR\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAttendancesRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attendancss_edit');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'integer',
            ],
            'date_in'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_out'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'clocking_status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
