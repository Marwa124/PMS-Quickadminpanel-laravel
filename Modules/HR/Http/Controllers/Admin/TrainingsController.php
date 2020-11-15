<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Http\Requests\Destroy\MassDestroyTrainingRequest;
use Modules\HR\Http\Requests\Store\StoreTrainingRequest;
use Modules\HR\Http\Requests\Update\UpdateTrainingRequest;
use App\Models\Permission;
use Modules\HR\Entities\Training;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TrainingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainings = Training::all();

        return view('hr::admin.trainings.index', compact('trainings'));
    }

    public function create()
    {
        abort_if(Gate::denies('training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('hr::admin.trainings.create', compact('users', 'permissions'));
    }

    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create($request->all());
        $training->permissions()->sync($request->input('permissions', []));

        if ($request->input('uploaded_file', false)) {
            $training->addMedia(storage_path('tmp/uploads/' . $request->input('uploaded_file')))->toMediaCollection('uploaded_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $training->id]);
        }

        return redirect()->route('hr.admin.trainings.index');
    }

    public function edit(Training $training)
    {
        abort_if(Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $training->load('user', 'permissions');

        return view('hr::admin.trainings.edit', compact('users', 'permissions', 'training'));
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

        return redirect()->route('hr.admin.trainings.index');
    }

    public function show(Training $training)
    {
        abort_if(Gate::denies('training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->load('user', 'permissions');

        return view('admin.trainings.show', compact('training'));
    }

    public function destroy(Training $training)
    {
        abort_if(Gate::denies('training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingRequest $request)
    {
        Training::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('training_create') && Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Training();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
