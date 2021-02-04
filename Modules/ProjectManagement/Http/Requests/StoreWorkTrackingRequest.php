<?php

namespace Modules\ProjectManagement\Http\Requests;

use App\Models\WorkTracking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreWorkTrackingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('work_tracking_create');
    }

    public function rules()
    {
        return [
            'work_type_id'           => [
                'required',
                'integer',
            ],
            'subject'           => [
                'required',
                'string',
                Rule::unique('work_trackings','subject')->where(function($query) {

                    $query->where('work_type_id', '=', request()->work_type_id);

                }),
            ],
            'achievement'            => [
                'required',
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
                'after_or_equal:start_date',
            ],
            'notify_work_achive'     => [
                'string',
                'nullable',
            ],
            'notify_work_not_achive' => [
                'string',
                'nullable',
            ],
            'email_send'             => [
                'string',
                'nullable',
            ],
        ];
    }
}
