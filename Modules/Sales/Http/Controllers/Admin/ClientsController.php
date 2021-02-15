<?php

namespace Modules\Sales\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Sales\Http\Requests\Destroy\MassDestroyClientRequest;
use Modules\Sales\Http\Requests\Store\StoreClientRequest;
use Modules\Sales\Entities\UpdateClientRequest;
use Modules\HR\Entities\AccountDetail;
use Modules\Sales\Entities\Client;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Language;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Modules\MaterialsSuppliers\Entities\CustomerGroup;
use Spatie\Permission\Models\Role;
class ClientsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all();

        $account_details = AccountDetail::get();

        return view('sales::admin.clients.index', compact('clients', 'account_details'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $currencies = Currency::all();
        $countries  = Country::all();
        $languages  = Language::all();
        $customerGroups = CustomerGroup::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $statuses = AccountDetail::all()->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('sales::admin.clients.create', compact('statuses','currencies','countries','languages','customerGroups'));
    }

    public function store(StoreClientRequest $request)
    {


        $client = Client::create($request->all());
         $user = User::create([
             'name'=>$request->username,
             'username'=>$request->username,
             'email'=>$request->email,
             'password'=>$request->password,

         ]);
         $role=Role::where('name','User')->pluck('id');
         if(!empty($role)){
             $user->syncRoles($role);
          };
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $client->id]);
        }

        return redirect()->route('sales.admin.clients.index');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = AccountDetail::all()->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $client->load('status');

        return view('sales::admin.clients.edit', compact('statuses', 'client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('sales.admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $client->load('status', 'clientProjects');

        return view('sales::admin.clients.show', compact('client'));
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
