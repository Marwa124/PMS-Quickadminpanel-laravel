<?php

namespace App\Http\Requests;

use App\Models\QuotationForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuotationFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_form_edit');
    }

    public function rules()
    {
        return [
            'title'  => [
                'string',
                'required',
            ],
            'code'   => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
