<?php

namespace App\Http\Requests;

use App\Models\OutgoingEmail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOutgoingEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('outgoing_email_create');
    }

    public function rules()
    {
        return [
            'send_to'   => [
                'string',
                'nullable',
            ],
            'send_from' => [
                'string',
                'nullable',
            ],
            'delivered' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
