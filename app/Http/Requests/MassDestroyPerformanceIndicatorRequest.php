<?php

namespace App\Http\Requests;

use App\Models\PerformanceIndicator;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPerformanceIndicatorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('performance_indicator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:performance_indicators,id',
        ];
    }
}
