<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use App\Http\Resources\Admin\BugResource;
use App\Models\Bug;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BugsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bug_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BugResource(Bug::with(['project', 'opportunities', 'task', 'permissions'])->get());
    }

    public function store(StoreBugRequest $request)
    {
        $bug = Bug::create($request->all());
        $bug->permissions()->sync($request->input('permissions', []));

        return (new BugResource($bug))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bug $bug)
    {
        abort_if(Gate::denies('bug_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BugResource($bug->load(['project', 'opportunities', 'task', 'permissions']));
    }

    public function update(UpdateBugRequest $request, Bug $bug)
    {
        $bug->update($request->all());
        $bug->permissions()->sync($request->input('permissions', []));

        return (new BugResource($bug))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bug $bug)
    {
        abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bug->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
