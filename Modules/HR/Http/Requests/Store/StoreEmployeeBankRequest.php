<?php


namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\EmployeeBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_bank_create');
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
                'unique:employee_banks',
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
