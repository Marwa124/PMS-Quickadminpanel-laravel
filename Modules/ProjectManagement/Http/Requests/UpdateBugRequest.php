<?php

namespace Modules\ProjectManagement\Http\Requests;

use App\Models\Bug;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBugRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bug_edit');
    }

    public function rules()
    {
        return [
//            'issue_no'       => [
//                'string',
//                'nullable',
//            ],
            'name'           => [
                'string',
                'required',
                'unique:bugs,name,'. request()->route('bug')->id.',id,project_id,'.request()->project_id,
            ],
            'status'         => [
                'required',
                'string',
//                'nullable',
            ],
            'priority'       => [
                'string',
                'required',
            ],
            'severity'       => [
                'required',
                'string',
//                'nullable',
            ],
            'reproducibility'       => [
                'string',
                'nullable',
            ],
//            'reporter'       => [
//                'nullable',
//                'integer',
//                'min:-2147483648',
//                'max:2147483647',
//            ],
//            'permissions.*'  => [
//                'integer',
//            ],
//            'permissions'    => [
//                'array',
//            ],
//            'client_visible' => [
//                'string',
//                'nullable',
//            ],
        ];
    }
}
