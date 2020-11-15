<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Payroll\Http\Requests\Destroy\MassDestroyAdvanceSalaryRequest;
use Modules\Payroll\Http\Requests\Store\StoreAdvanceSalaryRequest;
use Modules\Payroll\Http\Requests\Update\UpdateAdvanceSalaryRequest;
use Modules\Payroll\Entities\AdvanceSalary;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AdvanceSalaryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('advance_salary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advanceSalaries = AdvanceSalary::all();

        return view('payroll::admin.advanceSalaries.index', compact('advanceSalaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('advance_salary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.advanceSalaries.create', compact('users'));
    }

    public function store(StoreAdvanceSalaryRequest $request)
    {
        $advanceSalary = AdvanceSalary::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $advanceSalary->id]);
        }

        return redirect()->route('admin.payroll.advance-salaries.index');
    }

    public function edit(AdvanceSalary $advanceSalary)
    {
        abort_if(Gate::denies('advance_salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $advanceSalary->load('user');

        return view('payroll::admin.advanceSalaries.edit', compact('users', 'advanceSalary'));
    }

    public function update(UpdateAdvanceSalaryRequest $request, AdvanceSalary $advanceSalary)
    {
        $advanceSalary->update($request->all());

        return redirect()->route('admin.payroll.advance-salaries.index');
    }

    public function show(AdvanceSalary $advanceSalary)
    {
        abort_if(Gate::denies('advance_salary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advanceSalary->load('user');

        return view('payroll::admin.advanceSalaries.show', compact('advanceSalary'));
    }

    public function destroy(AdvanceSalary $advanceSalary)
    {
        abort_if(Gate::denies('advance_salary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advanceSalary->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvanceSalaryRequest $request)
    {
        AdvanceSalary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('advance_salary_create') && Gate::denies('advance_salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AdvanceSalary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
