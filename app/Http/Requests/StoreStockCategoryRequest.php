<?php

namespace App\Http\Requests;

use App\Models\StockCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStockCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:stock_categories',
            ],
        ];
    }
}
