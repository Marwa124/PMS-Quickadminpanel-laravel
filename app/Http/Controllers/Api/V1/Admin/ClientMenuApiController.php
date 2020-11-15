<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientMenuRequest;
use App\Http\Requests\UpdateClientMenuRequest;
use App\Http\Resources\Admin\ClientMenuResource;
use App\Models\ClientMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMenuApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientMenuResource(ClientMenu::all());
    }

    public function store(StoreClientMenuRequest $request)
    {
        $clientMenu = ClientMenu::create($request->all());

        return (new ClientMenuResource($clientMenu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientMenu $clientMenu)
    {
        abort_if(Gate::denies('client_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientMenuResource($clientMenu);
    }

    public function update(UpdateClientMenuRequest $request, ClientMenu $clientMenu)
    {
        $clientMenu->update($request->all());

        return (new ClientMenuResource($clientMenu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientMenu $clientMenu)
    {
        abort_if(Gate::denies('client_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMenu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
