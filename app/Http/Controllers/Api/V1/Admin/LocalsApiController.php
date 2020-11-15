<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocalRequest;
use App\Http\Resources\Admin\LocalResource;
use App\Models\Local;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('local_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocalResource(Local::all());
    }

    public function store(StoreLocalRequest $request)
    {
        $local = Local::create($request->all());

        return (new LocalResource($local))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(Local $local)
    {
        abort_if(Gate::denies('local_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $local->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
