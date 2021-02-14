<?php

namespace Modules\Sales\Http\Requests\Update;

use Modules\Sales\Entities\MeetingMinute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMeetingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('meeting_edit');
    }

    public function rules()
    {
        return [
            'user_id'  => [
                'required',
                'integer',
            ],
            'name'     => [
                'string',
                'required',
            ],
            'start_date'  => [
                'required',
                'date_format:' . config('panel.date_time_format'),
            ],
            'end_date'    => [
                'date_format:' . config('panel.date_time_format'),
                'required',
            ],
            'location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
