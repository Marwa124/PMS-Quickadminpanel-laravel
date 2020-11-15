<?php

namespace App\Http\Requests;

use App\Models\StockSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStockSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stock_sub_categories,id',
        ];
    }
}
