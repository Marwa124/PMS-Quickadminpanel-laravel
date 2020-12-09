<?php

namespace Modules\ProjectManagement\Http\Requests;

use App\Models\Milestone;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreMilestoneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('milestone_create');
    }

    public function rules()
    {
        return [
//            'user_id'    => [
//                'required',
//                'integer',
//            ],
            'project_id' => [
                'required',
                'integer',
            ],
            'name'       => [
                'string',
                'required',
                //'unique:milestones,name,'.request()->project_id.',project_id',
                Rule::unique('milestones','name')->where(function($query) {

                    $query->where('project_id', '=', request()->project_id);

                }),

               // Rule::unique('milestones','name')->ignore(request()->project_id,'project_id'),
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
