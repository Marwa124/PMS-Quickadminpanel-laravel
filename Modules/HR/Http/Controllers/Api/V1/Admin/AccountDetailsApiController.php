<?php

namespace Modules\HR\Http\Controllers\Api\V1\Admin;

use Modules\HR\Http\Controllers\Controller;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\User;
use Modules\HR\Http\Requests\Update\UpdateAccountDetailRequest;
use Modules\HR\Http\Resources\Admin\AccountDetailResource;
use Modules\HR\Entities\AccountDetail;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Http\Requests\Store\StoreAccountDetailRequest;
use Symfony\Component\HttpFoundation\Response;

class AccountDetailsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('account_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::fetchUnbannedUsers();

        return new AccountDetailResource(User::fetchUnbannedUsers());
        // return new AccountDetailResource(AccountDetail::with(['user', 'designation'])->get());
    }

    public function store(StoreAccountDetailRequest $request)
    {
        $accountDetail = AccountDetail::create($request->all());

        if ($request->input('avatar', false)) {
            $accountDetail->addMedia(storage_path('tmp/uploads/' . $request->input('avatar')))->toMediaCollection('avatar');
        }

        return (new AccountDetailResource($accountDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccountDetail $accountDetail)
    {
        abort_if(Gate::denies('account_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountDetailResource($accountDetail->load(['user', 'designation']));
    }

    public function update(UpdateAccountDetailRequest $request, AccountDetail $accountDetail)
    {
        $accountDetail->update($request->all());

        if ($request->input('avatar', false)) {
            if (!$accountDetail->avatar || $request->input('avatar') !== $accountDetail->avatar->file_name) {
                if ($accountDetail->avatar) {
                    $accountDetail->avatar->delete();
                }

                $accountDetail->addMedia(storage_path('tmp/uploads/' . $request->input('avatar')))->toMediaCollection('avatar');
            }
        } elseif ($accountDetail->avatar) {
            $accountDetail->avatar->delete();
        }

        return (new AccountDetailResource($accountDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccountDetail $accountDetail)
    {
        abort_if(Gate::denies('account_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
