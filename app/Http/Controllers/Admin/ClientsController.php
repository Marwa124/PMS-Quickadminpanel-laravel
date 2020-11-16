<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Modules\HR\Entities\AccountDetail;
use App\Models\Client;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all();

        $account_details = AccountDetail::get();

        return view('admin.clients.index', compact('clients', 'account_details'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = AccountDetail::all()->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clients.create', compact('statuses'));
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $client->id]);
        }

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = AccountDetail::all()->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $client->load('status');

        return view('admin.clients.edit', compact('statuses', 'client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('status', 'clientProjects');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        Client::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('client_create') && Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Client();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
