<?php

namespace App\Http\Requests;

use App\Models\PrivateChat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePrivateChatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('private_chat_edit');
    }

    public function rules()
    {
        return [
            'title'   => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
