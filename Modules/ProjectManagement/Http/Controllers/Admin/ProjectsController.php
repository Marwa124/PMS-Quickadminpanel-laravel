<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Invoice;
use App\Models\ProjectSetting;
use App\Models\User;
use App\Notifications\ProjectManagementNotification;
use Illuminate\Support\Facades\DB;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Department;
use Modules\ProjectManagement\Entities\ProjectSpecification;
use Modules\ProjectManagement\Entities\TaskStatus;
use Modules\ProjectManagement\Entities\TimeSheet;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyProjectRequest;
use Modules\ProjectManagement\Http\Requests\StoreProjectRequest;
use Modules\ProjectManagement\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use Modules\ProjectManagement\Entities\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use PDF;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Entities\Task;
use MPDF;


class ProjectsController extends Controller
{
    use MediaUploadingTrait,ProjectManagementHelperTrait;

    public function __construct()
    {
        $this->middleware('AllowAccessShowAndEditPages:Project',['only' => ['show','edit','getAssignTo','update_project_timer']]);
    }

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $clients = Client::get();

        $status =TaskStatus::all();

        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

            $trashed = true;
            $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id,$trashed);

            return view('projectmanagement::admin.projects.index', compact('projects','trashed', 'clients','status'));
        }

        $trashed = false;
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id,$trashed);

        return view('projectmanagement::admin.projects.index', compact('projects','trashed', 'clients','status'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $clients = Client::all()->pluck('name', 'id');

        $departments = Department::all();

        return view('projectmanagement::admin.projects.create', compact('clients','departments'));
    }

    public function store(StoreProjectRequest $request)
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
        try {
            // Begin a transaction
            DB::beginTransaction();

            $project = Project::create($request->all());

            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $project->id]);
            }

            setActivity('project',$project->id,'Save Project Details','حفظ تفاصيل المشروع',$project->name_en,$project->name_ar);

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this project or not
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($project->id,$projects->toArray())){


            $clients = Client::all()->pluck('name', 'id');

            $project->load('client','department');

            $departments = Department::all();

            return view('projectmanagement::admin.projects.edit', compact('clients', 'project','departments'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            if(!$request->calculate_progress){
                $request['calculate_progress'] = null;
            }

            if ($project->department_id != $request->department_id){
                $project->accountDetails()->detach();
            }

            $project->update($request->all());

            // Notify User
            foreach ($project->accountDetails as $accountUser)
            {
    //            dd($project->accountDetails());
                $user = $accountUser->user;
                //dd($user);
                $dataMail = [
                    'subjectMail'    => 'Update Project '.$project->{'name_'.app()->getLocale()},
                    'bodyMail'       => 'Update The Project '.$project->{'name_'.app()->getLocale()},
                    'action'         => route("projectmanagement.admin.projects.show", $project->id)
                ];

                $dataNotification = [
                    'message'       => 'Update The Project : '.$project->{'name_'.app()->getLocale()},
                    'route_path'    => 'admin/projectmanagement/projects',
                ];

                $user->notify(new ProjectManagementNotification($project,$user,$dataMail,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));
            }

            setActivity('project',$project->id,'Update Project Details','تعديل تفاصيل المشروع',$project->name_en,$project->name_ar);

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this project or not
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($project->id,$projects->toArray())){

            $project->load('client','department','TimeSheetOn','TimeSheet');

            $total_expense = $project->transactions->where('type' , 'Expense')->sum('amount');
            $billable_expense = $project->transactions->where(array('type' => 'Expense', 'billable' => 'Yes'))->sum('amount');
            $not_billable_expense = $project->transactions->where(array('type' => 'Expense', 'billable' => 'No'))->sum('amount');

            $all_expense_info =  $project->transactions->where('type', 'Expense');

            $paid_expense = 0;
            foreach ($all_expense_info as $v_expenses){
                if ($v_expenses->invoices_id != 0) {
                    $paid_expense += Invoice::get_invoice_paid_amount($v_expenses->invoices_id);
                }
            }

            return view('projectmanagement::admin.projects.show', compact('project','total_expense','billable_expense','not_billable_expense','paid_expense'));

        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

//        if($project->deleted_at == 0){
//            $project->update(['deleted_at' => 1]);
//        }else{
//            $project->accountDetails()->detach();
                $project->delete();

//        }
            setActivity('project',$project->id,'Delete Project Details','تم حذف المشروع',$project->name_en,$project->name_ar);

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

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
        //Project::whereIn('id', request('ids'))->delete();

        try {
            // Begin a transaction
            DB::beginTransaction();

            $ids = request('ids');

            foreach ($ids as $id){
                $project = Project::where('id',$id)->first();

                $project->delete();

                //$project->accountDetails()->detach();
                setActivity('project',$project->id,'Delete Project Details','تم حذف المشروع',$project->name_en,$project->name_ar);
            }

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id)
    {

        abort_if(Gate::denies('project_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this project or not
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($id,$projects->toArray())){

            $project = Project::findOrFail($id);
            $department = $project->department()->first();

            if (!$department){
                abort(404,"This Project don't have Department ");
            }
            return view('projectmanagement::admin.projects.assignto',compact('project','department'));
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function storeAssignTo(Request $request)
    {

        abort_if(Gate::denies('project_assign_to'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $project = Project::where('id', $request->project_id)->first();
            if ($request->accounts) {


                $project->accountDetails()->sync($request->accounts);
                //$project->accountDetails()->syncWithoutDetaching($request->accounts);

                // set permission to users
                $accounts = AccountDetail::whereIn('id', $request->accounts)->with('user.department')->get();

                $project_permissions_head_names = ['project_management_access', 'project_access', 'project_create', 'project_show', 'project_edit', 'project_assign_to'];
                $project_permissions_notToMember_names = ['project_create', 'project_edit', 'project_assign_to'];
                $project_permissions_toMember_names = ['project_management_access', 'project_access', 'project_show'];

                $project_permissions_head = $this->getPermissionID($project_permissions_head_names);
                $project_permissions_notToMember = $this->getPermissionID($project_permissions_notToMember_names);
                $project_permissions_toMember = $this->getPermissionID($project_permissions_toMember_names);

                foreach ($accounts as $account) {

                    if (!$account->user->hasrole(['Admin','Super Admin'])) {

                        foreach ($account->user->permissions as $permission) {

                            if (in_array($permission->name, $project_permissions_notToMember_names)) {
                                $account->user->permissions()->detach($project_permissions_notToMember);
                            }
                        }
                        $account->user->permissions()->syncWithoutDetaching($project_permissions_toMember);

                        foreach ($account->user->department as $department) {
                            if ($department->department_name == $project->department->department_name) {
                                $account->user->permissions()->syncWithoutDetaching($project_permissions_head);

                                break;
                            }
                        }
                    }
                }
            }else{
                $project->accountDetails()->detach();
            }

            // Notify User
            foreach ($project->accountDetails as $accountUser)
            {
    //            dd($project->accountDetails());
                $user = $accountUser->user;
                //dd($user);
                $dataMail = [
                        'subjectMail'    => 'New Project Assign To You',
                        'bodyMail'       => 'Assign The Project '.$project->name.' To '.$user->name,
                        'action'         => route("projectmanagement.admin.projects.show", $project->id)
                ];

                $dataNotification = [
                        'message'       => 'Assign The Project : '.$project->name.' To '.$user->name,
                        'route_path'    => 'admin/projectmanagement/projects',
                ];

                $user->notify(new ProjectManagementNotification($project,$user,$dataMail,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));
            }

            setActivity('project',$project->id,'Update Assign to ','تعديل القائمين على مشروع ',$project->name_en,$project->name_ar);


            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function update_note(Request $request)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $project = Project::findOrFail($request->project_id);
            //$project->notes = $request->notes;
            $project->update($request->all());

            // Notify User
            foreach ($project->accountDetails as $accountUser)
            {
    //            dd($project->accountDetails());
                $user = $accountUser->user;
                //dd($user);
                $dataMail = [
                    'subjectMail'    => 'Update Project '.$project->name,
                    'bodyMail'       => 'Update Note Of Project '.$project->name,
                    'action'         => route("projectmanagement.admin.projects.show", $project->id)
                ];

                $dataNotification = [
                    'message'       => 'Update Note Of Project : '.$project->name,
                    'route_path'    => 'admin/projectmanagement/projects',
                ];

                $user->notify(new ProjectManagementNotification($project,$user,$dataMail,$dataNotification));
                $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
                event(new NewNotification($userNotify));
            }

            setActivity('project',$project->id,'Update Note','تعديل الملاحظات',$project->name_en,$project->name_ar);

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }

        return redirect()->back();
    }

    public function update_project_timer($project_id)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));



        // check if user can access this project or not
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($project_id,$projects->toArray())){
            try {
                // Begin a transaction
                DB::beginTransaction();

                $user_id = auth()->user()->id;
                $projectTimer = TimeSheet::where('module','=','project')->where('module_field_id',$project_id)->where('user_id',$user_id)->where('timer_status','on')->first();

                if (!$projectTimer)
                {
                    $Timer = [
                        'user_id'       => $user_id,
                        'module'            => 'project',
                        'module_field_id'    => $project_id,
                        'timer_status'  => 'on',
                        'start_time'    => time(),
                    ];

                    $projectTimer = TimeSheet::create($Timer);

                }else{

                    $projectTimer->update(['timer_status' => 'off','end_time' => time()]);
                }

                //setActivity('project',$project_id,'Timer '.ucfirst($projectTimer->timer_status),$projectTimer->project->name);
                $timer_status = 'مغلق';
                if($projectTimer->timer_status = 'on'){

                    $timer_status = 'مفتوح';

                }

                setActivity('project',$project_id,'Timer '.ucfirst($projectTimer->timer_status),'المؤقت ' .$timer_status,$projectTimer->project->name_en,$projectTimer->project->name_ar);

                // Commit the transaction
                DB::commit();

            }catch(\Exception $e){
                // An error occured; cancel the transaction...
                DB::rollback();

                // and throw the error again.
                throw $e;
            }

            return redirect()->back();
        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function project_clone($project_id)
    {

        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this project or not
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');
        if (in_array($project_id,$projects->toArray())){

            // get project by id
            $project  = Project::findOrFail($project_id);

            $newproject = $project->cloneProject();

            return redirect()->route('projectmanagement.admin.projects.show',$newproject->id);

        }
        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

    public function forceDelete(Request $request,$id)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
        //dd($request->all(),$id);
        try {
            // Begin a transaction
            DB::beginTransaction();

            $action = $request->action;

            if ($action == 'force_delete') {

                $project = Project::onlyTrashed()->where('id', $id)->first();

                $this->forceDeleteProject($project);

            } else if ($action == 'restore') {
                Project::onlyTrashed()->where('id', $id)->restore();
                $project = Project::findOrFail($id);

                setActivity('project',$project->id,'Restore Project Details ','إسترجاع المشروع من الحذف',$project->name_en,$project->name_ar);
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

    public function project_pdf($project_id)
    {

        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        // check if user can access this project or not
        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($project_id,$projects->toArray())){

            $project = Project::findOrFail($project_id);


            $project->load('client','department','TimeSheetOn','TimeSheet');

            $total_expense = $project->transactions->where('type' , 'Expense')->sum('amount');
            $billable_expense = $project->transactions->where(array('type' => 'Expense', 'billable' => 'Yes'))->sum('amount');
            $not_billable_expense = $project->transactions->where(array('type' => 'Expense', 'billable' => 'No'))->sum('amount');

            $all_expense_info =  $project->transactions->where('type', 'Expense');

            $paid_expense = 0;
            foreach ($all_expense_info as $v_expenses){
                if ($v_expenses->invoices_id != 0) {
                    $paid_expense += Invoice::get_invoice_paid_amount($v_expenses->invoices_id);
                }
            }
 
            $title = $project->name . '-project.pdf';
            $compact = [
                'project'   => $project,
                'total_expense' => $total_expense,
                'billable_expense'  => $billable_expense,
                'not_billable_expense'  => $not_billable_expense,
                'paid_expense'  => $paid_expense
            ];

            $view = 'projectmanagement::admin.projects.project_pdf';
            $this->download_pdf($view,$compact,$title);
            //$this->stream_pdf($view,$compact,$title);

//            $pdf = MPDF::loadView( $html,compact($compact));
//            return $pdf->download($title);

        }

        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));

    }

//    public function project_pdf($project_id)
//    {
//
//        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
//
//        // check if user can access this project or not
//        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id)->pluck('id');
//
//        if (in_array($project_id,$projects->toArray())){
//
//                $project = Project::findOrFail($project_id);
//
//
//            $project->load('client','department','TimeSheetOn','TimeSheet');
//
//            $total_expense = $project->transactions->where('type' , 'Expense')->sum('amount');
//            $billable_expense = $project->transactions->where(array('type' => 'Expense', 'billable' => 'Yes'))->sum('amount');
//            $not_billable_expense = $project->transactions->where(array('type' => 'Expense', 'billable' => 'No'))->sum('amount');
//
//            $all_expense_info =  $project->transactions->where('type', 'Expense');
//
//            $paid_expense = 0;
//            foreach ($all_expense_info as $v_expenses){
//                if ($v_expenses->invoices_id != 0) {
//                    $paid_expense += Invoice::get_invoice_paid_amount($v_expenses->invoices_id);
//                }
//            }
//
//
//           //return view('projectmanagement::admin.projects.project_pdf',compact('project','total_expense','billable_expense','not_billable_expense','paid_expense'));
//
//            //view()->share('project',$project);
//
//            $pdf = PDF::loadView('projectmanagement::admin.projects.project_pdf',compact('project','total_expense','billable_expense','not_billable_expense','paid_expense'));
//    //        $pdf = PDF::loadView('projectmanagement::admin.projects.project_pdf',[
//    //            'project' => $project
//    //        ]);
//            //$pdf->SetDirectionality('rtl');
//
//            return $pdf->download('project.pdf');
//        }
//
//        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
//
//
//    }

    public function project_report()
    {
        abort_if(Gate::denies('project_report_access'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

//        $user = User::findOrFail(auth()->user()->id);
//        if ($user->hasrole(['Admin','Super Admin']))
//        {
            $projects = Project::all();

            return view('projectmanagement::admin.projects.project_report', compact('projects'));

//        }
//
//        return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
    }
}
