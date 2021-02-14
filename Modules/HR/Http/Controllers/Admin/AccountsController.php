<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Mail\FinanceMail;
use App\Notifications\FinanceNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\HR\Http\Requests\Destroy\MassDestroyAccountRequest;
use Modules\HR\Http\Requests\Store\StoreAccountRequest;
use Modules\HR\Http\Requests\Update\UpdateAccountRequest;
use Modules\HR\Entities\Account;
use Gate;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $accounts = Account::all();

//        $permissions = Permission::get();



        return view('hr::admin.accounts.index', compact('accounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $permissions = Permission::all()->pluck('title', 'id');

        return view('hr::admin.accounts.create');
    }

    public function store(StoreAccountRequest $request)
    {
        try {
            // Begin a transaction
            DB::beginTransaction();

            $account = Account::create($request->all());
//        $account->permissions()->sync($request->input('permissions', []));

            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;
            $message = trans('global.create').' '.trans('cruds.account.title_singular').' '.
                ' <a href="'.route("hr.admin.accounts.show", $account->id).'">'.
                $account->name.'</a> '.trans('cruds.account.fields.balance').' : '.$account->balance ;

            //send mail to CEO of company
            Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')->send(new FinanceMail($email_from, $sender,$message));

            $flashMsg = flash(trans('cruds.messages.create_success'), 'success');

            // Commit the transaction
            DB::commit();
            return redirect()->route('hr.admin.accounts.index')->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.create_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('hr.admin.accounts.index');
    }

    public function edit(Account $account)
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $permissions = Permission::all()->pluck('title', 'id');
//
//        $account->load('permissions');

        return view('hr::admin.accounts.edit', compact( 'account'));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        try {
            // Begin a transaction
            DB::beginTransaction();

            $account->update($request->all());
//        $account->permissions()->sync($request->input('permissions', []));

            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;
            $message = trans('global.edit').' '.trans('cruds.account.fields.balance').' '.trans('cruds.account.title_singular').' '.
                ' <a href="'.route("hr.admin.accounts.show", $account->id).'">'.
                $account->name.'</a> : '.$account->balance ;

            //send mail to CEO of company
            Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')->send(new FinanceMail($email_from, $sender,$message));

            $flashMsg = flash(trans('cruds.messages.update_success'), 'success');

            // Commit the transaction
            DB::commit();
            return redirect()->route('hr.admin.accounts.index')->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.update_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }


//        return redirect()->route('hr.admin.accounts.index');
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $account->load('permissions');

        return view('hr::admin.accounts.show', compact('account'));
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            // Begin a transaction
            DB::beginTransaction();

            $account->delete();
//        $account->permissions()->sync($request->input('permissions', []));

            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;
            $message = trans('global.delete').' '.' '.trans('cruds.account.title_singular').' '.
                $account->name. ' '.trans('cruds.account.fields.balance').' : '.$account->balance ;

            //send mail to CEO of company
            Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')->send(new FinanceMail($email_from, $sender,$message));

            $flashMsg = flash(trans('cruds.messages.delete_success'), 'success');

            // Commit the transaction
            DB::commit();
            return redirect()->route('hr.admin.accounts.index')->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            return redirect()->back()->with(flash(trans('cruds.messages.delete_failed'), 'danger'))->withInput();
            // and throw the error again.
            throw $e;
        }

//        return back();
    }

    public function massDestroy(MassDestroyAccountRequest $request)
    {
//        Account::whereIn('id', request('ids'))->delete();
        try {
            // Begin a transaction
            DB::beginTransaction();

            $ids = request('ids');

            foreach ($ids as $id){
                $account = Account::where('id',$id)->first();

                $account->delete();

                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;
                $message = trans('global.delete').' '.' '.trans('cruds.account.title_singular').' '.
                    $account->name. ' '.trans('cruds.account.fields.balance').' : '.$account->balance ;

                //send mail to CEO of company
                Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')->send(new FinanceMail($email_from, $sender,$message));

                $flashMsg = flash(trans('cruds.messages.delete_success'), 'success');

            }

            // Commit the transaction
            DB::commit();
//            return redirect()->route('hr.admin.accounts.index')->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            // and throw the error again.
            throw $e;
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
