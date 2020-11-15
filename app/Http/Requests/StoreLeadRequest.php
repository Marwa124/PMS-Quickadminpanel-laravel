<?php

namespace App\Http\Requests;

use App\Models\Lead;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_create');
    }

    public function rules()
    {
        return [
            'name'                => [
                'string',
                'required',
                'unique:leads',
            ],
            'contact_name'        => [
                'string',
                'nullable',
            ],
            'organization'        => [
                'string',
                'nullable',
            ],
            'imported_from_email' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'company_name'        => [
                'string',
                'nullable',
            ],
            'address'             => [
                'string',
                'nullable',
            ],
            'country'             => [
                'string',
                'nullable',
            ],
            'state'               => [
                'string',
                'nullable',
            ],
            'city'                => [
                'string',
                'nullable',
            ],
            'title'               => [
                'string',
                'nullable',
            ],
            'email'               => [
                'string',
                'nullable',
            ],
            'phone'               => [
                'string',
                'nullable',
            ],
            'mobile'              => [
                'string',
                'nullable',
            ],
            'facebook'            => [
                'string',
                'nullable',
            ],
            'skype'               => [
                'string',
                'nullable',
            ],
            'twitter'             => [
                'string',
                'nullable',
            ],
            'permissions.*'       => [
                'integer',
            ],
            'permissions'         => [
                'array',
            ],
        ];
    }
}
