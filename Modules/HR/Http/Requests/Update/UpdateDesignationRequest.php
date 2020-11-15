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
            'permissions.*'    => [
                'integer',
            ],
            'permissions'      => [
                'array',
            ],
        ];
    }
}
