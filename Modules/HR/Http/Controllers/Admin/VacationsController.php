<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Http\Requests\Destroy\MassDestroyVacationRequest;
use Modules\HR\Http\Requests\Store\StoreVacationRequest;
use Modules\HR\Http\Requests\Update\UpdateVacationRequest;
use App\Models\User;
use Modules\HR\Entities\Vacation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VacationsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vacation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacations = Vacation::get();

        return view('hr::admin.vacations.index', compact('vacations'));
    }

    public function create()
    {
        abort_if(Gate::denies('vacation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id');
        }

        return view('hr::admin.vacations.create', compact('users'));
    }

    public function store(StoreVacationRequest $request)
    {
        $vacation = Vacation::create($request->all());
        
        if ($request->input('attachments', false)) {
            $vacation->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vacation->id]);
        }

        $message = array(
            'message'    =>  ' Created Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.vacations.index')->with($flashMsg);
    }

    public function edit(Vacation $vacation)
    {
        abort_if(Gate::denies('vacation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id');
        }

        $vacation->load('user');

        return view('hr::admin.vacations.edit', compact('users', 'vacation'));
    }

    public function update(UpdateVacationRequest $request, Vacation $vacation)
    {
        $vacation->update($request->all());
        
        if ($request->input('attachments', false)) {
            if (!$vacation->attachments || $request->input('attachments') !== $vacation->attachments->file_name) {
                if ($vacation->attachments) {
                    $vacation->attachments->delete();
                }
            }
            $vacation->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        } elseif ($vacation->attachments) {
            $vacation->attachments->delete();
        }

        $message = array(
            'message'    =>  ' Updated Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.vacations.index')->with($flashMsg);
    }

    public function destroy(Vacation $vacation)
    {
        abort_if(Gate::denies('vacation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacation->forceDelete();

        return back();
    }

    public function massDestroy(MassDestroyVacationRequest $request)
    {
        Vacation::whereIn('id', request('ids'))->forceDelete();
        
        return response()->json([
            'ids'   => request('ids'),
        ]);
        // return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vacation_create') && Gate::denies('vacation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vacation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
