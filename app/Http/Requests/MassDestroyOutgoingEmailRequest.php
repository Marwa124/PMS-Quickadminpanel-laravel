<?php

namespace App\Http\Requests;

use App\Models\OutgoingEmail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutgoingEmailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('outgoing_email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:outgoing_emails,id',
        ];
    }
}
