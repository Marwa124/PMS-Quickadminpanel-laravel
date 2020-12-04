<?php

namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Sales\Entities\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Http\Requests\Destroy\MassDestroyTypeRequest;
use Symfony\Component\HttpFoundation\Response;
class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = Type::all();
        return view('sales::admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales::admin.types.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            Type::create($request->all());

            DB::commit();
            return redirect()->route('sales.admin.types.index');

        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('sales::admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $type = Type::findOrFail($id);
            $type->update($request->all());
            DB::commit();
            return redirect()->route('sales.admin.types.index');



        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            Type::where('id', $id)->delete();
            DB::commit();
            return redirect()->route('sales.admin.types.index');


        } catch (\Exception $e) {
            echo 'Process Failed';
        }
    }

        public function massDestroy(MassDestroyTypeRequest $request)
    {
        // dd($request);
        Type::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
