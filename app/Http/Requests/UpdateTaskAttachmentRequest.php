<?php

namespace App\Http\Requests;

use App\Models\TaskAttachment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskAttachmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_attachment_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
