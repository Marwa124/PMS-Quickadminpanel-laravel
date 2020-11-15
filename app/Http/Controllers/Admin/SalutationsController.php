<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalutationRequest;
use App\Http\Requests\StoreSalutationRequest;
use App\Models\Salutation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalutationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salutation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salutations = Salutation::all();

        return view('admin.salutations.index', compact('salutations'));
    }

    public function create()
    {
        abort_if(Gate::denies('salutation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salutations.create');
    }

    public function store(StoreSalutationRequest $request)
    {
        $salutation = Salutation::create($request->all());

        return redirect()->route('admin.salutations.index');
    }

    public function destroy(Salutation $salutation)
    {
        abort_if(Gate::denies('salutation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salutation->delete();

        return back();
    }

    public function massDestroy(MassDestroySalutationRequest $request)
    {
        Salutation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
