<?php
namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\Designation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDesignationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('designation_edit');
    }

    public function rules()
    {
        return [
            'designation_name' => [
                'string',
                'required',
            ],
            'designation_name_ar' => [
                'string',
                'nullable',
            ],
            'department_id' => [
                'integer',
                'required',
                'exists:departments,id',
            ],
            'designation_leader_id' => [
                'integer',
                'required',
                'exists:users,id',
            ],
            'permissions.*'    => [
                'string',
                'exists:permissions,name'
            ],
            'permissions'      => [
                'array',
            ],
        ];
    }
}
