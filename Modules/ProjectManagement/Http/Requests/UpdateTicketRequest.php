<?php

namespace Modules\ProjectManagement\Http\Requests;

use App\Models\Ticket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTicketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ticket_edit');
    }

    public function rules()
    {
        return [

            'subject_en'       => [
                'required',
                'string',
                //'regex:/^[a-zA-Z ]+$/u',
                'min:3|max:255',
                'unique:tickets,subject_en,'. request()->route('ticket')->id.',id,project_id,'.request()->project_id,
            ],
            'subject_ar'       => [
                'required',
                'string',
                //'regex:/^[ اأإء-ي ]+$/ui',
                'min:3|max:255',
                'unique:tickets,subject_ar,'. request()->route('ticket')->id.',id,project_id,'.request()->project_id,
            ],
            'status'        => [
                'required',
                'string',
                'in:opened,answered,in_progress,closed',
            ],
            'email'      => [
                'email',
            ],
            'priority'      => [
                'required',
                'string',
                'in:low,medium,high',
            ],
            'body_en'      => [
                'required',
                //'regex:/^[a-zA-Z ][1-9]*+$/u',
            ],
            'body_ar'      => [
                'required',
                //'regex:/^[اأإء-ي ]+$/ui',
            ],
            'project_id'      => [
                'required',
                'exists:projects,id'
            ],
        ];
    }
}
