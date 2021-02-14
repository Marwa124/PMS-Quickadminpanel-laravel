<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\LeaveApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeaveApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('leave_application_create');
    }

    public function rules()
    {
        return [
            'user_id'           => [
                'required',
                'integer',
                'exists:users,id'
            ],
            'leave_category_id' => [
                'required',
                'integer',
                'exists:leave_categories,id'
            ],
            'leave_type'        => [
                'required',
                'in:single_day,multi_days,hours'
            ],
            'hours'             => [
                'integer',
                'min:1',
                'nullable',
            ],
            'leave_start_date'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'leave_end_date'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'view_status'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
