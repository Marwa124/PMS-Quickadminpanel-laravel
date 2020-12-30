<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Destroy;

use Modules\MaterialsSuppliers\Entities\TaxRate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTaxRateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tax_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tax_rates,id',
        ];
    }
}
