<?php

namespace App\Http\Requests;

use App\Models\Todo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTodoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('todo_edit');
    }

    public function rules()
    {
        return [
            'title'    => [
                'string',
                'required',
            ],
            'user_id'  => [
                'required',
                'integer',
            ],
            'status'   => [
                'required',
            ],
            'assigned' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'order'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
