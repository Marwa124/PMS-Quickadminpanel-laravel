<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJobCircularRequest;
use App\Http\Requests\UpdateJobCircularRequest;
use App\Http\Resources\Admin\JobCircularResource;
use App\Models\JobCircular;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobCircularsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_circular_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobCircularResource(JobCircular::with(['designation', 'permissions'])->get());
    }

    public function store(StoreJobCircularRequest $request)
    {
        $jobCircular = JobCircular::create($request->all());
        $jobCircular->permissions()->sync($request->input('permissions', []));

        return (new JobCircularResource($jobCircular))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobCircular $jobCircular)
    {
        abort_if(Gate::denies('job_circular_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobCircularResource($jobCircular->load(['designation', 'permissions']));
    }

    public function update(UpdateJobCircularRequest $request, JobCircular $jobCircular)
    {
        $jobCircular->update($request->all());
        $jobCircular->permissions()->sync($request->input('permissions', []));

        return (new JobCircularResource($jobCircular))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobCircular $jobCircular)
    {
        abort_if(Gate::denies('job_circular_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobCircular->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
