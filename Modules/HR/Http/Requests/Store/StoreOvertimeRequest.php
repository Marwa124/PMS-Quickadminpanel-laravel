<?php

namespace App\Http\Requests;

use App\Models\Overtime;
namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Overtime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOvertimeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('overtime_create');
    }

    public function rules()
    {
        return [
            'user_id'        => [
                'required',
                'integer',
            ],
            'overtime_date'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'overtime_hours' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}
