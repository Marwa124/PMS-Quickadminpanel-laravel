<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\HR\Http\Requests\Destroy\MassDestroyJobApplicationRequest;
use Modules\HR\Http\Requests\Store\StoreJobApplicationRequest;
use Modules\HR\Http\Requests\Update\UpdateJobApplicationRequest;
use Modules\HR\Entities\JobApplication;
use Modules\HR\Entities\JobCircular;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JobApplicationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplications = JobApplication::all();

        $circularId = '';
        if (count(request()->all()) > 0) {
            foreach (request()->all() as $key => $value) {
                $circularId = $key;
            }
            // $jobApplications = JobApplication::where('job_circular_id', $circularId)->get();
        }

        return view('hr::admin.jobApplications.index', compact('jobApplications', 'circularId'));
    }

    // public function create()
    // {
    //     abort_if(Gate::denies('job_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $job_circulars = JobCircular::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     return view('hr::admin.jobApplications.create', compact('job_circulars'));
    // }

    // public function store(StoreJobApplicationRequest $request)
    // {
    //     $jobApplication = JobApplication::create($request->all());

    //     if ($request->input('resume', false)) {
    //         $jobApplication->addMedia(storage_path('tmp/uploads/' . $request->input('resume')))->toMediaCollection('resume');
    //     }

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $jobApplication->id]);
    //     }

    //     return redirect()->route('hr.admin.job-applications.index');
    // }

    // public function edit(JobApplication $jobApplication)
    // {
    //     abort_if(Gate::denies('job_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $job_circulars = JobCircular::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     $jobApplication->load('job_circular');

    //     return view('hr::admin.jobApplications.edit', compact('job_circulars', 'jobApplication'));
    // }

    // public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    // {
    //     $jobApplication->update($request->all());

    //     if ($request->input('resume', false)) {
    //         if (!$jobApplication->resume || $request->input('resume') !== $jobApplication->resume->file_name) {
    //             if ($jobApplication->resume) {
    //                 $jobApplication->resume->delete();
    //             }

    //             $jobApplication->addMedia(storage_path('tmp/uploads/' . $request->input('resume')))->toMediaCollection('resume');
    //         }
    //     } elseif ($jobApplication->resume) {
    //         $jobApplication->resume->delete();
    //     }

    //     return redirect()->route('hr.admin.job-applications.index');
    // }

    // public function show(JobApplication $jobApplication)
    // {
    //     abort_if(Gate::denies('job_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $jobApplication->load('job_circular');

    //     return view('hr::admin.jobApplications.show', compact('jobApplication'));
    // }

    public function destroy(JobApplication $jobApplication)
    {
        abort_if(Gate::denies('job_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplication->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobApplicationRequest $request)
    {
        JobApplication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // public function storeCKEditorImages(Request $request)
    // {
    //     abort_if(Gate::denies('job_application_create') && Gate::denies('job_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $model         = new JobApplication();
    //     $model->id     = $request->input('crud_id', 0);
    //     $model->exists = true;
    //     $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

    //     return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    // }
}
