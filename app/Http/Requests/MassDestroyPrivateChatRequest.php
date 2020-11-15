<?php

namespace App\Http\Requests;

use App\Models\PrivateChat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPrivateChatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('private_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:private_chats,id',
        ];
    }
}
