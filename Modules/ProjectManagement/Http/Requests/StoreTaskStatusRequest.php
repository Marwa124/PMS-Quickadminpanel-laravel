<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\TaskStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_status_create');
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

//    /**
//     * Get custom messages for validator errors.
//     *
//     * @return array
//     */
//    public function messages()
//    {
//        return [
//            'name.unique' => 'name already taken'
//        ];
//    }

}
