<?php


namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_create');
    }

    public function rules()
    {
        return [
            'username'          => [
                'string',
                'required',
                'unique:employees',
            ],
            'password'          => [
                'required',
            ],
            'role_id'           => [
                'required',
                'integer',
            ],
            'permissions.*'     => [
                'integer',
            ],
            'permissions'       => [
                'array',
            ],
            'date_of_join'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_of_insurance' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
