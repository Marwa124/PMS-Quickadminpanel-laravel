<?php

namespace Modules\HR\Http\Request\Destroy;

use Modules\HR\Entities\ClientMeeting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientMeetingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('employee_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:employee_requests,id',
        ];
    }
}
