<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Modules\HR\Entities\AccountDetail;
use Modules\ProjectManagement\Http\Requests\MassDestroyMilestoneRequest;
use Modules\ProjectManagement\Http\Requests\StoreMilestoneRequest;
use Modules\ProjectManagement\Http\Requests\UpdateMilestoneRequest;
use Modules\ProjectManagement\Entities\Milestone;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Modules\ProjectManagement\Entities\Project;
use Symfony\Component\HttpFoundation\Response;

class MilestonesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('milestone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$milestones = Milestone::all();
        $milestones = auth()->user()->getUserMilestonesByUserID(auth()->user()->id);


        return view('projectmanagement::admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        abort_if(Gate::denies('milestone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('projectmanagement::admin.milestones.create', compact('projects'));
    }

    public function store(StoreMilestoneRequest $request)
    {
        $milestone = Milestone::create($request->all());
        //dd($milestone);

        return redirect()->route('projectmanagement.admin.milestones.index');
    }

    public function edit(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $milestone->load('accountDetails', 'project');

        return view('projectmanagement::admin.milestones.edit', compact('projects', 'milestone'));
    }

    public function update(UpdateMilestoneRequest $request, Milestone $milestone)
    {
//        dd($request->all());
        $milestone->update($request->all());

        return redirect()->route('projectmanagement.admin.milestones.index');
    }

    public function show(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $milestone->load('accountDetails', 'project');

        return view('projectmanagement::admin.milestones.show', compact('milestone'));
    }

    public function destroy(Milestone $milestone)
    {
        abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $milestone->accountDetails()->detach();
        $milestone->delete();

        return back();
    }

    public function massDestroy(MassDestroyMilestoneRequest $request)
    {
        $ids = request('ids');

        foreach ($ids as $id){
            $milestone = Milestone::where('id',$id)->first();
            $milestone->accountDetails()->detach();
        }

        Milestone::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getAssignTo($id){

        abort_if(Gate::denies('milestone_assign_to'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $milestone = Milestone::findOrFail($id);

        if (!$milestone->project){

            abort(404,"this milestone don't have project ");
        }

        $department = $milestone->project->department;

        //dd($department->departmentDesignations,$milestone->project->accountDetails);

        if (!$department){
            abort(404,"this milestone project don't have Department ");

        }

        //$milestone = Milestone::where('id',$id)->with('project.department','accountDetails')->first();

        return view('projectmanagement::admin.milestones.assignto',compact('milestone','department'));
    }


    public function storeAssignTo(Request $request){
        //dd($request->all());
        $milestone = Milestone::findOrFail($request->milsetone_id);
        //$milestone->accountDetails()->detach();
        $milestone->accountDetails()->sync($request->accounts);

        // set permission to users
        $accounts = AccountDetail::whereIn('id',$request->accounts)->with('user.department')->get();

        $milestone_permissions_head_names = ['project_management_access','milestone_access','milestone_create', 'milestone_show','milestone_edit','milestone_assign_to'];
        $milestone_permissions_notToMember_names = ['milestone_create','milestone_edit','milestone_assign_to'];
        $milestone_permissions_toMember_names = ['project_management_access','milestone_access', 'milestone_show'];

        $milestone_permissions_head = $this->getPermissionID($milestone_permissions_head_names);
        $milestone_permissions_notToMember = $this->getPermissionID($milestone_permissions_notToMember_names);
        $milestone_permissions_toMember = $this->getPermissionID($milestone_permissions_toMember_names);

        foreach ($accounts as $account){

            foreach ($account->user->permissions as $permission){

                if (in_array($permission->name,$milestone_permissions_notToMember_names)){
                    $account->user->permissions()->detach($milestone_permissions_notToMember);
                }
            }
            $account->user->permissions()->syncWithoutDetaching($milestone_permissions_toMember);

            foreach ($account->user->department as $department){
                if ($department->department_name == $milestone->project->department->department_name){
                    $account->user->permissions()->syncWithoutDetaching($milestone_permissions_head);

                    break;
                }
            }
        }
        return redirect()->route('projectmanagement.admin.milestones.index');
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
