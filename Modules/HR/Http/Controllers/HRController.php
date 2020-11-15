<?php

namespace Modules\HR\Http\Controllers;

use Modules\HR\Http\Requests\Store\StoreJobApplicationRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\HR\Emails\JobApplicationRequest;
use Modules\HR\Http\Controllers\Controller;

use Modules\HR\Entities\JobApplication;
use Modules\HR\Entities\JobCircular;
use Symfony\Component\HttpFoundation\Response;
use Spatie\MediaLibrary\Models\Media;

class HRController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return view('hr::index');
    }

    public function circularDetails(Request $request)
    {
        $circularDetail = JobCircular::find($request->id);

        return view('hr::circular_details', compact('circularDetail'));
    }

    public function jobApplicationCreate()
    {
        $job_circulars = JobCircular::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $circularId = JobCircular::find(request()->id);

        return view('hr::create_jobApplications', compact('job_circulars', 'circularId'));
    }

    public function jobApplicationStore(StoreJobApplicationRequest $request, $job_circular_id)
    {
        // dd($job_circular_id);
        $request['job_circular_id'] = $job_circular_id;
        // dd($request->all());
        $jobApplication = JobApplication::create($request->all());

        if ($request->input('resume', false)) {
            $jobApplication->addMedia(storage_path('tmp/uploads/' . $request->input('resume')))->toMediaCollection('resume');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jobApplication->id]);
        }
        $job_circular = JobCircular::find($job_circular_id)->name;
        Mail::to('marwa120640@gmail.com')->cc("marwa120640@gmail.com")
                ->send(new JobApplicationRequest($jobApplication, $job_circular));

        return redirect()->route('front.circular_details', $job_circular_id);
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new JobApplication();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function create()
    {
        return view('hr::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('hr::show');
    }

    public function edit($id)
    {
        return view('hr::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
