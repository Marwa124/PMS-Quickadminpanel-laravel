<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Notifications\ProjectManagementNotification;
use Modules\HR\Entities\Designation;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyWorkTrackingRequest;
use Modules\ProjectManagement\Http\Requests\StoreWorkTrackingRequest;
use Modules\ProjectManagement\Http\Requests\UpdateWorkTrackingRequest;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\TimeWorkType;
use Modules\ProjectManagement\Entities\WorkTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Mail\ProjectManagementMail;
use Illuminate\Support\Facades\Mail;

class WorkTrackingController extends Controller
{
    use ProjectManagementHelperTrait;

    public function index()
    {
        abort_if(Gate::denies('work_tracking_access'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        if (request()->segment(count(request()->segments())) == 'trashed') {

            abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

            $trashed = true;

            $workTrackings = auth()->user()->getUserWorkTrackingByUserID(auth()->user()->id,$trashed);

            return view('projectmanagement::admin.workTrackings.index', compact('workTrackings', 'trashed'));
        }

        $trashed = false;

        $workTrackings = auth()->user()->getUserWorkTrackingByUserID(auth()->user()->id,$trashed);

        return view('projectmanagement::admin.workTrackings.index', compact('workTrackings', 'trashed'));
    }

    public function create()
    {
        abort_if(Gate::denies('work_tracking_create'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        $work_types = TimeWorkType::all()->pluck('name', 'id');

        $accounts = AccountDetail::all()->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('projectmanagement::admin.workTrackings.create', compact('work_types', 'accounts'));
    }

    public function store(StoreWorkTrackingRequest $request)
    {
        abort_if(Gate::denies('work_tracking_create'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $workTracking = WorkTracking::create($request->all());

            setActivity('workTracking',$workTracking->id,'Create Work Tracking Details','إضافه تفاصيل تتبع العمل ',$workTracking->subject_en,$workTracking->subject_ar);

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return redirect()->route('projectmanagement.admin.work-trackings.index');
    }

    public function edit(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_edit'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workTracking->load('work_type');

        return view('projectmanagement::admin.workTrackings.edit', compact('work_types', 'workTracking'));
    }

    public function update(UpdateWorkTrackingRequest $request, WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_edit'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $workTracking->update($request->all());

            // Notify User
            foreach ($workTracking->accountDetails as $accountUser)
            {
                $user = $accountUser->user;
                //dd($user);
//                $dataMail = [
//                    'subjectMail'    => 'Update Project '.$project->{'name_'.app()->getLocale()},
//                    'bodyMail'       => 'Update The Project '.$project->{'name_'.app()->getLocale()},
//                    'action'         => route("projectmanagement.admin.projects.show", $project->id)
//                ];

                $dataNotification = [
                    'message'       => 'Update The Work Tracking : '.$workTracking->{'subject_'.app()->getLocale()},
                    'route_path'    => 'admin/projectmanagement/work-trackings',
                ];

//                $user->notify(new ProjectManagementNotification($project,$user,$dataMail,$dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($workTracking,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender));

            }

            setActivity('workTracking',$workTracking->id,'Update Work Tracking Details','تعديل تفاصيل تتبع العمل ',$workTracking->subject_en,$workTracking->subject_ar);

            // Commit the transaction
            DB::commit();
            return redirect()->route('projectmanagement.admin.work-trackings.index')->with(flash(trans('cruds.messages.update_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.update_success'), 'danger'))->withInput();

            // and throw the error again.
            throw $e;
        }

        return redirect()->route('projectmanagement.admin.work-trackings.index');
    }

    public function show(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_show'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        $workTracking->load('work_type');
        $result = $this->get_progress_ofWorkTracking($workTracking);
        $today = date('Y-m-d');

        if ($workTracking->end_date > $today){

            $workTrakingStatus = trans('cruds.status.on_going');
            $color = '#0d86ff';
        }else{
            if($workTracking->achievement <= $result['achievement_WorkTracking']){

                $workTrakingStatus = trans('cruds.status.achieved');
                $color ='#2d995b';
            }else{

                $workTrakingStatus = trans('cruds.status.failed');
                $color = '#b91d19';
            }

        }

        return view('projectmanagement::admin.workTrackings.show', compact('workTracking','result','workTrakingStatus','color'));
    }

    public function destroy(WorkTracking $workTracking)
    {
        abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $workTracking->delete();

            setActivity('workTracking',$workTracking->id,'Delete Work Tracking','حذف تتبع العمل ',$workTracking->subject_en,$workTracking->subject_ar);

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return back();
    }

    public function massDestroy(MassDestroyWorkTrackingRequest $request)
    {
        abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        $ids = request('ids');

        foreach ($ids as $id){

            try {
                // Begin a transaction
                DB::beginTransaction();

                $workTracking = WorkTracking::where('id',$id)->first();

                $workTracking->delete();

                //$project->accountDetails()->detach();
                setActivity('workTracking',$workTracking->id,'Delete Work Tracking','حذف تتبع العمل ',$workTracking->subject_en,$workTracking->subject_ar);

                // Commit the transaction
                DB::commit();

            }catch(\Exception $e){
                // An error occured; cancel the transaction...
                DB::rollback();

                // and throw the error again.
                throw $e;
            }
        }


        //WorkTracking::whereIn('id', request('ids'))->delete();


        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function forceDelete(Request $request, $id)
    {
        abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            //dd($request->all(),$id);
            $action = $request->action;

            if ($action == 'force_delete') {

                $workTracking = WorkTracking::onlyTrashed()->where('id', $id)->first();

                // force delete bug
                $workTracking->forceDelete();

            } else if ($action == 'restore') {
                //restore WorkTracking
                WorkTracking::onlyTrashed()->where('id', $id)->restore();
                $workTracking = WorkTracking::findOrFail($id);

                setActivity('workTracking',$workTracking->id,'Restore Work Tracking Details','إسترجاع تفاصيل تتبع العمل ',$workTracking->subject_en,$workTracking->subject_ar);

            }

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return back();

    }

    public function getAssignTo($id)
    {

        abort_if(Gate::denies('work_tracking_assign_to'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        $workTracking = WorkTracking::findOrFail($id);
        $designations = Designation::all();

        return view('projectmanagement::admin.workTrackings.assignto',compact('workTracking','designations'));

    }


    public function storeAssignTo(Request $request)
    {
        abort_if(Gate::denies('work_tracking_assign_to'), Response::HTTP_FORBIDDEN,  trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $workTracking = WorkTracking::findOrFail($request->workTracking_id);
            if ($request->accounts) {


                $workTracking->accountDetails()->sync($request->accounts);
                //$project->accountDetails()->syncWithoutDetaching($request->accounts);

                // set permission to users
                $accounts = AccountDetail::whereIn('id', $request->accounts)->get();

    //            $workTracking_permissions_head_names = ['project_management_access', 'work_tracking_access', 'work_tracking_create', 'work_tracking_show', 'work_tracking_edit', 'work_tracking_assign_to'];
    //            $workTracking_permissions_notToMember_names = ['work_tracking_create', 'work_tracking_edit', 'work_tracking_assign_to'];
                $workTracking_permissions_toMember_names = ['project_management_access', 'work_tracking_access', 'work_tracking_show'];

    //            $project_permissions_head = $this->getPermissionID($project_permissions_head_names);
    //            $project_permissions_notToMember = $this->getPermissionID($project_permissions_notToMember_names);
                $workTracking_permissions_toMember = $this->getPermissionID($workTracking_permissions_toMember_names);

                foreach ($accounts as $account) {

                    if (!$account->user->hasrole(['Admin','Super Admin'])) {

    //                    foreach ($account->user->permissions as $permission) {
    //
    //                        if (in_array($permission->name, $project_permissions_notToMember_names)) {
    //                            $account->user->permissions()->detach($project_permissions_notToMember);
    //                        }
    //                    }
                        $account->user->permissions()->syncWithoutDetaching($workTracking_permissions_toMember);

    //                    foreach ($account->user->department as $department) {
    //                        if ($department->department_name == $project->department->department_name) {
    //                            $account->user->permissions()->syncWithoutDetaching($project_permissions_head);
    //
    //                            break;
    //                        }
    //                    }
                    }
                }
            }else{
                $workTracking->accountDetails()->detach();
            }

            // Notify User
            foreach ($workTracking->accountDetails as $accountUser)
            {
                $user = $accountUser->user;

//                $dataMail = [
//                    'subjectMail'    => 'New Work Tracking Assign To You',
//                    'bodyMail'       => 'Assign The Work Tracking '.$workTracking->subject.' To '.$user->name,
//                    'action'         => route("projectmanagement.admin.work-trackings.show", $workTracking->id)
//                ];

                $dataNotification = [
                    'message'       => 'Assign The Work Tracking : '.$workTracking->subject.' To '.$user->name,
                    'route_path'    => 'admin/projectmanagement/work-trackings',
                ];

//                $user->notify(new ProjectManagementNotification($workTracking,$user,$dataMail,$dataNotification));

                //send notification
                $user->notify(new ProjectManagementNotification($workTracking,$user,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;
                Mail::mailer('smtp')->to($user->email)->send(new ProjectManagementMail($email_from, $sender));
            }

            setActivity('workTracking',$workTracking->id,'Update Assign to ','تعديل القائمين على مشروع',$workTracking->subject_en,$workTracking->subject_ar);

            // Commit the transaction
            DB::commit();

            return redirect()->route('projectmanagement.admin.work-trackings.index')->with(flash(trans('cruds.messages.assignto_success'), 'success'));

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return back()->with(flash(trans('cruds.messages.assignto_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('projectmanagement.admin.work-trackings.index');
    }
}
