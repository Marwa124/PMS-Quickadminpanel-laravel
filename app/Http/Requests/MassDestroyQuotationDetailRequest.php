<?php

namespace App\Http\Requests;

use App\Models\QuotationDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQuotationDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quotation_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:quotation_details,id',
        ];
    }
}
