<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\User;
use Modules\HR\Http\Requests\Destroy\MassDestroyJobApplicationRequest;
use Modules\HR\Http\Requests\Store\StoreJobApplicationRequest;
use Modules\HR\Http\Requests\Update\UpdateJobApplicationRequest;
use Modules\HR\Entities\JobApplication;
use Modules\HR\Entities\JobCircular;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Designation;
use PDFAnony\TCPDF\Facades\AnonyPDF;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
// use PDF;

class JobApplicationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplications = JobApplication::orderBy('created_at', 'desc')->get();

        $circularId = '';
        if (count(request()->all()) > 0) {
            foreach (request()->all() as $key => $value) {
                $circularId = $key;
            }
            // $jobApplications = JobApplication::where('job_circular_id', $circularId)->get();
        }

        return view('hr::admin.jobApplications.index', compact('jobApplications', 'circularId'));
    }

    public function generatePDF($application_id, $local)
    {
        // abort_if(Gate::denies('generate_hr_letter'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detail['details'] = JobApplication::find($application_id);
        if ($local == 'ar') {
            $html = view('hr::admin.jobApplications.pdf_ar', $detail)->render(); // file render
        }else {
            $html = view('hr::admin.jobApplications.pdf_ar', $detail)->render(); // file render
            // $html = view('hr::admin.jobApplications.pdf_en', $detail)->render(); // file render
        }

        $pdfarr = [
            'title'=>'HR Letter',
            'data'=>$html,
            'header'=>['show'=>false], 
            'footer'=>['show'=>false], 
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12,
            'text'=>'',
            'rtl'=>($local == 'ar') ? true : false ,
            'filename'=>'HR Letter_'.rand(1, 999).'.pdf',
            'display'=>'download', // stream , download , print
        ];

       AnonyPDF::HTML($pdfarr);
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

    // Update Application Status
    public function update(JobApplication $jobApplication)
    {
        $application_color = $jobApplication::STATUS_COLOR[Request()->application_status];
        $application_text  = $jobApplication::APPLICATION_STATUS_SELECT[Request()->application_status];

        $jobApplication->update(['application_status' => Request()->application_status]);
        if(Request()->application_status == 'is_employee'){
            DB::beginTransaction();

            try {
                $userObject = User::create([
                    'name' => explode(' ', $jobApplication->name)[0],
                    'email' => $jobApplication->email,
                    'password' => Hash::make(explode(' ', $jobApplication->name)[0] . '@123'),
                    'banned' => 0,
                ]);

                $designation_id = $jobApplication->job_circular()->first()->designation_id;
                $incrementId = Designation::find($designation_id)->accountDetails()->get()->count()+1;

                $designationHasDepartment = Designation::find($designation_id)->department()->first(); 
                $department_id  = $designationHasDepartment ? $designationHasDepartment->id : '';
                AccountDetail::create([
                    'fullname' => $jobApplication->name,
                    'mobile'   => $jobApplication->mobile,
                    'user_id'  => $userObject->id,
                    'employment_id' => $department_id . sprintf('%02d', $incrementId+1),
                    'designation_id' => $designation_id,
                ]);
                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['error' => $e->getMessage()]);
            }
        }


        return response()->json([
            'application_color' => $application_color,
            'application_text'  => $application_text,
        ]);
        // $jobApplication->update($request->all());

        // if ($request->input('resume', false)) {
        //     if (!$jobApplication->resume || $request->input('resume') !== $jobApplication->resume->file_name) {
        //         if ($jobApplication->resume) {
        //             $jobApplication->resume->delete();
        //         }

        //         $jobApplication->addMedia(storage_path('tmp/uploads/' . $request->input('resume')))->toMediaCollection('resume');
        //     }
        // } elseif ($jobApplication->resume) {
        //     $jobApplication->resume->delete();
        // }

        // return redirect()->route('hr.admin.job-applications.index');
    }

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
