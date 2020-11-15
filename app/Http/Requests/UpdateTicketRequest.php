<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTicketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ticket_edit');
    }

    public function rules()
    {
        return [
            'ticket_code'   => [
                'string',
                'nullable',
            ],
            'subject'       => [
                'string',
                'nullable',
            ],
            'status'        => [
                'string',
                'nullable',
            ],
            'reporter'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'priority'      => [
                'string',
                'nullable',
            ],
            'last_reply'    => [
                'string',
                'nullable',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'array',
            ],
        ];
    }
}
