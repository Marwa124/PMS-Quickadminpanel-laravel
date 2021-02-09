<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\LeaveCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeaveCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('leave_category_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
            ],
            'annual_monthly' => [
                'integer',
                'in:1,0',
            ],
            'deducted_amount' => [
                'numeric',
                'min:0',
            ],
            'leave_quota' => [
                'nullable',
                'integer',
                'min:1',
                'max:214',
            ],
        ];
    }
}
