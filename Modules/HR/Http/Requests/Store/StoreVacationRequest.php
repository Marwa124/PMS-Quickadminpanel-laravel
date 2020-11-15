<?php

namespace Modules\HR\Http\Requests\Store;

use Modules\HR\Entities\Vacation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVacationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacation_create');
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
            'user_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
