<?php

namespace App\Http\Requests;

use App\Models\ClientMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientMenuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_menu_create');
    }

    public function rules()
    {
        return [
            'label'  => [
                'string',
                'required',
                'unique:client_menus',
            ],
            'link'   => [
                'string',
                'required',
            ],
            'icon'   => [
                'string',
                'nullable',
            ],
            'parent' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sort'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
