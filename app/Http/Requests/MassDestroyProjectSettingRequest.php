<?php

namespace App\Http\Requests;

use App\Models\ProjectSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProjectSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_settings,id',
        ];
    }
}
