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
            'mobile'          => [
                'required',
                'regex:/(^\+(?:[0-9]?){6,14}[0-9]$)|(^01(1|2|0|5)[0-9]{8}$)/'
            ],
            'phone'             => [
                'string',
                'nullable',
            ],
            'email'             => [
                'string',
                'required',
            ],
            'address'           => [
                'string',
                'nullable',
            ],
            'customer_group_id' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
