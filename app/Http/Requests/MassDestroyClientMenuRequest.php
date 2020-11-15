<?php

namespace App\Http\Requests;

use App\Models\ClientMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientMenuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:client_menus,id',
        ];
    }
}
