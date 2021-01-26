<?php

namespace Modules\ProjectManagement\Http\Middleware;

use Closure;
use Doctrine\DBAL\Driver\AbstractDB2Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\ProjectManagement\Entities\Bug;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\Task;
use Modules\HR\Entities\Department;


class AllowAccessShowAndEditPagesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$model = null)
    {
        $user = auth()->user();
        $departments = Department::where('department_head_id',$user->id)->get();

        if ($user->hasrole(['Admin','Super Admin']) || $departments->count() > 0) {
            return $next($request);
        }
        //dd(is_numeric(request()->segment(count(request()->segments())) ));
        if (is_numeric(request()->segment(count(request()->segments())))){

            $id = request()->segment(count(request()->segments()));

        }else{

            $id = request()->segment(count(request()->segments())-1);

        }
        //$id = request()->segment(count(request()->segments()));

        $provider = '';

        if ($model == 'Project'){
            $provider = Project::findOrFail($id);
        }
        if ($model == 'Milestone'){
            $provider = Milestone::findOrFail($id);
        }
        if ($model == 'Task'){
            $provider = Task::findOrFail($id);
        }
        if ($model == 'Bug'){
            $provider = Bug::findOrFail($id);
        }
        if ($provider){
            //dd('provider found');
            foreach ($provider->accountDetails as $account){
                //dd($account->user->id == $user->id ,$account->user ,$user);
                if ($account->user->id == $user->id){
                    return $next($request);
                }
            }
        }

        abort(403, 'Un Allow Access This Page.');
        //dd($provider->accountDetails);
        //dd($request->all(),request()->url(),request()->segment(count(request()->segments())),request()->segment(3),$model,$milestone->accountDetails->user());
        //return $next($request);
    }
}
