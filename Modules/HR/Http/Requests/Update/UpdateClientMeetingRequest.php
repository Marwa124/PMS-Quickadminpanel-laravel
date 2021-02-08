<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\ClientMeeting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientMeetingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_request_edit');
    }

    public function rules()
    {
        return [
            'users'     => [
                'required',
                'array',
            ],

            'users.*' => ['exists:users,id'],

            'request_type' => [
                'required',
                'in:survey,client_meeting'
            ],
            'day' => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'day_hour'    => [
                'string',
                'in:day,hour',
                'nullable',
            ],
            'comments'     => [
                'nullable',
                'string',
                'min:-2147483648',
                'max:2147483647',
            ],
            'from_time'      => [
                // 'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'to_time'            => [
                // 'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
