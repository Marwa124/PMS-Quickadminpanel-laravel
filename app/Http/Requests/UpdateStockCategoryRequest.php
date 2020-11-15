<?php

namespace App\Http\Requests;

use App\Models\StockCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStockCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:stock_categories,name,' . request()->route('stock_category')->id,
            ],
        ];
    }
}
