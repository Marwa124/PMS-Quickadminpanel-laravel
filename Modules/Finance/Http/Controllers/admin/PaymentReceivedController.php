<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Events\NewNotification;
use App\Mail\FinanceMail;
use App\Models\Invoice;
use App\Models\User;
use App\Notifications\FinanceNotification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use Illuminate\Support\Facades\Mail;
use Modules\HR\Entities\Account;
use App\Models\Transaction;
use Modules\Payroll\Entities\Payment;
use Modules\Payroll\Entities\PaymentMethod;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\DB;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;



class PaymentReceivedController extends Controller
{

    use ProjectManagementHelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('payment_received_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payments = Payment::all();
        $invoices = Invoice::all();
        //        dd($invoices);
        $invoices = Invoice::when($invoices, function ($query, $invoices) {
            foreach ($invoices as $invoice) {
                //            dd($invoice->get_invoice_paid_amount($invoice->id),$invoice);
                $amount = DB::table('payments')
                    //                    ->where('invoices_id', $query->first()->id)
                    ->where('invoice_id', $invoice->id)
                    ->where('deleted_at', '=', null)
                    ->sum('amount');

                $query->where('total_amount', '>', $amount);
                //                dd($invoice->get_invoice_paid_amount($invoice->id),$invoice,$amount);
            }
            return $query;
            //                dd($query);
        })
            ->whereNotIn('status', ['waiting_approval', 'cancelled', 'rejected'])
            ->get();
        //            dd($invoices);
        return view('finance::admin.paymentReceived.index', compact('payments', 'invoices'));
    }

    public function create_by_invoice(Request $request)
    {

        //dd($request->all());
        $invoice_id         = $request->invoice_id;
        return redirect()->route('finance.admin.payment_received.create', $invoice_id);
        //        $transaction_id     = 'trans-'.substr(time(),-6);           //trans + time function to be sure this num is unique
        //        $accounts           = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //        $transactions       = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //        $payment_methods    = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //        return view('finance::admin.paymentReceived.create',compact('accounts','transactions','payment_methods','invoice_id','transaction_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //        abort_if(Gate::denies('payment_received_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $invoice = Invoice::whereNotIn('status', ['waiting_approval', 'cancelled', 'rejected'])->findOrFail($id);
        //        $invoice = Invoice::whereNotIn('status',['waiting_approval','cancelled','rejected'])->where('id',$id)->get();

        $invoice_id         = $id;
        $transaction_id     = substr(time(), -6);           //trans + time function to be sure this num is unique
        $accounts           = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $payment_methods    = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //        $transactions       = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //        dd($accounts,$transactions);

        return view('finance::admin.paymentReceived.create', compact('accounts', 'payment_methods', 'invoice_id', 'transaction_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Begin a transaction
            DB::beginTransaction();

            //  validate form data
            $validator = Validator::make($request->all(), [

                'transaction_id'    => ['required', 'numeric', 'unique:payments,transaction_id'],
                'invoice_id'        => ['required', 'exists:invoices,id'],
                //            'payer_email'       => ['required', 'email'],
                'payment_method'    => ['required', 'exists:payment_methods,id'],
                'amount'            => ['required', 'numeric'],
                'notes'             => ['nullable', 'min:3', 'max:1000'],
                'payment_date'      => ['required', 'date_format:' . config('panel.date_format')],
                'account_id'        => ['required', 'exists:accounts,id'],

            ], []);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $invoice = Invoice::findOrFail($request->invoice_id);
            $amounts = $this->total_amount($invoice->id);
            $amounts += $request->amount;

            if (($invoice->total_amount - $amounts) < 0) {
                $flashMsg = flash(trans('cruds.messages.payment_amounts_more_invoice_amount'), 'danger');

                return redirect()->back()->with($flashMsg)->withInput();
            }

            //store data
            $payment = Payment::create([
                'transaction_id'    => $request->transaction_id,
                'invoice_id'        => $request->invoice_id,
                'payment_method'    => $request->payment_method,
                'amount'            => $request->amount,
                'notes'             => $request->notes,
                'payment_date'      => $request->payment_date,
                'account_id'        => $request->account_id,
                'paid_by'           => auth()->user()->id,
            ]);

            // update bank account balance
            $account = Account::findOrFail($payment->account_id);
            $balance = $account->balance + $payment->amount;

            $account->update([
                'balance' => $balance
            ]);


//            Transaction::create([
//                'date'          => $request->payment_date,
//                'account_id'    => $request->account_id,
//                'type'          => 'deposit',
//                'name'          => $request->transaction_id,
//                'amount'        => $request->amount,
//                'credit'        => $request->amount,
//                'total_balance' => $account->balance,
//                'added_by'      => auth()->user()->id,
//                'payment_id'    => $payment->id,
//                'invoice_id'    => $request->invoice_id
//            ]);

            // Notify User

            $user = $invoice->client;

            if (!$user->email){
                $flashMsg = flash(trans('cruds.messages.client_not_have_email'), 'danger');
                return redirect()->back()->with($flashMsg);
            }
            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;

            //send mail to client

            $template = templates('payment_email');
            $message = str_replace("{PAID_AMOUNT}",$payment->amount,$template->template_body);
            $message = str_replace("{INVOICE_CURRENCY}",settings('default_currency'),$message);
            $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

//            Mail::mailer('smtp')->to($user->email)->send(new FinanceMail($email_from, $sender,$message));
            Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')
                ->cc('mabrouk@onetecgroup.com','sara@onetecgroup.com')
                ->bcc('marwa@onetecgroup.com')
                ->send(new FinanceMail($email_from, $sender,$message));

            //send mail to CEO of company

            if(User::find(auth()->user()->id)->accountDetail()->first())
            {
                $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
            }else{
                $userName = User::find(auth()->user()->id)->name;
            }

//            $message = $userName.' '.trans('global.edit').' '.trans('cruds.account.title_singular').' '.
//            $account->name. ' '.trans('cruds.account.fields.balance').' : '.$account->balance ;

//            $template = templates('payment_email');
//            $message = str_replace("{PAID_AMOUNT}",$payment->amount,$template->template_body);
//            $message = str_replace("{INVOICE_CURRENCY}",settings('default_currency'),$message);
//            $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

//            Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')
//                ->cc('mabrouk@onetecgroup.com','sara@onetecgroup.com')
//                ->bcc('marwa@onetecgroup.com')
//                ->send(new FinanceMail($email_from, $sender,$message));

            //send mail to CEO of company
//            Mail::mailer('smtp')->to('CEO')->send(new FinanceMail($email_from, $sender,$message));

            $flashMsg = flash(trans('cruds.messages.create_success'), 'success');

            // Commit the transaction
            DB::commit();
            return redirect()->route("finance.admin.payment_received.index")->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            $flashMsg = flash(trans('cruds.messages.create_failed'), 'danger');
            return redirect()->back()->with($flashMsg)->withInput();
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('finance.admin.payment_received.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        abort_if(Gate::denies('payment_received_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment = Payment::findOrFail($id);


        $amounts            = $this->total_amount($payment->invoice_id);


        return view('finance::admin.paymentReceived.SHOW', compact('payment', 'amounts'));
        //        return view('finance::admin.paymentReceived.SHOW',compact('payment','accounts','payment_methods','amounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        abort_if(Gate::denies('payment_received_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment = Payment::findOrFail($id);

        //$invoice_id         = $id;
        //$transaction_id     = substr(time(),-6);           //trans + time function to be sure this num is unique
        $accounts           = Account::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $payment_methods    = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $amounts            = $this->total_amount($payment->invoice_id);
        //        $transactions       = Transaction::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        //dd($payment->invoice);

        return view('finance::admin.paymentReceived.edit', compact('payment', 'accounts', 'payment_methods', 'amounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all(), $id);
        try {
            // Begin a transaction
            DB::beginTransaction();

            //  validate form data
            $validator = Validator::make($request->all(), [

                //                'transaction_id'    => ['required','numeric','unique:payments,transaction_id'],
                //                'invoice_id'        => ['required', 'exists:invoices,id'],
                //            'payer_email'       => ['required', 'email'],
                'payment_method'    => ['required', 'exists:payment_methods,id'],
                'amount'            => ['required', 'numeric'],
                'payment_date'      => ['required', 'date_format:' . config('panel.date_format')],
                'notes'             => ['nullable', 'min:3', 'max:1000'],
                //                'account_id'        => ['required', 'exists:accounts,id'],

            ], []);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //update data
            $payment = Payment::findOrFail($id);

            $invoice = Invoice::findOrFail($payment->invoice_id);
            $amounts = $this->total_amount($invoice->id);
            $amounts -= $payment->amount;
            $amounts += $request->amount;

            if (($invoice->total_amount - $amounts) < 0) {
                $flashMsg = flash(trans('cruds.messages.payment_amounts_more_invoice_amount'), 'danger');

                return redirect()->back()->with($flashMsg)->withInput();
            }

            // update bank account balance
            $account = Account::findOrFail($payment->account_id);
            $balance = $account->balance - $payment->amount;
            $balance += $request->amount;

            $account->update([
                'balance' => $balance
            ]);

            //update payment
            $payment->update([
                //                'transaction_id'    => $request->transaction_id,
                //                'invoice_id'        => $request->invoice_id,
                'payment_method'    => $request->payment_method,
                'amount'            => $request->amount,
                'payment_date'      => $request->payment_date,
                'notes'             => $request->notes,
                //                'account_id'        => $request->account_id,
                'paid_by'           => auth()->user()->id,
            ]);



//            Transaction::where('payment_id',$id)->first()->update([
//                'date'          => $request->payment_date,
//                'amount'        => $request->amount,
//                'credit'        => $request->amount,
//                'total_balance' => $account->balance,
//                'name'          => $request->title,
//            ]);

            // Notify User

            $user = $invoice->client;

//            $dataNotification = [
//                'message'       => trans('global.reminder') .' '. $invoice->reference_no . ' ' . trans('cruds.invoice.fields.due_date'),
//                'route_path'    => 'admin/finance/invoices',
//            ];

//            $user->notify(new FinanceNotification($invoice,$user,$dataNotification));
//            $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
//            event(new NewNotification($userNotify));

            if (!$user->email){
                $flashMsg = flash(trans('cruds.messages.client_not_have_email'), 'danger');
                return redirect()->back()->with($flashMsg);
            }

            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;

            //send mail to client
            $template = templates('payment_email');
            $message = str_replace("{PAID_AMOUNT}",$payment->amount,$template->template_body);
            $message = str_replace("{INVOICE_CURRENCY}",settings('default_currency'),$message);
            $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

//            Mail::mailer('smtp')->to($user->email)->send(new FinanceMail($email_from, $sender,$message));
            Mail::mailer('smtp')->to('mabrouk@onetecgroup.com')
                ->cc('mabrouk@onetecgroup.com')
                ->cc('sara@onetecgroup.com')
                ->bcc('marwa@onetecgroup.com')
                ->send(new FinanceMail($email_from, $sender,$message));

            //send mail to CEO of company
//            Mail::mailer('smtp')->to('CEO')->send(new FinanceMail($email_from, $sender,$message));

            $flashMsg = flash(trans('cruds.messages.update_success'), 'success');

            // Commit the transaction
            DB::commit();
            return redirect()->route('finance.admin.payment_received.index')->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();

            $flashMsg = flash(trans('cruds.messages.update_failed'), 'danger');
            return redirect()->back()->with($flashMsg);
            // and throw the error again.
            throw $e;
        }

//        return redirect()->route('finance.admin.payment_received.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        abort_if(Gate::denies('payment_received_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));

        try {
            // Begin a transaction
            DB::beginTransaction();

            $payment = Payment::findOrFail($id);

            // update bank account balance
            $account = Account::findOrFail($payment->account_id);
            $balance = $account->balance - $payment->amount;
            //$balance +=  $request->amount;

            $account->update([
                'balance' => $balance
            ]);

            $payment->delete();

            Transaction::where('payment_id', $id)->delete();

            // Notify User
            if (!$payment->invoice || !$payment->invoice->client){
                $flashMsg = flash(trans('cruds.messages.no_invoice_client'), 'danger');

                return redirect()->back()->with($flashMsg);
            }
            $invoice = $payment->invoice;
            $user = $invoice->client;
            //dd($user);
//            $dataMail = [
//                'subjectMail'    => trans('cruds.finance.payment_received') .' '. $invoice->reference_no,
//                'bodyMail'       => trans('global.reminder') .' '. $invoice->reference_no . ' ' . trans('cruds.invoice.fields.due_date'),
//                'action'         => route("finance.admin.invoices.show", $invoice->id)
//            ];

            if (!$user->email){
                $flashMsg = flash(trans('cruds.messages.client_not_have_email'), 'danger');
                return redirect()->back()->with($flashMsg);
            }
            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;

//            $message = trans('global.delete').' '.trans('cruds.finance.payment_received').' '.
//                trans('cruds.invoice.title_singular').' : '.$payment->amount .' , '.trans('cruds.payment.fields.transaction').' : '.
//                $payment->transaction_id;
//
//            //send mail to client
//            Mail::mailer('smtp')->to($user->email)->send(new FinanceMail($email_from, $sender,$message));
            //send mail to CEO of company
//            Mail::mailer('smtp')->to('CEO')->send(new FinanceMail($email_from, $sender,$message));

            $flashMsg = flash(trans('cruds.messages.delete_success'), 'success');

            // Commit the transaction
            DB::commit();
            return redirect()->route('finance.admin.payment_received.index')->with($flashMsg);

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            $flashMsg = flash(trans('cruds.messages.delete_failed'), 'danger');

            return redirect()->back()->with($flashMsg);

            // and throw the error again.
            throw $e;
        }

//        return back();
    }

    public function massDestroy(Request $request)
    {
        //        abort_if(Gate::denies('payment_received_delete'), Response::HTTP_FORBIDDEN, trans('global.forbidden_page'));
        //        dd($request->all());
        //  validate form data
        $validator = Validator::make($request->all(), [
            'ids'   => 'required|array',
            'ids.*' => 'exists:payments,id',
        ], []);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ids = request('ids');

        foreach ($ids as $id)
        {
            try {
                // Begin a transaction
                DB::beginTransaction();

                $payment = Payment::where('id',$id)->first();

                // update bank account balance
                $account = Account::findOrFail($payment->account_id);
                $balance = $account->balance - $payment->amount;
                //$balance +=  $request->amount;

                $account->update([
                    'balance' => $balance
                ]);
                Transaction::where('payment_id',$id)->delete();
                $payment->delete();

                // Notify User
                if (!$payment->invoice || !$payment->invoice->client){
                    $flashMsg = flash(trans('cruds.messages.no_invoice_client'), 'danger');

                    return redirect()->back()->with($flashMsg);
                }
                $invoice = $payment->invoice;
                $user = $invoice->client;

                if (!$user->email){
                    $flashMsg = flash(trans('cruds.messages.client_not_have_email'), 'danger');
                    return redirect()->back()->with($flashMsg);
                }
                // send mail
                $sender =  settings('smtp_sender_name');
                $email_from =  settings('smtp_email') ;

//                $message = trans('global.delete').' '.trans('cruds.finance.payment_received').' '.
//                    trans('cruds.invoice.title_singular').' : '.$payment->amount .' , '.trans('cruds.payment.fields.transaction').' : '.
//                    $payment->transaction_id;
//
//                //send mail to client
//                Mail::mailer('smtp')->to($user->email)->send(new FinanceMail($email_from, $sender,$message));
//                //send mail to CEO of company
//    //            Mail::mailer('smtp')->to('CEO')->send(new FinanceMail($email_from, $sender,$message));

                $flashMsg = flash(trans('cruds.messages.delete_success'), 'success');
                // Commit the transaction
                DB::commit();

//                return redirect()->route('finance.admin.payment_received.index')->with($flashMsg);


            }catch(\Exception $e){
                // An error occured; cancel the transaction...
                DB::rollback();

//                return redirect()->back()->with(flash(trans('cruds.messages.delete_failed'), 'danger'))->withInput();
                // and throw the error again.
                throw $e;
            }
        }

        //        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function payment_received_pdf($id)
    {

        $payment = Payment::findOrFail($id);

        $title = $payment->transaction_id . '-payment_received.pdf';


        $amounts = $this->total_amount($payment->invoice_id);

        $compact = [
            'payment'   => $payment,
            'amounts'   => $amounts,
            'title'   => $title,

        ];

        $view = 'finance::admin.paymentReceived.payment_received_pdf';
        //        $this->download_pdf($view,$compact,$title);
        $this->stream_pdf($view, $compact, $title);
    }

    public function total_amount($invoice_id)
    {
        $payments = Payment::where('invoice_id', $invoice_id)->where('deleted_at', '=', null)->get();
        $amounts = 0;

        foreach ($payments as $payment) {
            $amounts += $payment->amount;
        }

        return $amounts;
    }
}