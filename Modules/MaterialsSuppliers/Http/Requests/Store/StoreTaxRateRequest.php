<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Store;

use Modules\MaterialsSuppliers\Entities\TaxRate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaxRateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tax_rate_create');
    }

    public function attributes() {
        return [
            'name' => 'item_name',
            'description' => 'item_desc',
        ];
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
                'unique:tax_rates',
            ],
            'rate_percent'  => [
                'numeric',
                'required',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'array',
            ],
        ];
    }
}
