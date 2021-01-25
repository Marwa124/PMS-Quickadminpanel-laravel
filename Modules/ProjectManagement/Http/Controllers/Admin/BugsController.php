<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Notifications\ProjectManagementNotification;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Entities\Bug;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Modules\ProjectManagement\Http\Requests\MassDestroyBugRequest;
use Modules\ProjectManagement\Http\Requests\StoreBugRequest;
use Modules\ProjectManagement\Http\Requests\UpdateBugRequest;
use Gate;
use Illuminate\Http\Request;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\Task;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BugsController extends Controller
{
    use MediaUploadingTrait,ProjectManagementHelperTrait;

    public function __construct()
    {
        $this->middleware('AllowAccessShowAndEditPages:Bug',['only' => ['show','edit','getAssignTo']]);
    }

    public function index()
    {
        abort_if(Gate::denies('bug_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $projects = Project::get();

        $tasks = Task::get();

        if (request()->segment(count(request()->segments())) == 'trashed'){

            abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $trashed = true;

            $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id,$trashed);

            return view('projectmanagement::admin.bugs.index', compact('bugs','trashed', 'projects', 'tasks'));
        }


        $trashed = false;

        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id,$trashed);

        return view('projectmanagement::admin.bugs.index', compact('bugs','trashed', 'projects', 'tasks'));
    }

    public function create($id =null)
    {
        // $id refer to task_id in case and refer to project id in anther case depend on route

        abort_if(Gate::denies('bug_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id');

        $tasks = Task::with('project')->get();

        $project    = null;
        $task       = null;

        if (request()->segment(count(request()->segments())-1) == 'project-bug')
        {
            $project = Project::findOrFail($id);
        }

        if (request()->segment(count(request()->segments())-1) == 'task-bug')
        {
            $task = Task::findOrFail($id);
        }

        return view('projectmanagement::admin.bugs.create', compact('projects','tasks','project','task'));
    }

    public function store(StoreBugRequest $request)
    {
        $request['issue_no'] = 'pms'.substr(time(),-8);           //pms + time function to be sure this num is unique
        $request['reporter'] = auth()->user()->id;

        $bug = Bug::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bug->id]);
        }

        setActivity('bug',$bug->id,'New Bug Added',$bug->name);


        return redirect()->route('projectmanagement.admin.bugs.index');
    }

    public function edit(Bug $bug)
    {
        abort_if(Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($bug->id,$bugs->toArray()))
        {

            $projects = Project::all()->pluck('name', 'id');

            $tasks = Task::with('project')->get();

            $bug->load('project','task');

            return view('projectmanagement::admin.bugs.edit', compact('projects','tasks','bug'));
        }

        abort(Response::HTTP_FORBIDDEN, '403 Forbidden This Page Not Allow To You');

    }

    public function update(UpdateBugRequest $request, Bug $bug)
    {

        $bug->update($request->all());

        // Notify User
        foreach ($bug->accountDetails as $accountUser)
        {
            $user = $accountUser->user;
            $dataMail = [
                'subjectMail'    => 'Update Bug '.$bug->name,
                'bodyMail'       => 'Update The Bug '.$bug->name,
                'action'         => route("projectmanagement.admin.bugs.show", $bug->id)
            ];

            $dataNotification = [
                'message'       => 'Update The Bug : '.$bug->name,
                'route_path'    => 'admin/projectmanagement/bugs',
            ];

            $user->notify(new ProjectManagementNotification($bug,$user,$dataMail,$dataNotification));
            $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
            event(new NewNotification($userNotify));
        }

        setActivity('bug',$bug->id,'Update Bug',$bug->status);

        return redirect()->route('projectmanagement.admin.bugs.index');

    }

    public function show(Bug $bug)
    {
        abort_if(Gate::denies('bug_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bugs = auth()->user()->getUserBugsByUserID(auth()->user()->id)->pluck('id');

        if (in_array($bug->id,$bugs->toArray()))
        {

            $bug->load('project', 'task');

            return view('projectmanagement::admin.bugs.show', compact('bug'));
        }

        abort(Response::HTTP_FORBIDDEN, '403 Forbidden This Page Not Allow To You');

    }

    public function destroy(Bug $bug)
    {
        abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bug->delete();

        setActivity('bug',$bug->id,'Delete Bug',$bug->name);

        return back();
    }

    public function massDestroy(MassDestroyBugRequest $request)
    {
        //Bug::whereIn('id', request('ids'))->delete();

        $ids = request('ids');

        foreach ($ids as $id){
            $bug = Bug::where('id',$id)->first();

            $bug->delete();

            //$project->accountDetails()->detach();
            setActivity('bug',$bug->id,'Delete Bug',$bug->name);
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bug_create') && Gate::denies('bug_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Bug();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id)
    {

        abort_if(Gate::denies('bug_assign_to'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bug = Bug::findOrFail($id);
        $department = $bug->project->department;

        if (!$department){
            abort(404,"this project don't have department ");
        }

        return view('projectmanagement::admin.bugs.assignto',compact('bug','department'));
    }

    public function storeAssignTo(Request $request)
    {
        $bug = Bug::findOrFail($request->bug_id);
        if ($request->accounts){


            $bug->accountDetails()->sync($request->accounts);
            // set permission to users
            $accounts = AccountDetail::whereIn('id',$request->accounts)->with('user.department')->get();

            $bug_permissions_head_names = ['project_management_access','bug_access','bug_create', 'bug_show','bug_edit','bug_assign_to'];
            $bug_permissions_notToMember_names = ['bug_create','bug_assign_to'];
//            $bug_permissions_head_names = ['project_management_access','bug_access','bug_create', 'bug_show','bug_edit'];
//            $bug_permissions_notToMember_names = ['bug_create'];
            $bug_permissions_toMember_names = ['project_management_access','bug_access','bug_show','bug_edit'];

            $bug_permissions_head = $this->getPermissionID($bug_permissions_head_names);
            $bug_permissions_notToMember = $this->getPermissionID($bug_permissions_notToMember_names);
            $bug_permissions_toMember = $this->getPermissionID($bug_permissions_toMember_names);

            foreach ($accounts as $account){

                foreach ($account->user->permissions as $permission){

                    if (in_array($permission->name,$bug_permissions_notToMember_names)){
                        $account->user->permissions()->detach($bug_permissions_notToMember);
                    }
                }
                $account->user->permissions()->syncWithoutDetaching($bug_permissions_toMember);

                foreach ($account->user->department as $department){
                    if ($department->department_name == $bug->project->department->department_name){
                        $account->user->permissions()->syncWithoutDetaching($bug_permissions_head);

                        break;
                    }
                }
            }
        }else{
            $bug->accountDetails()->detach();
        }

        // Notify User
        foreach ($bug->accountDetails as $accountUser)
        {
            $user = $accountUser->user;
            $dataMail = [
                'subjectMail'    => 'New Bug Assign To You',
                'bodyMail'       => 'Assign The Bug '.$bug->name.' To '.$user->name,
                'action'         => route("projectmanagement.admin.bugs.show", $bug->id)
            ];

            $dataNotification = [
                'message'       => 'Assign The Bug : '.$bug->name.' To '.$user->name,
                'route_path'    => 'admin/projectmanagement/bugs',
            ];

            $user->notify(new ProjectManagementNotification($bug,$user,$dataMail,$dataNotification));
            $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
            event(new NewNotification($userNotify));
        }

        setActivity('bug',$bug->id,'Update Assign to',$bug->name);

        return redirect()->route('projectmanagement.admin.bugs.index');
    }

    public function update_note(Request $request)
    {
        $bug = Bug::findOrFail($request->bug_id);
        //$project->notes = $request->notes;
        $bug->update($request->all());

        // Notify User
        foreach ($bug->accountDetails as $accountUser)
        {
            $user = $accountUser->user;
            $dataMail = [
                'subjectMail'    => 'Update Bug '.$bug->name,
                'bodyMail'       => 'Update Note Of Bug '.$bug->name,
                'action'         => route("projectmanagement.admin.bugs.show", $bug->id)
            ];

            $dataNotification = [
                'message'       => 'Update Note Of Bug : '.$bug->name,
                'route_path'    => 'admin/projectmanagement/bugs',
            ];

            $user->notify(new ProjectManagementNotification($bug,$user,$dataMail,$dataNotification));
            $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
            event(new NewNotification($userNotify));
        }

        setActivity('bug',$bug->id,'Update Note ',$bug->name);

        return redirect()->back();
    }

    public function forceDelete(Request $request,$id)
    {
        //dd($request->all(),$id);
        $action = $request->action;

        if ($action == 'force_delete') {

            $bug = Bug::onlyTrashed()->where('id', $id)->first();

            // force delete bug
            $bug->forceDelete();

        } else if ($action == 'restore') {
            //restore bug
            Bug::onlyTrashed()->where('id', $id)->restore();
            $bug = Bug::findOrFail($id);

            setActivity('bug',$bug->id,'Restore Bug',$bug->name);
        }

        return back();

    }
}
