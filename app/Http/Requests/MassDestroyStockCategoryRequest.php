<?php

namespace App\Http\Requests;

use App\Models\StockCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStockCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stock_categories,id',
        ];
    }
}
