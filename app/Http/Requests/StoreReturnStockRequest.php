<?php

namespace App\Http\Requests;

use App\Models\ReturnStock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReturnStockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('return_stock_create');
    }

    public function rules()
    {
        return [
            'reference_no'      => [
                'string',
                'nullable',
            ],
            'total'             => [
                'numeric',
            ],
            'status'            => [
                'string',
                'nullable',
            ],
            'date_sent'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'created_by'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'return_stock_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'due_date'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'discount_percent'  => [
                'numeric',
            ],
            'adjustment'        => [
                'numeric',
            ],
            'discount_total'    => [
                'numeric',
            ],
            'show_quantity_as'  => [
                'string',
                'nullable',
            ],
            'permissions.*'     => [
                'integer',
            ],
            'permissions'       => [
                'array',
            ],
            'total_tax'         => [
                'string',
                'nullable',
            ],
            'tax'               => [
                'numeric',
            ],
        ];
    }
}
