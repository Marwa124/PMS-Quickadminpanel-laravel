<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('department_create');
    }

    public function rules()
    {
        return [
            'department_name' => [
                'string',
                'required',
            ],
            'encryption'      => [
                'string',
                'nullable',
            ],
            'host'            => [
                'string',
                'nullable',
            ],
            'username'        => [
                'string',
                'nullable',
            ],
            'mailbox'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
