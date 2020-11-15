<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalutationRequest;
use App\Http\Resources\Admin\SalutationResource;
use App\Models\Salutation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalutationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salutation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalutationResource(Salutation::all());
    }

    public function store(StoreSalutationRequest $request)
    {
        $salutation = Salutation::create($request->all());

        return (new SalutationResource($salutation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(Salutation $salutation)
    {
        abort_if(Gate::denies('salutation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salutation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
