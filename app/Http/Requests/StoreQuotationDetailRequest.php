<?php

namespace App\Http\Requests;

use App\Models\QuotationDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuotationDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_detail_create');
    }

    public function rules()
    {
        return [
            'quotation_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
