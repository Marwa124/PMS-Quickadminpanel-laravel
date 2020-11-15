<?php
namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\LeaveApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeaveApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('leave_application_edit');
    }

    public function rules()
    {
        return [
            'user_id'           => [
                'required',
                'integer',
            ],
            'leave_category_id' => [
                'required',
                'integer',
            ],
            'leave_type'        => [
                'required',
            ],
            'hours'             => [
                'string',
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
            'approved_by'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
