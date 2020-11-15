<?php

namespace App\Http\Requests;

use App\Models\Salutation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalutationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salutation_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:salutations,name,' . request()->route('salutation')->id,
            ],
        ];
    }
}
