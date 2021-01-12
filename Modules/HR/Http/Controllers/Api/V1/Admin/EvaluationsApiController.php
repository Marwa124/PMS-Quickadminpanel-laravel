<?php

namespace Modules\HR\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Modules\HR\Http\Controllers\Controller;

use Modules\HR\Http\Resources\Admin\DepartmentResource;

use Modules\HR\Entities\Department;
use Modules\HR\Http\Requests\Update\UpdateDepartmentRequest;
use Modules\HR\Http\Requests\Store\StoreDepartmentRequest;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\HR\Entities\Designation;
use Modules\HR\Entities\Evaluation;
use Modules\HR\Entities\RatingEvaluation;
use Modules\HR\Http\Controllers\Services\DepartmentExportServices;
use Modules\HR\Http\Requests\Store\StoreEvaluationRequest;
use Symfony\Component\HttpFoundation\Response;

class EvaluationsApiController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response()->json([
            'data' => RatingEvaluation::all(),
        ]);
        // return new DepartmentResource(Department::with(['department_head'])->get());
    }

    public function store(StoreEvaluationRequest $request)
    // public function store(StoreDepartmentRequest $request)
    {
        DB::beginTransaction();
        // dd($request->all());

        try {
            if(gettype($request->data) == 'array' && !empty($request->data)){
                
                $evaluation = Evaluation::create([
                    'user_id' => $request->user_id,
                    'manager_id' => $request->auth,
                    'type'    => $request->type ? 'manager' : 'employee',
                    'period'  => $request->period,
                    'comment' => $request->comment,
                    'goal'    => $request->goal,
                    'avg_rate' => $request->avg_rate
                ]);
                
                foreach ($request->data as $item) {
                    $ratings = RatingEvaluation::where('name', $item['name'])->first();
                    if(!$ratings && $item['name'] != '') {
                        $ratings = RatingEvaluation::create([
                            'name' => $item['name']
                        ]); 
                    }
                    if(isset($item['rate'])){
                        $evaluation->ratingEvaluations()->attach($ratings, [
                            'rate'    => $item['rate'],
                            'comment' => $item['comment'] ?? ''
                        ]);
                    }
                }

    
                // $user->activities()->attach($activityIdOrModel, ['product_id' => $productId]);
                DB::commit();
            }
           
        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }

        return response(Response::HTTP_CREATED);

    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::where('department_id', $department->id)->get();

        return response()->json([
            'department' => new DepartmentResource($department->load(['department_head_account'])),
            'designations' => $designations,

            'permissions' => $department->getPermissionNames(),
        ]);

        // return new DepartmentResource($department->load(['department_head']));

    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->only(['department_name']));

        if ($request->user_head_department) {
            $department->update(['department_head_id' => $request->user_head_department['user_id']]);
        }
        if ($request->designations) {
            $designations = Designation::where('department_id', $department->id)->get();
            foreach ($request->designations as $key => $designation) {
                $designation = Designation::find($designation['id']);
                foreach ($designations as $value) {
                    if ($value->id != $designation->id) {
                        $value->update(['department_id' => 0]);
                    }
                }
                $designation->update(['department_id' => $department->id]);
            }
        }

        return (new DepartmentResource($department))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function setDepartmentPermissions(Request $request, $id = null)
    {
        if ($id) {
            $department = Department::find($id);
            $department->syncPermissions(request()->permissions);

        }
        // dd();
        // dd($request->all());
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
