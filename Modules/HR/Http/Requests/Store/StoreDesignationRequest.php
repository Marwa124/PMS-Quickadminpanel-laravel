<?php

;
namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Designation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDesignationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('designation_create');
    }

    public function rules()
    {
        return [
            'designation_name' => [
                'string',
                'required',
            ],
            'department_id' => [
                'integer',
                'required',
            ],
            'designation_leader_id' => [
                'integer',
                'nullable',
            ],
            'permissions.*'    => [
                'integer',
            ],
            'permissions'      => [
                'array',
            ],
        ];
    }
}
