<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name'                 => [
                'string',
                'required',
            ],
            'email'                => [
                'required',
                'unique:users',
            ],
            'password'             => [
                'required',
            ],
            'roles.*'              => [
                'integer',
            ],
            'roles'                => [
                'required',
                'array',
            ],
            'username'             => [
                'string',
                'nullable',
            ],
            'permissions.*'        => [
                'integer',
            ],
            'permissions'          => [
                'array',
            ],
            'smtp_email_type'      => [
                'string',
                'nullable',
            ],
            'smtp_host_name'       => [
                'string',
                'nullable',
            ],
            'smtp_user_name'       => [
                'string',
                'nullable',
            ],
            'smtp_port'            => [
                'string',
                'nullable',
            ],
            'smtp_additional_flag' => [
                'string',
                'nullable',
            ],
            'last_postmaster_run'  => [
                'string',
                'nullable',
            ],
            'media_path_slug'      => [
                'string',
                'nullable',
            ],
            'marketing_username'  => [
                'string',
                'nullable',
            ],
            'marketing_type'       => [
                'string',
                'nullable',
            ],
            'sp_username'          => [
                'string',
                'nullable',
            ],
            'date_of_join'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_of_insurance'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
