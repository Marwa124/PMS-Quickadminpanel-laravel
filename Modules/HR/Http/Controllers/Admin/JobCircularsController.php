<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Http\Requests\Destroy\MassDestroyJobCircularRequest;
use Modules\HR\Http\Requests\Store\StoreJobCircularRequest;
use Modules\HR\Http\Requests\Update\UpdateJobCircularRequest;
use Modules\HR\Entities\Designation;
use Modules\HR\Entities\JobCircular;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\JobApplication;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

// use Jorenvh\Share\Share;
use Jorenvh\Share\ShareFacade;

class JobCircularsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_circular_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobCirculars = JobCircular::all();

        // $sharingLinks = '';

        // if (request()->session()->exists('sharingLinks')) {
        //     $sharingLinks = request()->session()->get('sharingLinks');
        // }

        return view('hr::admin.jobCirculars.index', compact('jobCirculars'));
    }

    public function listJobApplications(Request $request)
    {
        abort_if(Gate::denies('job_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplications = JobApplication::all();

        return view('hr::admin.jobApplications.index', compact('jobApplications'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_circular_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('designation_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.jobCirculars.create', compact('designations'));
    }

    public function store(StoreJobCircularRequest $request)
    {
        $jobCircular = JobCircular::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jobCircular->id]);
        }

        if ($jobCircular->status == 'published') {
            $sharingLinks = ShareFacade::page('http://01-pms-adminquickpanel.test/circular_details/'. $jobCircular->id, 'A New Job Vacancy')
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp();

            request()->session()->put('sharingLinks'. $jobCircular->id, $sharingLinks);
            // dd($sharingLinks->getHtml());
            // dd(ShareFacade::page('http://jorenvanhocht.be', 'A New Job Vacancy')->twitter());
        }

        $message = array(
            'message'    =>  ' Created Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.job-circulars.index')->with($flashMsg);
    }

    public function edit(JobCircular $jobCircular)
    {
        abort_if(Gate::denies('job_circular_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('designation_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jobCircular->load('designation');

        return view('hr::admin.jobCirculars.edit', compact('designations', 'jobCircular'));
    }

    public function update(UpdateJobCircularRequest $request, JobCircular $jobCircular)
    {
        $jobCircular->update($request->all());

        if ($request->status == 'published') {
            $sharingLinks = ShareFacade::page('http://01-pms-adminquickpanel.test/circular_details/'. $jobCircular->id, 'A New Job Vacancy')
                ->facebook()
                ->twitter()
                ->linkedin()
                ->whatsapp();

            request()->session()->put('sharingLinks'. $jobCircular->id, $sharingLinks);
        }

        $message = array(
            'message'    =>  ' Updated Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.job-circulars.index')->with($flashMsg);
    }

    public function show(JobCircular $jobCircular)
    {
        abort_if(Gate::denies('job_circular_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobCircular->load('designation');

        return view('hr::admin.jobCirculars.show', compact('jobCircular'));
    }

    public function destroy(JobCircular $jobCircular)
    {
        abort_if(Gate::denies('job_circular_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobCircular->forceDelete();

        return back();
    }

    public function massDestroy(MassDestroyJobCircularRequest $request)
    {
        JobCircular::whereIn('id', request('ids'))->forceDelete();

        return response()->json([
            'ids'   => request('ids'),
        ]);
        // return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('job_circular_create') && Gate::denies('job_circular_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JobCircular();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
