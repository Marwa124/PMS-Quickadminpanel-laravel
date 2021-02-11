<?php

namespace App\Http\Requests;

use App\Models\Stock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStockRequest extends FormRequest
{
//    public function authorize()
//    {
////        return Gate::allows('stock_edit');
//    }

    public function rules()
    {
        return [
            'stock_sub_category_id' => [
                'required',
                'integer',
                'exists:stock_sub_categories,id',
            ],
            'name'                  => [
                'string',
                'required',

            ],
            'total_stock'           => [
                'nullable',
                'integer',
                'min:0',
                'max:2147483647',
            ],
            'buying_date'           => [
                'required',
                'date',
            ],
        ];
    }
}
