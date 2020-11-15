<?php

namespace App\Http\Requests;

use App\Models\Quotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_edit');
    }

    public function rules()
    {
        return [
            'title'  => [
                'string',
                'required',
            ],
            'name'   => [
                'string',
                'nullable',
            ],
            'email'  => [
                'string',
                'nullable',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'numeric',
            ],
        ];
    }
}
