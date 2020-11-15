<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrivateChatRequest;
use App\Http\Resources\Admin\PrivateChatResource;
use App\Models\PrivateChat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrivateChatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('private_chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrivateChatResource(PrivateChat::with(['user'])->get());
    }

    public function store(StorePrivateChatRequest $request)
    {
        $privateChat = PrivateChat::create($request->all());

        return (new PrivateChatResource($privateChat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(PrivateChat $privateChat)
    {
        abort_if(Gate::denies('private_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $privateChat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
