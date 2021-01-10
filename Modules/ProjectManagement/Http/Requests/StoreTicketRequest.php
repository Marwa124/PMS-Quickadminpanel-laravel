<?php

namespace Modules\ProjectManagement\Http\Requests;

use App\Models\Ticket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ticket_create');
    }

    public function rules()
    {
        return [
//            'ticket_code'   => [
//                'string',
//                'nullable',
//            ],
            'subject'       => [
                'required',
                'string',
//                'nullable',
                Rule::unique('tickets','subject')->where(function($query) {

                    $query->where('project_id', '=', request()->project_id);

                }),
            ],
            'status'        => [
                'required',
                'string',
//                'nullable',
            ],
//            'reporter'      => [
//                'nullable',
//                'integer',
//                'min:-2147483648',
//                'max:2147483647',
//            ],
            'priority'      => [
                'required',
                'string',
//                'nullable',
            ],
            'email'      => [
                'email',
                'nullable',
            ],
            'body'      => [
                'required',
            ],
            'project_id'      => [
                'required',
            ],
//            'last_reply'    => [
//                'string',
//                'nullable',
//            ],
//            'permissions.*' => [
//                'integer',
//            ],
//            'permissions'   => [
//                'array',
//            ],
        ];
    }
}
