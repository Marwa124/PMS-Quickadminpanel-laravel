<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_edit');
    }

    public function rules()
    {
        return [
            'username'               => [
                'string',
                // 'required',
                // 'unique:employees,username,' . request()->route('employee')->id,
            ],
            'role_id'                => [
                'required',
                'integer',
            ],
            'new_password_key'       => [
                'string',
                'nullable',
            ],
            'new_password_requested' => [
                'string',
                'nullable',
            ],
            'new_email'              => [
                'string',
                'nullable',
            ],
            'permissions.*'          => [
                'integer',
            ],
            'permissions'            => [
                'array',
            ],
            'smtp_email_type'        => [
                'string',
                'nullable',
            ],
            'smtp_action'            => [
                'string',
                'nullable',
            ],
            'smtp_host_name'         => [
                'string',
                'nullable',
            ],
            'smtp_user_name'         => [
                'string',
                'nullable',
            ],
            'smtp_port'              => [
                'string',
                'nullable',
            ],
            'smtp_additional_flag'   => [
                'string',
                'nullable',
            ],
            'last_postmaster_run'    => [
                'string',
                'nullable',
            ],
            'media_path_slug'        => [
                'string',
                'nullable',
            ],
            'marketing_username'    => [
                'string',
                'nullable',
            ],
            'marketing_type'         => [
                'string',
                'nullable',
            ],
            'sp_username'            => [
                'string',
                'nullable',
            ],
            'date_of_join'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_of_insurance'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
