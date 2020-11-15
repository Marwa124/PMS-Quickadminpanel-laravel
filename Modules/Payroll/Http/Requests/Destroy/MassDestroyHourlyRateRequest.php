<?php

namespace Modules\Payroll\Http\Requests\Destroy;

use App\Models\HourlyRate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHourlyRateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hourly_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hourly_rates,id',
        ];
    }
}
