<?php

namespace Modules\Sales\Http\Requests\Update;

use Modules\Sales\Entities\InterestedIn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInterestedInRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('interested_in_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:interested_ins,name,' . request()->route('interested_in')->id,
            ],
        ];
    }
}
