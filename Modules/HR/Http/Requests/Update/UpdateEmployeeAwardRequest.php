<?php
namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\EmployeeAward;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeAwardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_award_edit');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
            ],
            'user_id'      => [
                'required',
                'exists:users,id',
                'integer',
            ],
            'gift_item'    => [
                'string',
                'nullable',
            ],
            'award_amount' => [
                'required',
                'min:0',
                'numeric'
            ],
            'given_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
