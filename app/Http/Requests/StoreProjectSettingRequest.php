<?php

namespace App\Http\Requests;

use App\Models\ProjectSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_setting_create');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
                'unique:project_settings',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
