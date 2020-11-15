<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_edit');
    }

    public function rules()
    {
        return [
            'account_id'     => [
                'required',
                'integer',
            ],
            'invoice_id'     => [
                'required',
                'integer',
            ],
            'name'           => [
                'string',
                'nullable',
            ],
            'type'           => [
                'required',
            ],
            'paid_by'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'reference'      => [
                'string',
                'nullable',
            ],
            'tags'           => [
                'string',
                'nullable',
            ],
            'tax'            => [
                'numeric',
            ],
            'date'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'debit'          => [
                'numeric',
            ],
            'credit'         => [
                'numeric',
            ],
            'total_balance'  => [
                'numeric',
            ],
            'permissions.*'  => [
                'integer',
            ],
            'permissions'    => [
                'array',
            ],
            'client_visible' => [
                'required',
            ],
            'added_by'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'paid'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'billable'       => [
                'required',
            ],
            'deposit'        => [
                'string',
                'nullable',
            ],
            'deposit_2'      => [
                'string',
                'nullable',
            ],
            'under_55'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
