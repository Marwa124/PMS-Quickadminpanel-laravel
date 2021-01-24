<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyTimeWorkTypeRequest;
use Modules\ProjectManagement\Http\Requests\StoreTimeWorkTypeRequest;
use Modules\ProjectManagement\Http\Requests\UpdateTimeWorkTypeRequest;
use Modules\ProjectManagement\Entities\TimeWorkType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TimeWorkTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('time_work_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('time_work_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $trashed = true;

            $timeWorkTypes = TimeWorkType::onlyTrashed()->get();

            return view('projectmanagement::admin.timeWorkTypes.index', compact('timeWorkTypes','trashed'));
        }


        $trashed = false;

        $timeWorkTypes = TimeWorkType::all();

        return view('projectmanagement::admin.timeWorkTypes.index', compact('timeWorkTypes','trashed'));
    }

    public function create()
    {
        abort_if(Gate::denies('time_work_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('projectmanagement::admin.timeWorkTypes.create');
    }

    public function store(StoreTimeWorkTypeRequest $request)
    {
        $timeWorkType = TimeWorkType::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $timeWorkType->id]);
        }

        return redirect()->route('projectmanagement.admin.time-work-types.index');
    }

    public function edit(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('projectmanagement::admin.timeWorkTypes.edit', compact('timeWorkType'));
    }

    public function update(UpdateTimeWorkTypeRequest $request, TimeWorkType $timeWorkType)
    {
        $timeWorkType->update($request->all());

        return redirect()->route('projectmanagement.admin.time-work-types.index');
    }

    public function show(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('projectmanagement::admin.timeWorkTypes.show', compact('timeWorkType'));
    }

    public function destroy(TimeWorkType $timeWorkType)
    {
        abort_if(Gate::denies('time_work_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeWorkType->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeWorkTypeRequest $request)
    {
        TimeWorkType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('time_work_type_create') && Gate::denies('time_work_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TimeWorkType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function forceDelete(Request $request,$id)
    {
        //dd($request->all(),$id);
        $action = $request->action;

        if ($action == 'force_delete') {

            $timeWorkType = TimeWorkType::onlyTrashed()->where('id', $id)->first();

            // force delete Time Work Type
            $timeWorkType->forceDelete();

        } else if ($action == 'restore') {
            // restore Time Work Type
            TimeWorkType::onlyTrashed()->where('id', $id)->restore();
        }

        return back();

    }
}
