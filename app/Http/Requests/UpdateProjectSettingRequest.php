<?php

namespace App\Http\Requests;

use App\Models\ProjectSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_setting_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
                'unique:project_settings,name,' . request()->route('project_setting')->id,
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
