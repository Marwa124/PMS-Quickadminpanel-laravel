<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_edit');
    }

    public function rules()
    {
        return [
            'recur_start_date'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'recur_end_date'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'reference_no'        => [
                'string',
                'nullable',
            ],
            'client_id'           => [
                'required',
                'integer',
            ],
            'invoice_date'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'due_date'            => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'alert_overdue'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tax'                 => [
                'numeric',
                'required',
            ],
            'total_tax'           => [
                'string',
                'nullable',
            ],
            'discount_percent'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'recurring'           => [
                'required',
            ],
            'recurring_frequency' => [
                'string',
                'nullable',
            ],
            'recur_frequency'     => [
                'string',
                'nullable',
            ],
            'recur_next_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'currerncy'           => [
                'string',
                'required',
            ],
            'status'              => [
                'required',
            ],
            'archived'            => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_sent'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
