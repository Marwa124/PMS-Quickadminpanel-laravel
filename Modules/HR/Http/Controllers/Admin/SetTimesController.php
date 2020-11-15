<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Http\Requests\Destroy\MassDestroyVacationRequest;
use Modules\HR\Http\Requests\Store\StoreSetTimeRequest;
use Modules\HR\Http\Requests\Update\UpdateVacationRequest;
use App\Models\User;
use Modules\HR\Entities\SetTime;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SetTimesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('set_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setTimes = SetTime::all();

        return view('hr::admin.setTimes.index', compact('setTimes'));
    }

    public function create()
    {
        abort_if(Gate::denies('set_time_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.setTimes.create', compact('users'));
    }

    public function store(StoreSetTimeRequest $request)
    {
        $setTime = SetTime::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setTime->id]);
        }

        return redirect()->route('hr.admin.set-times.index');
    }

    public function edit(SetTime $setTime)
    {
        abort_if(Gate::denies('set_time_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setTime->load('user');

        return view('hr::admin.setTimes.edit', compact('users', 'setTime'));
    }

    public function update(UpdateSetTimeRequest $request, SetTime $setTime)
    {
        $setTime->update($request->all());

        return redirect()->route('hr.admin.set-times.index');
    }

    public function show(SetTime $setTime)
    {
        abort_if(Gate::denies('set_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setTime->load('user');

        return view('hr::admin.setTimes.show', compact('setTime'));
    }

    public function destroy(SetTime $setTime)
    {
        abort_if(Gate::denies('set_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setTime->delete();

        return back();
    }

    public function massDestroy(MassDestroySetTimeRequest $request)
    {
        SetTime::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('set_time_create') && Gate::denies('set_time_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SetTime();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
