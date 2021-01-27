<?php

namespace Modules\ProjectManagement\Http\Requests;

use App\Models\Bug;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreBugRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bug_create');
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
                Rule::unique('bugs','name')->where(function($query) {

                    $query->where('project_id', '=', request()->project_id);

                }),
            ],
            'project_id'         => [
                'required',
            ],
            'status'         => [
                'required',
                'string',
                //'nullable',
            ],
            'priority'       => [
                'string',
                'required',
            ],
            'severity'       => [
                'required',
                'string',
                //'nullable',
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
