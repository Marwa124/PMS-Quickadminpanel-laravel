<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Request;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientMeetingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_request_create');
    }

    public function rules()
    {
        return [
            'users'     => [
                'required',
            ],
            'request_type' => [
                'required',
            ],
            'day' => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'day_hour'    => [
                'string',
                'nullable',
            ],
            'comments'     => [
                'nullable',
                'string',
                'min:-2147483648',
                'max:2147483647',
            ],
            'encryption'      => [
                'string',
                'nullable',
            ],
            'host'            => [
                'string',
                'nullable',
            ],
        ];
    }
}
