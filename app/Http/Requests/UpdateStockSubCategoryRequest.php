<?php

namespace App\Http\Requests;

use App\Models\StockSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStockSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_sub_category_edit');
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
                'unique:stock_sub_categories,name,' . request()->route('stock_sub_category')->id,
            ],
        ];
    }
}
