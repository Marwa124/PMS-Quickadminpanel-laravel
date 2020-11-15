<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'primary_contact' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name'            => [
                'string',
                'required',
            ],
            'website'         => [
                'string',
                'nullable',
            ],
            'phone'           => [
                'string',
                'nullable',
            ],
            'mobile'          => [
                'string',
                'nullable',
            ],
            'fax'             => [
                'string',
                'nullable',
            ],
            'address'         => [
                'string',
                'nullable',
            ],
            'city'            => [
                'string',
                'nullable',
            ],
            'zipcode'         => [
                'string',
                'nullable',
            ],
            'currency'        => [
                'string',
                'nullable',
            ],
            'skype'           => [
                'string',
                'nullable',
            ],
            'linkedin'        => [
                'string',
                'nullable',
            ],
            'facebook'        => [
                'string',
                'nullable',
            ],
            'twitter'         => [
                'string',
                'nullable',
            ],
            'language'        => [
                'string',
                'nullable',
            ],
            'country'         => [
                'string',
                'nullable',
            ],
            'vat'             => [
                'string',
                'nullable',
            ],
            'hosting_company' => [
                'string',
                'nullable',
            ],
            'hostname'        => [
                'string',
                'nullable',
            ],
            'port'            => [
                'string',
                'nullable',
            ],
            'username'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
