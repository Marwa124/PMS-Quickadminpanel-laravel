<?php

namespace Modules\ProjectManagement\Http\Requests;

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
                'exists:time_work_types,id'
            ],
            'subject_en'           => [
                'required',
                'string',
                //'regex:/^[a-zA-Z ]+$/u',
                'min:3|max:255',
                'unique:work_trackings,subject_en,'. request()->route('work_tracking')->id.',id,work_type_id,'.request()->work_type_id,
            ],
            'subject_ar'           => [
                'required',
                'string',
                //'regex:/^[ اأإء-ي ]+$/ui',
                'min:3|max:255',
                'unique:work_trackings,subject_ar,'. request()->route('work_tracking')->id.',id,work_type_id,'.request()->work_type_id,
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
                'in:on,off',
            ],
            'notify_work_not_achive' => [
                'string',
                'nullable',
                'in:on,off',
            ],
//            'email_send'             => [
//                'string',
//                'nullable',
//            ],
        ];
    }
}
