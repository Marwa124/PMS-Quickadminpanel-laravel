<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\TaskStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_status_edit');
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
