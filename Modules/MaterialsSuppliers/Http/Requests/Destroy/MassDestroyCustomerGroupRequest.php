<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Destroy;

use Modules\MaterialsSuppliers\Entities\CustomerGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_groups,id',
        ];
    }
}
