<?php

namespace Modules\Sales\Http\Requests\Store;

use Modules\Sales\Entities\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'client_status'=>1,
            'password'=> bcrypt($this->password),
        ]);
    }

    public function rules()
    {
        return [
            
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
                'required',
            ],
            'password'        => [
                'required',
            ],
            'email'                => [
                'required',
                // 'unique:users',
            ],
        ];
    }
}
