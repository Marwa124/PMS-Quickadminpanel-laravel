<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\HR\Http\Requests\Destroy\MassDestroyAccountRequest;
use Modules\HR\Http\Requests\Store\StoreAccountRequest;
use Modules\HR\Http\Requests\Update\UpdateAccountRequest;
use Modules\HR\Entities\Account;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all();

        $permissions = Permission::get();

        return view('hr::admin.accounts.index', compact('accounts', 'permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('hr::admin.accounts.create', compact('permissions'));
    }

    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());
        $account->permissions()->sync($request->input('permissions', []));

        return redirect()->route('hr.admin.accounts.index');
    }

    public function edit(Account $account)
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $account->load('permissions');

        return view('hr::admin.accounts.edit', compact('permissions', 'account'));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());
        $account->permissions()->sync($request->input('permissions', []));

        return redirect()->route('hr.admin.accounts.index');
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->load('permissions');

        return view('hr::admin.accounts.show', compact('account'));
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountRequest $request)
    {
        Account::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
