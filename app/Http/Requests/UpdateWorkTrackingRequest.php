<?php

namespace App\Http\Requests;

use App\Models\WorkTracking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWorkTrackingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('work_tracking_edit');
    }

    public function rules()
    {
        return [
            'work_type_id'           => [
                'required',
                'integer',
            ],
            'achievement'            => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start_date'             => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'               => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'notify_work_achive'     => [
                'string',
                'nullable',
            ],
            'notify_work_not_achive' => [
                'string',
                'nullable',
            ],
            'permissions.*'          => [
                'integer',
            ],
            'permissions'            => [
                'array',
            ],
            'email_send'             => [
                'string',
                'nullable',
            ],
        ];
    }
}
