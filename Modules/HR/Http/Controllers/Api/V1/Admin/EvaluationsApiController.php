<?php

namespace Modules\HR\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Modules\HR\Http\Controllers\Controller;

use Gate;
use Illuminate\Support\Facades\DB;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Evaluation;
use Modules\HR\Entities\RatingEvaluation;
use Modules\HR\Http\Requests\Store\StoreEvaluationRequest;
use Symfony\Component\HttpFoundation\Response;

class EvaluationsApiController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return response()->json([
            'data' => RatingEvaluation::all(),
        ]);
    }

    public function evaluationList()
    {
        abort_if(Gate::denies('evaluation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = Evaluation::searchPaginateOrder();

        $model->each(function($item) {
            unset($item->created_at);
            unset($item->updated_at);
            $item->user_id = AccountDetail::where('user_id', $item->user_id)->select('fullname')->first() ? 
                AccountDetail::where('user_id', $item->user_id)->select('fullname')->first()->fullname : '';

            $item->manager_id = (AccountDetail::where('user_id', $item->manager_id)->first() ?
                AccountDetail::where('user_id', $item->manager_id)->select('fullname')->first()->fullname :
                User::findOrFail($item->manager_id)->name);

            return $item;
        });

        $columns    = Evaluation::$columns;
        $searchable = Evaluation::$searchable;

        // $constructDataExport = (new DepartmentExportServices())->dataExportedConstruct($model);

        return response()->json([
            'model'   => $model,
            'columns' => $columns,
            'searchable' => $searchable,
            // 'dataExport' => $constructDataExport
            'dataExport' => ''
        ]);
    }

    public function store(StoreEvaluationRequest $request)
    {

        DB::beginTransaction();

        try {
            if(gettype($request->data) == 'array' && !empty($request->data)){

                $evaluation = Evaluation::create([
                    'user_id' => $request->user_id,
                    'manager_id' => $request->auth,
                    'type'    => $request->type ? 'manager' : 'employee',
                    'period'  => $request->period,
                    'comment' => $request->comment,
                    'goal'    => $request->goal,
                    'avg_rate' => $request->avg_rate,
                    'date'     => date('d-m-Y')
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
                DB::commit();
            }

        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }

        return response(Response::HTTP_CREATED);
    }

    public function destroy(Evaluation $evaluation)
    {
        abort_if(Gate::denies('evaluation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evaluation->ratingEvaluations()->detach();
        $evaluation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
