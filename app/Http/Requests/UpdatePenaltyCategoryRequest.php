<?php

namespace App\Http\Requests;

use App\Models\PenaltyCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePenaltyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penalty_category_edit');
    }

    public function rules()
    {
        return [
            'type'         => [
                'string',
                'required',
            ],
            'fine_amount'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'penelty_days' => [
                'string',
                'required',
            ],
        ];
    }
}
