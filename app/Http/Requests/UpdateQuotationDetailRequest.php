<?php

namespace App\Http\Requests;

use App\Models\QuotationDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuotationDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_detail_edit');
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
