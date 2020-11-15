<?php

namespace App\Http\Requests;

use App\Models\QuotationForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQuotationFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quotation_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:quotation_forms,id',
        ];
    }
}
