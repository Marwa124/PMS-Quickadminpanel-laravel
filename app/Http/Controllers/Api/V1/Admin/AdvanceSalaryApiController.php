<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAdvanceSalaryRequest;
use App\Http\Requests\UpdateAdvanceSalaryRequest;
use App\Http\Resources\Admin\AdvanceSalaryResource;
use App\Models\AdvanceSalary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvanceSalaryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('advance_salary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdvanceSalaryResource(AdvanceSalary::with(['user'])->get());
    }

    public function store(StoreAdvanceSalaryRequest $request)
    {
        $advanceSalary = AdvanceSalary::create($request->all());

        return (new AdvanceSalaryResource($advanceSalary))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AdvanceSalary $advanceSalary)
    {
        abort_if(Gate::denies('advance_salary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdvanceSalaryResource($advanceSalary->load(['user']));
    }

    public function update(UpdateAdvanceSalaryRequest $request, AdvanceSalary $advanceSalary)
    {
        $advanceSalary->update($request->all());

        return (new AdvanceSalaryResource($advanceSalary))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AdvanceSalary $advanceSalary)
    {
        abort_if(Gate::denies('advance_salary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advanceSalary->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
