<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Http\Requests\Destroy\MassDestroyVacationRequest;
use Modules\HR\Http\Requests\Store\StoreSetTimeRequest;
use Modules\HR\Http\Requests\Update\UpdateVacationRequest;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Department;
use Modules\HR\Entities\Designation;
use Modules\HR\Entities\Evaluation;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EvaluationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('evaluation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evaluations = Evaluation::all();
        return view('hr::admin.evaluations.index', compact('evaluations'));
    }

    // public function create()
    // {
    //     // abort_if(Gate::denies('evaluation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('hr::admin.evaluations.create');
    // }

    // public function store(StoreSetTimeRequest $request)
    // {
    //     $setTime = SetTime::create($request->all());

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $setTime->id]);
    //     }

    //     return redirect()->route('hr.admin.set-times.index');
    // }

    public function edit($id)
    {
        // abort_if(Gate::denies('evaluation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAccount = AccountDetail::find($id);
        // $userAccount = AccountDetail::find($id)->load('user');
        $designation = $userAccount->designation()->first();
        $departmentTitle = $designation->department()->select('department_name', 'department_head_id')->first();
        $departmentHead = AccountDetail::where('user_id', $departmentTitle->department_head_id)->select('fullname', 'user_id')->first();

        $manager = 'false';
        if($departmentTitle->department_head_id == $userAccount->user_id) {
            $manager = 'true';
        }

        return view('hr::admin.evaluations.edit', compact('userAccount', 'designation', 'departmentTitle', 'departmentHead', 'manager'));
    }

    // public function update(UpdateSetTimeRequest $request, SetTime $setTime)
    // {
    //     $setTime->update($request->all());

    //     return redirect()->route('hr.admin.set-times.index');
    // }

    public function show($id)
    {
        // abort_if(Gate::denies('evaluation_pdf'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evaluation = Evaluation::find($id)->load('ratingEvaluations');
        $userAccount = AccountDetail::where('user_id', $evaluation->user_id)->first();
        $designation = $userAccount->designation()->first();
        $departmentTitle = $designation->department()->select('department_name', 'department_head_id')->first();
        $departmentHead = AccountDetail::where('user_id', $evaluation->manager_id)->select('fullname', 'user_id')->first();

        $manager = 'false';
        if($evaluation->type == 'manager') {
            $manager = 'true';
        }
// dd($departmentHead);
        return view('hr::admin.evaluations.show',
            compact(
                'evaluation',
                'userAccount',
                'designation',
                'departmentTitle',
                'departmentHead',
                'manager'
            ));

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
