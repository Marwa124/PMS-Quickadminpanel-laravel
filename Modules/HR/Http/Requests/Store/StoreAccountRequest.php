<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Account;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_create');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
                'unique:accounts',
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
