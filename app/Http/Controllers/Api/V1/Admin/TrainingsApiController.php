<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Http\Resources\Admin\TrainingResource;
use App\Models\Training;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainingResource(Training::with(['user', 'permissions'])->get());
    }

    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create($request->all());
        $training->permissions()->sync($request->input('permissions', []));

        if ($request->input('uploaded_file', false)) {
            $training->addMedia(storage_path('tmp/uploads/' . $request->input('uploaded_file')))->toMediaCollection('uploaded_file');
        }

        return (new TrainingResource($training))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Training $training)
    {
        abort_if(Gate::denies('training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainingResource($training->load(['user', 'permissions']));
    }

    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $training->update($request->all());
        $training->permissions()->sync($request->input('permissions', []));

        if ($request->input('uploaded_file', false)) {
            if (!$training->uploaded_file || $request->input('uploaded_file') !== $training->uploaded_file->file_name) {
                if ($training->uploaded_file) {
                    $training->uploaded_file->delete();
                }

                $training->addMedia(storage_path('tmp/uploads/' . $request->input('uploaded_file')))->toMediaCollection('uploaded_file');
            }
        } elseif ($training->uploaded_file) {
            $training->uploaded_file->delete();
        }

        return (new TrainingResource($training))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Training $training)
    {
        abort_if(Gate::denies('training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
