<?php

namespace Modules\Sales\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use Illuminate\Http\Response;

class StoreClientContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
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
            'country'         => [
                'string',
                'nullable',
            ],
            'email'                => [
                'required',
            ],
            'clients_id'                => [
                'required',
                'exists:clients,id',
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('client_create');
        // return true;
    }
}
