<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\MonthlyAttendance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMonthlyAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('monthly_attendance_edit');
    }

    public function rules()
    {
        return [
            'total_hours'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_absence'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_vacation' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'holidays'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'created_month'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
