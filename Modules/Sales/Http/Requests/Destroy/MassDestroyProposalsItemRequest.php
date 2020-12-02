<?php

namespace Modules\Sales\Http\Requests\Destroy;

use Modules\Sales\Entities\ProposalsItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProposalsItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('proposals_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:proposals_items,id',
        ];
    }
}
