<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Destroy;

use Illuminate\Foundation\Http\FormRequest;
use Modules\MaterialsSuppliers\Entities\Supplier;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class MassDestroySupplierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:suppliers,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

   
}
