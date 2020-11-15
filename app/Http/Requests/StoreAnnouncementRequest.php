<?php

namespace App\Http\Requests;

use App\Models\Announcement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('announcement_create');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'required',
            ],
            'user_id'     => [
                'required',
                'integer',
            ],
            'status'      => [
                'required',
            ],
            'view_status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start_date'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'all_client'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
