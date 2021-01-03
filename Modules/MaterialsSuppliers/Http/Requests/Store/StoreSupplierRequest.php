<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Store;

use Modules\MaterialsSuppliers\Entities\Supplier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supplier_create');
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
        ];
    }
}
