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

            'name_en'           => [
                'string',
                'required',
                //'regex:/^[a-zA-Z0-9 ]+$/u',
                'min:3|max:255',
                Rule::unique('bugs','name_en')->where(function($query) {

                    $query->where('project_id', '=', request()->project_id);

                }),
            ],
            'name_ar'           => [
                'string',
                'required',
                //'regex:/^[ اأإء-ي ]+$/ui',
                'min:3|max:255',
                Rule::unique('bugs','name_ar')->where(function($query) {

                    $query->where('project_id', '=', request()->project_id);

                }),
            ],
            'project_id'         => [
                'required',
                'exists:projects,id'
            ],
            'status'         => [
                'required',
                'string',
                'in:unconfirm,confirmed,in_progress,resolved,verified',
            ],
            'priority'       => [
                'string',
                'required',
                'in:low,medium,high',
            ],
            'severity'       => [
                'required',
                'string',
                'in:minor,major,show_stopper,must_fixed',
            ],
            'reproducibility'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
