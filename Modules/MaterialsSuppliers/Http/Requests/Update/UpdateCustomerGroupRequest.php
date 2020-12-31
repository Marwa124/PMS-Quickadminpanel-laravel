<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Update;

use Modules\MaterialsSuppliers\Entities\CustomerGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_group_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
                'unique:customer_groups,name,' . request()->route('customer_group')->id,
            ],
        ];
    }
}
