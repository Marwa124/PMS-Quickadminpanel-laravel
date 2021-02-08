<?php

namespace Modules\ProjectManagement\Http\Requests;

use Modules\ProjectManagement\Entities\Milestone;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMilestoneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('milestone_edit');
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
            // milestone name unique for same project only
            'name_en'       => [
                'string',
                'required',
                'unique:milestones,name_en,'. request()->route('milestone')->id.',id,project_id,'.request()->project_id,
            ],
            'name_ar'       => [
                'string',
                'required',
                'unique:milestones,name_ar,'. request()->route('milestone')->id.',id,project_id,'.request()->project_id,
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
                'after_or_equal:start_date',
            ],
        ];
    }
}
