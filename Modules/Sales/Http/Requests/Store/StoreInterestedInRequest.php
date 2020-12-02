<?php

namespace Modules\Sales\Http\Requests\Store;

use Modules\Sales\Entities\InterestedIn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInterestedInRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('interested_in_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:interested_ins',
            ],
        ];
    }
}
