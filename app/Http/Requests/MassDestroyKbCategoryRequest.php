<?php

namespace App\Http\Requests;

use App\Models\KbCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKbCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kb_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kb_categories,id',
        ];
    }
}
