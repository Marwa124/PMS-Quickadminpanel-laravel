<?php

namespace Modules\HR\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAttendancesRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attendances_create');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'exists:users,id',
                'integer',
            ],
            'date_in'         => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'date_out'        => [
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
