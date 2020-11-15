<?php

namespace App\Http\Requests;

use App\Models\TimeProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTimeProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('time_project_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
