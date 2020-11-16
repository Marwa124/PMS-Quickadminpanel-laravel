<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\MonthlyAttendance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMonthlyAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('monthly_attendance_create');
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
