<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\AccountDetail;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        $roles = [];
        foreach($users as $user){
            array_push($roles, $user->getRoleNames()[0] ?? '');
        }

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        \DB::beginTransaction();
        
        try {
            $user = User::create($request->except(['roles']));
    
            $user->syncRoles($request->roles);

            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $user->id]);
            }
            
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            
            return redirect()->route('admin.users.index')->withErrors('Something went wrong');
        }
        
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->except(['roles']));

        $request->roles ? $user->syncRoles($request->roles) : '';

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

