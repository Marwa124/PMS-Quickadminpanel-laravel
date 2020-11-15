<?php

namespace App\Http\Requests;

use App\Models\CustomerGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_group_create');
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
                'unique:customer_groups',
            ],
        ];
    }
}
