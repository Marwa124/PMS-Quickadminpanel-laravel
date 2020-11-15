<?php

namespace App\Http\Requests;

use App\Models\DashboardSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDashboardSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dashboard_setting_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
            ],
            'col'       => [
                'string',
                'nullable',
            ],
            'order_no'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'report'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'for_staff' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
