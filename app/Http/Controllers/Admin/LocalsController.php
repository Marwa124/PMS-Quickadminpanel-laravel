<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLocalRequest;
use App\Http\Requests\StoreLocalRequest;
use App\Models\Local;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('local_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locals = Local::all();

        return view('admin.locals.index', compact('locals'));
    }

    public function create()
    {
        abort_if(Gate::denies('local_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locals.create');
    }

    public function store(StoreLocalRequest $request)
    {
        $local = Local::create($request->all());

        return redirect()->route('admin.locals.index');
    }

    public function destroy(Local $local)
    {
        abort_if(Gate::denies('local_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $local->delete();

        return back();
    }

    public function massDestroy(MassDestroyLocalRequest $request)
    {
        Local::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
