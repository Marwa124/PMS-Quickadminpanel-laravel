<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supplier_edit');
    }

    public function rules()
    {
        return [
            'name'              => [
                'string',
                'required',
            ],
            'mobile'            => [
                'string',
                'nullable',
            ],
            'phone'             => [
                'string',
                'nullable',
            ],
            'email'             => [
                'string',
                'nullable',
            ],
            'address'           => [
                'string',
                'nullable',
            ],
            'customer_group_id' => [
                'required',
                'integer',
            ],
            'permissions.*'     => [
                'integer',
            ],
            'permissions'       => [
                'array',
            ],
        ];
    }
}
