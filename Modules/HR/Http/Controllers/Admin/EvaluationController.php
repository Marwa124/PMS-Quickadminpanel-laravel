<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Evaluation;
use Symfony\Component\HttpFoundation\Response;

class EvaluationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('evaluation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $userAccount = AccountDetail::findOrFail($id);
        $designation = $userAccount ? $userAccount->designation()->first() : '';
        $departmentTitle = $designation ? $designation->department()->select('department_name', 'department_head_id')->first() : '';
        $departmentHead = $departmentTitle ? AccountDetail::where('user_id', $departmentTitle->department_head_id)->select('fullname', 'user_id')->first() : '';

        $manager = 'false';
        if($departmentTitle && ($departmentTitle->department_head_id == $userAccount->user_id)) {
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
        $designation = $userAccount ? $userAccount->designation()->first() : '';
        $departmentTitle = $designation ? $designation->department()->select('department_name', 'department_head_id')->first() : '';
        $departmentHead = AccountDetail::where('user_id', $evaluation->manager_id)->select('fullname', 'user_id')->first();

        $departmentHead = $departmentHead ?? implode("", ['fullname' => 'Admin', 'user_id' => 1]);
        // if(!$departmentHead) return view('hr::admin.evaluations.index');
 
        $manager = 'false';
        if($evaluation->type == 'manager') {
            $manager = 'true';
        }

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

}
