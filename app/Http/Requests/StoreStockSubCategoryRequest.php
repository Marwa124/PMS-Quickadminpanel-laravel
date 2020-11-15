<?php

namespace App\Http\Requests;

use App\Models\StockSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStockSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_sub_category_create');
    }

    public function rules()
    {
        return [
            'stock_category_id' => [
                'required',
                'integer',
            ],
            'name'              => [
                'string',
                'required',
                'unique:stock_sub_categories',
            ],
        ];
    }
}
