<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOutgoingEmailRequest;
use App\Http\Requests\UpdateOutgoingEmailRequest;
use App\Http\Resources\Admin\OutgoingEmailResource;
use App\Models\OutgoingEmail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutgoingEmailsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('outgoing_email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutgoingEmailResource(OutgoingEmail::all());
    }

    public function store(StoreOutgoingEmailRequest $request)
    {
        $outgoingEmail = OutgoingEmail::create($request->all());

        return (new OutgoingEmailResource($outgoingEmail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OutgoingEmail $outgoingEmail)
    {
        abort_if(Gate::denies('outgoing_email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutgoingEmailResource($outgoingEmail);
    }

    public function update(UpdateOutgoingEmailRequest $request, OutgoingEmail $outgoingEmail)
    {
        $outgoingEmail->update($request->all());

        return (new OutgoingEmailResource($outgoingEmail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OutgoingEmail $outgoingEmail)
    {
        abort_if(Gate::denies('outgoing_email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outgoingEmail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
