<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Training;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTrainingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('training_create');
    }

    public function rules()
    {
        return [
            'user_id'       => [
                'required',
                'exists:users,id'
            ],
            'training_name' => [
                'string',
                'required',
            ],
            'training_cost' => [
                'numeric',
                'min:0'
            ],
            'performance'   => [
                'required',
                'in:concluded,satisfactory,average,poor,excellent'
            ],
            'vendor_name'   => [
                'string',
                'nullable',
            ],
            'start_date'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'finish_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'required',
                'in:pending,started,completed,terminated'
            ]
        ];
    }
}
