<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientMenuRequest;
use App\Http\Requests\StoreClientMenuRequest;
use App\Http\Requests\UpdateClientMenuRequest;
use App\Models\ClientMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMenus = ClientMenu::all();

        return view('admin.clientMenus.index', compact('clientMenus'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientMenus.create');
    }

    public function store(StoreClientMenuRequest $request)
    {
        $clientMenu = ClientMenu::create($request->all());

        return redirect()->route('admin.client-menus.index');
    }

    public function edit(ClientMenu $clientMenu)
    {
        abort_if(Gate::denies('client_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientMenus.edit', compact('clientMenu'));
    }

    public function update(UpdateClientMenuRequest $request, ClientMenu $clientMenu)
    {
        $clientMenu->update($request->all());

        return redirect()->route('admin.client-menus.index');
    }

    public function show(ClientMenu $clientMenu)
    {
        abort_if(Gate::denies('client_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientMenus.show', compact('clientMenu'));
    }

    public function destroy(ClientMenu $clientMenu)
    {
        abort_if(Gate::denies('client_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMenu->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientMenuRequest $request)
    {
        ClientMenu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
