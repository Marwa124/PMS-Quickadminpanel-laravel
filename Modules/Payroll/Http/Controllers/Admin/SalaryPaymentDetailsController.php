<?php

namespace Modules\Payroll\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Payroll\Http\Requests\Destroy\MassDestroySalaryPaymentDetailRequest;
use Modules\Payroll\Http\Requests\Store\StoreSalaryPaymentDetailRequest;
use Modules\Payroll\Entities\SalaryPayment;
use Modules\Payroll\Entities\SalaryPaymentDetail;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\AccountDetail;
use Modules\Payroll\Entities\SalaryTemplate;
use Symfony\Component\HttpFoundation\Response;
use PDF;

class SalaryPaymentDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_payment_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $salaryPaymentDetails = SalaryPaymentDetail::all();
        $userAccounts = AccountDetail::select('user_id', 'designation_id')->orderBy('user_id', 'DESC')->get();

        $users = [];
        foreach ($userAccounts as $key => $value) {
            $userRole = User::where('id', $value->user_id)->where('banned', 0)->first();
            // dump($value->user_id);
            if ($userRole && !$userRole->hasRole('Board Members')) {
                $users[] = User::where('id', $value->user_id)->where('banned', 0)->first()->accountDetail()
                    ->first();
                    // ->select('fullname', 'user_id', 'employment_id', 'joining_date', 'designation_id', 'avatar')->first();
            }
        }
        // dd($users);
        return view('payroll::admin.salaryPaymentDetails.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_payment_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary_payments = SalaryPayment::all()->pluck('payment_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('payroll::admin.salaryPaymentDetails.create', compact('salary_payments'));
    }

    public function store(StoreSalaryPaymentDetailRequest $request)
    {
        $salaryPaymentDetail = SalaryPaymentDetail::create($request->all());

        return redirect()->route('admin.payroll.salary-payment-details.index');
    }

    public function destroy(SalaryPaymentDetail $salaryPaymentDetail)
    {
        abort_if(Gate::denies('salary_payment_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryPaymentDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryPaymentDetailRequest $request)
    {
        SalaryPaymentDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function generatePDF($user_id)
    {
        $detail['detail'] = AccountDetail::where('user_id', $user_id)->first();
        $pdf = PDF::loadView('payroll::admin.salaryPaymentDetails.pdf', $detail);

        return $pdf->download('Salary Details '.$detail['detail']->fullname.'.pdf');
    }

    public function printDetails($user_id)
    {
        $detail = AccountDetail::where('user_id', $user_id)->first();

        return view('payroll::admin.salaryPaymentDetails.print', compact('detail'));
    }
}
