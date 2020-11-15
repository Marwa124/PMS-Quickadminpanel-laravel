<?php

namespace App\Http\Requests;

use App\Models\LeadCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLeadCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lead_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lead_categories,id',
        ];
    }
}
