<?php

namespace Modules\MaterialsSuppliers\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_edit');
    }

    public function rules()
    {
        return [
            'reference_no'     => [
                'string',
                'required',
            ],
            'supplier_id'      => [
                'required',
                'array'
            ],
            'supplier_id.id'      => [
                'exists:suppliers,id'
            ],
            'user_id'      => [
                'required',
                'array'
            ],
            'user_id.id'      => [
                'exists:users,id'
            ],
            'total'            => [
                'numeric',
            ],
            'purchase_date'    => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'due_date'         => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
            'discount_percent' => [
                'numeric',
            ],
            'discount_total'   => [
                'numeric',
            ],
            'adjustment'       => [
                'numeric',
            ],




            
            'total_tax'        => [
                'string',
                'nullable',
            ],
            'status'           => [
                'string',
                'nullable',
            ],
            'date_sent'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'show_quantity_as' => [
                'string',
                'nullable',
            ],
           
            'tax'              => [
                'numeric',
            ],
        ];
    }
}
