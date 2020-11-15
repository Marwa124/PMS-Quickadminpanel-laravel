<?php

namespace App\Http\Requests;

use App\Models\PenaltyCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPenaltyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('penalty_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:penalty_categories,id',
        ];
    }
}
