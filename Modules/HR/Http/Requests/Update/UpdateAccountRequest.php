<?php

namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\Account;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_edit');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
                'unique:accounts,name,' . request()->route('account')->id,
            ],
            'description'   => [
                'string',
                'nullable',
            ],
            'balance'       => [
                'string',
                'nullable',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'array',
            ],
        ];
    }
}
