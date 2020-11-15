<?php
namespace Modules\HR\Http\Requests\Update;

use Modules\HR\Entities\Vacation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVacationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacation_edit');
    }

    public function rules()
    {
        return [
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'location'   => [
                'string',
                'nullable',
            ],
            'user_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
