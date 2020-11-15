<?php

namespace App\Http\Requests;

use App\Models\Local;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('local_create');
    }

    public function rules()
    {
        return [
            'code'     => [
                'string',
                'nullable',
            ],
            'language' => [
                'string',
                'nullable',
            ],
            'name'     => [
                'string',
                'required',
            ],
            'icon'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
