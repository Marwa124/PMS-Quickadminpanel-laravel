<?php


namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\MeetingMinute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMeetingMinuteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('meeting_minute_create');
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
            'attendees'     => [
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
