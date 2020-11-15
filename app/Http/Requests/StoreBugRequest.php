<?php

namespace App\Http\Requests;

use App\Models\Bug;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBugRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bug_create');
    }

    public function rules()
    {
        return [
            'issue_no'       => [
                'string',
                'nullable',
            ],
            'name'           => [
                'string',
                'required',
            ],
            'status'         => [
                'string',
                'nullable',
            ],
            'priority'       => [
                'string',
                'required',
            ],
            'severity'       => [
                'string',
                'nullable',
            ],
            'reporter'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'permissions.*'  => [
                'integer',
            ],
            'permissions'    => [
                'array',
            ],
            'client_visible' => [
                'string',
                'nullable',
            ],
        ];
    }
}
