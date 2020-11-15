<?php

namespace App\Http\Requests;

use App\Models\Transfer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transfer_create');
    }

    public function rules()
    {
        return [
            'to_account'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'from_account'      => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'amount'            => [
                'required',
            ],
            'payment_method_id' => [
                'required',
                'integer',
            ],
            'reference'         => [
                'string',
                'nullable',
            ],
            'status'            => [
                'required',
            ],
            'date'              => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'type'              => [
                'string',
                'required',
            ],
            'permissions.*'     => [
                'integer',
            ],
            'permissions'       => [
                'array',
            ],
        ];
    }
}
