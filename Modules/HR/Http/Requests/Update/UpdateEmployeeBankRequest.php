<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\EmployeeBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_bank_edit');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'integer',
            ],
            'name'            => [
                'string',
                'required',
                'unique:employee_banks,name,' . request()->route('employee_bank')->id,
            ],
            'branch_name'     => [
                'string',
                'required',
            ],
            'account_name'    => [
                'string',
                'required',
            ],
            'account_number'  => [
                'string',
                'required',
            ],
            'routing_number'  => [
                'string',
                'nullable',
            ],
            'type_of_account' => [
                'string',
                'nullable',
            ],
        ];
    }
}
