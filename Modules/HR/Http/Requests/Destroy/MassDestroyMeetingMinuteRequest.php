<?php

namespace Modules\HR\Http\Requests\Destroy;

use Modules\HR\Entities\MeetingMinute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMeetingMinuteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('meeting_minute_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:meeting_minutes,id',
        ];
    }
}
