<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrivateChatRequest;
use App\Http\Requests\StorePrivateChatRequest;
use App\Models\PrivateChat;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrivateChatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('private_chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $privateChats = PrivateChat::all();

        return view('admin.privateChats.index', compact('privateChats'));
    }

    public function create()
    {
        abort_if(Gate::denies('private_chat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.privateChats.create', compact('users'));
    }

    public function store(StorePrivateChatRequest $request)
    {
        $privateChat = PrivateChat::create($request->all());

        return redirect()->route('admin.private-chats.index');
    }

    public function destroy(PrivateChat $privateChat)
    {
        abort_if(Gate::denies('private_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $privateChat->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrivateChatRequest $request)
    {
        PrivateChat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
