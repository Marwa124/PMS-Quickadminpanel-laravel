<?php

namespace App\Http\Requests;

use App\Models\Salutation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalutationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salutation_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:salutations',
            ],
        ];
    }
}
