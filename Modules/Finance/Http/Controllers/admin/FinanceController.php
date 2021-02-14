<?php

namespace Modules\Finance\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\HR\Entities\Account;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Symfony\Component\HttpFoundation\Response;
use Gate;


class FinanceController extends Controller
{
    use ProjectManagementHelperTrait;

    public function balance_sheet()
    {
        $bank_accounts = Account::all();
        $total_balance = Account::sum('balance');
        return view('finance::admin.finance.balance_sheet',compact('bank_accounts','total_balance'));
    }

    public function balance_sheet_pdf()
    {
        //abort_if(Gate::denies('balance_sheet_pdf'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = trans('cruds.finance.balance_sheet') . '.pdf';


        $bank_accounts = Account::all();
        $total_balance = Account::sum('balance');

        $compact = [
            'bank_accounts'     => $bank_accounts,
            'total_balance' => $total_balance,

        ];

        $view = 'finance::admin.finance.balance_sheet_pdf';

        $this->stream_pdf($view,$compact,$title);
        //$this->download_pdf($view,$compact,$title);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('finance::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('finance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('finance::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
