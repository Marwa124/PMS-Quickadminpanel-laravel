<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReturnStockRequest;
use App\Http\Requests\StoreReturnStockRequest;
use App\Http\Requests\UpdateReturnStockRequest;
use App\Models\Permission;
use App\Models\ReturnStock;
use App\Models\Supplier;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReturnStockController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('return_stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $returnStocks = ReturnStock::all();

        $suppliers = Supplier::get();

        $users = User::get();

        $permissions = Permission::get();

        return view('admin.returnStocks.index', compact('returnStocks', 'suppliers', 'users', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('return_stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.returnStocks.create', compact('suppliers', 'users', 'permissions'));
    }

    public function store(StoreReturnStockRequest $request)
    {
        $returnStock = ReturnStock::create($request->all());
        $returnStock->permissions()->sync($request->input('permissions', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $returnStock->id]);
        }

        return redirect()->route('admin.return-stocks.index');
    }

    public function edit(ReturnStock $returnStock)
    {
        abort_if(Gate::denies('return_stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permissions = Permission::all()->pluck('title', 'id');

        $returnStock->load('supplier', 'user', 'permissions');

        return view('admin.returnStocks.edit', compact('suppliers', 'users', 'permissions', 'returnStock'));
    }

    public function update(UpdateReturnStockRequest $request, ReturnStock $returnStock)
    {
        $returnStock->update($request->all());
        $returnStock->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.return-stocks.index');
    }

    public function show(ReturnStock $returnStock)
    {
        abort_if(Gate::denies('return_stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $returnStock->load('supplier', 'user', 'permissions');

        return view('admin.returnStocks.show', compact('returnStock'));
    }

    public function destroy(ReturnStock $returnStock)
    {
        abort_if(Gate::denies('return_stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $returnStock->delete();

        return back();
    }

    public function massDestroy(MassDestroyReturnStockRequest $request)
    {
        ReturnStock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('return_stock_create') && Gate::denies('return_stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReturnStock();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
