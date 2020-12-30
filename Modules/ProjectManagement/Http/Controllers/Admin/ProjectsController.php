<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\ProjectSetting;
use App\Models\User;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Department;
use Modules\ProjectManagement\Entities\ProjectSpecification;
use Modules\ProjectManagement\Http\Requests\MassDestroyProjectRequest;
use Modules\ProjectManagement\Http\Requests\StoreProjectRequest;
use Modules\ProjectManagement\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Permission;
use Modules\ProjectManagement\Entities\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = auth()->user()->getUserProjectsByUserID(auth()->user()->id);
        $clients = Client::get();

        return view('projectmanagement::admin.projects.index', compact('projects', 'clients'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        //$project_settings = ProjectSetting::all();

        $departments = Department::all();

        return view('projectmanagement::admin.projects.create', compact('clients', 'permissions','departments'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('client','department');

        $departments = Department::all();

        return view('projectmanagement::admin.projects.edit', compact('clients', 'project','departments'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {

        if(!$request->calculate_progress){
            $request['calculate_progress'] = null;
        }

        if ($project->department_id != $request->department_id){
            $project->accountDetails()->detach();
        }

        $project->update($request->all());

        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('client','department');

        return view('projectmanagement::admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$project = Project::where('id',$id)->with('accountDetails.user.permissions')->first();

        // dd($project->deleted_at);
        if($project->deleted_at == 0){
            $project->update(['deleted_at' => 1]);
        }else{
            $project->accountDetails()->detach();
            $project->delete();
        }
        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        $ids = request('ids');

        foreach ($ids as $id){
            $project = Project::where('id',$id)->first();
            $project->accountDetails()->detach();
        }

        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getAssignTo($id){

        abort_if(Gate::denies('project_assign_to'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $project = Project::findOrFail($id);
        //$project = Project::where('id',$id)->with('department','accountDetails')->first();
        $department = $project->department()->first();

        if (!$department){
            abort(404,"this project don't have Department ");
        }
        return view('projectmanagement::admin.projects.assignto',compact('project','department'));
    }

    public function storeAssignTo(Request $request){

        $project = Project::where('id',$request->project_id)->first();

        $project->accountDetails()->sync($request->accounts);
        //$project->accountDetails()->syncWithoutDetaching($request->accounts);

        // set permission to users
        $accounts = AccountDetail::whereIn('id',$request->accounts)->with('user.department')->get();

        $project_permissions_head_names = ['project_management_access','project_access','project_create', 'project_show','project_edit','project_assign_to'];
        $project_permissions_notToMember_names = ['project_create','project_edit','project_assign_to'];
        $project_permissions_toMember_names = ['project_management_access','project_access', 'project_show'];

        $project_permissions_head = $this->getPermissionID($project_permissions_head_names);
        $project_permissions_notToMember = $this->getPermissionID($project_permissions_notToMember_names);
        $project_permissions_toMember = $this->getPermissionID($project_permissions_toMember_names);

        foreach ($accounts as $account){

            foreach ($account->user->permissions as $permission){

                if (in_array($permission->name,$project_permissions_notToMember_names)){
                    $account->user->permissions()->detach($project_permissions_notToMember);
                }
            }
            $account->user->permissions()->syncWithoutDetaching($project_permissions_toMember);

            foreach ($account->user->department as $department){
                if ($department->department_name == $project->department->department_name){
                    $account->user->permissions()->syncWithoutDetaching($project_permissions_head);


                    break;
                }
            }
        }
        return redirect()->route('projectmanagement.admin.projects.index');
    }

    public function getPermissionID($permissions){
        $permissions_id =[];
        foreach ($permissions as $permission_name){

            $permission = Permission::where('name',$permission_name)->first();
            array_push($permissions_id,$permission->id);
        }
        return $permissions_id;
    }

}
