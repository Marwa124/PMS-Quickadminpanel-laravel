<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Mail\ProjectManagementMail;
use Modules\HR\Entities\AccountDetail;
// use App\Models\Notification;
use Modules\HR\Http\Requests\Destroy\MassDestroyLeaveApplicationRequest;
use Modules\HR\Http\Requests\Store\StoreLeaveApplicationRequest;
use Modules\HR\Http\Requests\Update\UpdateLeaveApplicationRequest;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\LeaveCategory;
use App\Models\User;
use App\Notifications\ApproveRejectLeaveNotification;
use App\Notifications\LeaveApplicationNotification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\HR\Emails\LeaveRequest;
use Modules\HR\Entities\Department;
use Modules\HR\Entities\FingerprintAttendance;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LeaveApplicationsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('leave_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            if ($request->get('leaveTypes') == 'myLeaves') {
                $query = LeaveApplication::where('user_id', auth()->user()->id)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
            }elseif($request->get('leaveTypes') == 'pending') {

                $isDepartmentHead = Department::where('department_head_id', auth()->user()->id)->first();
                if (auth()->user()->hasAnyRole('Board Members', 'Admin')) {
                    // All pending leaves for board and admin
                    $query = LeaveApplication::where('application_status', 'pending')->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }elseif ($isDepartmentHead) {
                    $leaveAppIds = [];
                    $designations = $isDepartmentHead->departmentDesignations()->pluck('id')->toArray();
                    foreach (LeaveApplication::where('application_status', 'pending')->get() as $key => $value) {
                        $userDesignation = AccountDetail::select('designation_id')->find($value->user_id);
                        if (in_array($userDesignation->designation_id, $designations))
                        {
                            $leaveAppIds[] = $value->id;
                        }
                    }
                    // Shows only users pending leaves having designation in which head department is responsible for.
                    $query = LeaveApplication::whereIn('id', $leaveAppIds)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }else{
                    // Only Users leaves
                    $query = LeaveApplication::where('user_id', auth()->user()->id)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }
            }else {
                // All Leaves
                $isDepartmentHead = Department::where('department_head_id', auth()->user()->id)->first();
                if (User::find(auth()->user()->id)->hasRole('Board Members') || User::find(auth()->user()->id)->hasRole('Admin')) {
                    // All pending leaves for board and admin
                    $query = LeaveApplication::with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }elseif ($isDepartmentHead) {
                    $leaveAppIds = [];
                    $designations = $isDepartmentHead->departmentDesignations()->pluck('id')->toArray();
                    foreach (LeaveApplication::all() as $key => $value) {
                        $userDesignation = AccountDetail::select('designation_id')->find($value->user_id);
                        if (in_array($userDesignation->designation_id, $designations))
                        {
                            $leaveAppIds[] = $value->id;
                        }
                    }
                    // Shows only users pending leaves having designation in which head department is responsible for.
                    $query = LeaveApplication::whereIn('id', $leaveAppIds)->with(['user', 'leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }else{
                    $query = LeaveApplication::where('user_id', auth()->user()->id)->with(['leave_category'])->select(sprintf('%s.*', (new LeaveApplication)->table));
                }
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('status_color', '&nbsp;');

            $table->editColumn('actions', function ($row) use ($request){
                if ($request->get('trashed') == 1) {
                    $viewGate      = '';
                    $editGate      = '';
                    $approveReject = '';
                    $deleteGate    = 'leave_application_delete';
                    $deleteRestore = 'delete_restore';
                    $modalId       = 'hr.';
                    $crudRoutePart = 'leave-applications';
                }else{
                    $viewGate      = 'leave_application_show';
                    $editGate      = '';
                    $approveReject = 'approve_reject';
                    $deleteGate    = 'leave_application_delete';
                    $deleteRestore = '';
                    $modalId       = 'hr.';
                    $crudRoutePart = 'leave-applications';
                }

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'approveReject',
                    'deleteRestore',
                    'deleteGate',
                    'modalId',
                    'crudRoutePart',
                    'row'
                ));

            })->filter(function ($instance) use ($request) {
                if ($request->get('trashed')) {
                    $instance->onlyTrashed();
                }else{
                    // $instance->where('deleted_at', NULL);
                }
            })
            ->rawColumns(['status']);

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('leave_category_name', function ($row) {
                return $row->leave_category && $row->leave_category->name ? $row->leave_category->name : '';
            });
            $table->editColumn('leave_start_date', function ($row) {
                return $row->leave_start_date ? $row->leave_start_date : "";
            });
            $table->editColumn('leave_end_date', function ($row) {
                return $row->leave_end_date ? $row->leave_end_date : "";
            });
            $table->editColumn('status_color', function ($row) {
                return $row->application_status && LeaveApplication::STATUS_COLOR[$row->application_status] ? LeaveApplication::STATUS_COLOR[$row->application_status] : 'none';
            });
            $table->editColumn('application_status', function ($row) {
                return $row->application_status ? LeaveApplication::APPLICATION_STATUS_SELECT[$row->application_status] : '';
            });
            $table->editColumn('leave_type', function ($row) {
                return $row->leave_type ? LeaveApplication::LEAVE_TYPE_SELECT[$row->leave_type] : '';
            });
            $table->editColumn('hours', function ($row) {
                return $row->hours ? $row->hours : "";
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user->accountDetail->fullname ?? '';
            });
            $table->addColumn('attachment', function ($row) {
                $attachment = $row->attachments ? asset($row->attachments->getUrl()) : '';
                if($attachment) {
                    return '<a href="'.$attachment.'">' . "View File" . '</a>';
                }else { return ; }
            });

            $table->rawColumns(['actions', 'placeholder', 'leave_category_name', 'user']);

            return $table->escapeColumns([])->make(true);
        }

        return view('hr::admin.leaveApplications.index');
    }

    public function leaveReport()
    {
        $leaves = LeaveApplication::where('application_status', 'accepted')->get();

        $user_id = auth()->user()->id;
        $annual = checkAvailableLeaves($user_id, date('Y-m'), LeaveCategory::categoryId('Annual Leave'));
        $emergency = checkAvailableLeaves($user_id, date('Y-m'), LeaveCategory::categoryId('Emergency Leave'));
        $sick = checkAvailableLeaves($user_id, date('Y-m'), LeaveCategory::categoryId('Sick Leave'));
        $home = checkAvailableLeaves($user_id, date('Y-m'), LeaveCategory::categoryId('Working From Home'));
        $clockLate = checkAvailableLeaves($user_id, date('Y-m'), LeaveCategory::categoryId('Clock in late'));

        return view('hr::admin.leaveApplications.leave_report', compact('annual', 'emergency', 'sick', 'home', 'clockLate'));
    }

    // display all leaves of which the user has taken
    // Return Total leaves taken by user and leave_quota
    public function details(Request $request)
    {
        $userId = $request['user_id'];
        $userName = $request['user_name'];
        $date = $request['date'];

        $categoryDetails = [];
        foreach(LeaveCategory::all() as $category)
        {
            $cat = [];
            $cat['name'] = $category->name;
            $cat['check_available'] = checkAvailableLeaves($userId, $date, $category->id);
            $categoryDetails[] = $cat;
        }

        return view('hr::admin.leaveApplications.leaves_details', compact('userId', 'userName', 'categoryDetails'))->render();
    }

    public function markNotificationAsRead($id)
    {
        $user = User::findOrFail($id);
        if ($notifyId = Request()->application_id) {
            $user->notifications->find($notifyId)->markAsRead();
        }
    }

    public function create()
    {
        abort_if(Gate::denies('leave_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = [];
        $activeUsers = User::where('banned', 0)->get();
        if (auth()->user()->hasAnyRole(['Admin', 'Board Members'])) {
            foreach ($activeUsers as $key => $value) {
                $users[] = $value->accountDetail()->pluck('fullname', 'user_id');
            }

        }else{
            $users[] = auth()->user()->accountDetail()->pluck('fullname', 'user_id');
        }

        $categoryDetails = [];
        if (!auth()->user()->hasAnyRole(['Admin', 'Board Members'])) {
            foreach(LeaveCategory::all() as $category)
            {
                $cat['name'] = $category->name;
                $cat['check_available'] = checkAvailableLeaves(auth()->user()->id, date('Y-m'), $category->id);
                $categoryDetails[] = $cat;
            }
        }

        $leave_categories = LeaveCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('hr::admin.leaveApplications.create', compact('users', 'leave_categories'));
    }

    public function store(StoreLeaveApplicationRequest $request)
    {
        ///////////////////////////////
        // Check if end date leave smaller than start date leave Show Error Msg
        ///////////////////////////////
        $leaveApplication = new LeaveApplication();
        if ($request->leave_type == 'single_day') {
            $leaveApplication->leave_end_date = $request->leave_start_date;
        }
        if ($request->leave_type == 'multi_days') {
            $this->validate($request, ['leave_end_date' => 'required'], ['leave_end_date.required' => trans('cruds.leaveApplication.fields.required_end_date')]);
        }
        if ($request->leave_type == 'hours') {
            $this->validate($request, ['hours' => 'required']);
        }
        $leaveApplication = LeaveApplication::create($request->all());

        if ($request->input('attachments', false)) {
            $leaveApplication->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $leaveApplication->id]);
        }

        /* !!!: Sending Emails for each User admin and Depart. Head */
        /* !!!: Notification (db, mail) via Laravel $user->notify() */

        $leave_category = LeaveCategory::where('id', $leaveApplication->leave_category_id)->first()->name;
        if(User::find($leaveApplication->user_id)->accountDetail->designation()->first())
        {
            $department_head_employee = User::find($leaveApplication->user_id)->accountDetail->designation->department->department_head()->first();
            $board_members = Department::where('department_name', 'Board Members')->orWhere('department_name', 'CEO')->select('email')->get();
        }


        setActivity('leaveApplication',$leaveApplication->id,'New Leave Application Saved','حفط طلب مغادرة جديد',$leave_category,'');


         $user = User::find(23);
         $user->notify(new LeaveApplicationNotification($leaveApplication, $leave_category));
         $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
         event(new NewNotification($userNotify));



try {
    
    // send mail 
    $sender = settings('smtp_sender_name'); $email_from = settings('smtp_email') ;
    
    //send mail to client 
    $template = templates('leave_request_email'); 
    // $message = str_replace("{REF}",$invoice->reference_no,$template->template_body); 
    $message = str_replace("{NAME}",$user->name,$template->template_body); 
    $message = str_replace("{LEAVE_CATEGORY}",$leave_category,$message); 
    $message = str_replace("{START_DATE}",$leaveApplication->leave_start_date,$message); 
    $message = str_replace("{END_DATE}",$leaveApplication->leave_end_date,$message); 
    $message = str_replace("{REASON}",$leaveApplication->reason,$message); 
    $message = str_replace("{APPLICATION_LINK}",route("hr.admin.leave-applications.show", $leaveApplication->id),$message); 
    $message = str_replace("{SITE_NAME}",settings('company_name'),$message);
        Mail::mailer('smtp')
        // ->to('mabrouk@onetecgroup.com') 
        ->to('marwa@onetecgroup.com') 
        
        // ->cc('mabrouk@onetecgroup.com') 
        // ->cc('sara@onetecgroup.com') 
        ->bcc('marwa@onetecgroup.com') 
        ->send(new ProjectManagementMail($email_from, $sender, $template->subject, $message));
    


} catch(\Exception $msg ){
    return $msg;
}    
        









        // if($department_head_employee){
        //     $department_head_employee->notify(new LeaveApplicationNotification($leaveApplication, $leave_category));
        //     $userNotify = $department_head_employee->notifications->where('notifiable_id', $department_head_employee->id)->sortBy(['created_at' => 'desc'])->first();
        //     event(new NewNotification($userNotify));
        // }
        /* !!!: End Notification (db, mail) via Laravel $user->notify() */
        /* !!!: End Sending Emails for each User admin and Depart. Head */
        $message = array(
            'message'    =>  ' Created Successfully',
            'alert-type' =>  'success'
        );
        $flashMsg = flash($message['message'], $message['alert-type']);

        return redirect()->route('hr.admin.leave-applications.index')->with($flashMsg);
    }

    public function markAttendance($id)
    {
        try {
            FingerprintAttendance::create([
                'user_id' => $id,
                'date'    => date('Y-m-d'),
                'time'    => date('H:i:s'),
                'type'    => request()->type,
            ]);
        } catch (\Exception $msg) {
            return $msg->getMessage();
        }
    }

    public function approveReject($id, $status)
    {
        $leaveApplication = LeaveApplication::findOrFail($id);
        $leaveApplication->update(['application_status' => $status]);

        $user = User::find($leaveApplication->user_id);
        $leaveCategory = $leaveApplication->leave_category()->first();
        $user->notify(new ApproveRejectLeaveNotification($leaveApplication, $leaveCategory, $status));
        /* !!!: End Notification (db, mail) via Laravel $user->notify() */

        $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
        event(new NewNotification($userNotify));

        return redirect()->route('hr.admin.leave-applications.index');
    }

    public function show(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $attachment = $leaveApplication->attachments ? asset($leaveApplication->attachments->getUrl()) : '';
        $leaveApplication->load('user', 'leave_category');

        return view('hr::admin.leaveApplications.show', compact('leaveApplication', 'attachment'));
    }

    public function destroy(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($leaveApplication->trashed()) {
            $leaveApplication->forceDelete();
        } else {
            $leaveApplication->delete();
        }

        return back();
    }

    public function forceDelete(Request $request)
    {
        abort_if(Gate::denies('leave_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id = $request->id;
        $action = $request->action;

        if ($action == 'delete') {
            LeaveApplication::destroy($id);
        } else if ($action == 'force_delete') {
            LeaveApplication::onlyTrashed()->where('id', $id)->forceDelete();
        } else if ($action == 'restore') {
            LeaveApplication::onlyTrashed()->where('id', $id)->restore();
        }

        return back();
    }

    public function massDestroy(MassDestroyLeaveApplicationRequest $request)
    {
        if (LeaveApplication::whereIn('id', request('ids'))->onlyTrashed()) {
            LeaveApplication::whereIn('id', request('ids'))->forceDelete();
        } else {
            LeaveApplication::whereIn('id', request('ids'))->delete();
        }
        return response()->json([
            'ids'   => request('ids'),
        ]);
        // return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('leave_application_create') && Gate::denies('leave_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LeaveApplication();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
