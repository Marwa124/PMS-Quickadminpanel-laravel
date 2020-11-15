<?php

namespace App\Http\Requests;

use App\Models\TaxRate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaxRateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tax_rate_create');
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
