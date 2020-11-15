<?php

namespace App\Http\Requests;

use App\Models\Milestone;
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
            'user_id'    => [
                'required',
                'integer',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
            'name'       => [
                'string',
                'required',
                'unique:milestones,name,' . request()->route('milestone')->id,
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
