<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use App\Http\Resources\Admin\DesignationResource;
use App\Models\Designation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('designation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesignationResource(Designation::with(['department', 'permissions'])->get());
    }

    public function store(StoreDesignationRequest $request)
    {
        $designation = Designation::create($request->all());
        $designation->permissions()->sync($request->input('permissions', []));

        return (new DesignationResource($designation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Designation $designation)
    {
        abort_if(Gate::denies('designation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesignationResource($designation->load(['department', 'permissions']));
    }

    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        $designation->update($request->all());
        $designation->permissions()->sync($request->input('permissions', []));

        return (new DesignationResource($designation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Designation $designation)
    {
        abort_if(Gate::denies('designation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
