<?php

namespace Modules\HR\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEvaluationRequest extends FormRequest
{
    public function authorize()
    {
        // return Gate::allows('evaluation_create');
        return true;
    }

    public function rules()
    {
        return [

            'auth'      => 'required|exists:users,id|integer',
            'user_id'   => 'required|exists:users,id|integer',
            'type'      => 'required',
            'period'    => 'required',

        ];
    }

    public function messages()
    {
        return[
            'period.required' => trans('cruds.evaluation.period'),
        ];
    }
}
