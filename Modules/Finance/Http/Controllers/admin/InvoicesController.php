<?php

namespace Modules\Finance\Http\Controllers\admin;

use App\Events\NewNotification;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Mail\FinanceMail;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItemTax;
use App\Models\ItemInvoiceRelations;
use App\Models\Opportunity;
use App\Models\User;
use App\Notifications\FinanceNotification;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gate;
use DataTables;
use Illuminate\Support\Facades\DB;
use Modules\Finance\Http\Requests\Store\StoreInvoiceRequest;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Modules\ProjectManagement\Entities\Project;
use Modules\Sales\Entities\ProposalsItem;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;
use Illuminate\Support\Facades\Mail;



class InvoicesController extends Controller
{
    use MediaUploadingTrait,ProjectManagementHelperTrait;

    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all();


        return view('finance::admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        $clients = Client::all();
        $projects = [];
        return view('finance::admin.invoices.create', compact('ProposalsItem', 'taxRates', 'clients', 'projects'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        DB::beginTransaction();

        try {
            $total_tax = $request->total_tax ? array_sum($request->total_tax) : 0;
            $after_discount = $request->after_discount ? $request->after_discount : 0;
            $total = $request->total ? $request->total : 0;
            $discount_percent = $request->discount_percent ? $request->discount_percent : 0;
            $request->merge(['total_cost_price' => $total, 'total_tax' => $total_tax, 'after_discount' => $after_discount, 'discount_percent' => $discount_percent]);


            $data = [
                'reference_no' => $request->reference_no,
                'recurring' => $request->recurring,
                'recur_start_date' => $request->recur_start_date,
                'recur_end_date' => $request->recur_end_date,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'notes' => $request->notes,
                'total_tax' => $request->total_tax,
                'client_id' => $request->client_id,
                'project_id' => $request->project_id,
                'adjustment' => $request->adjustment,
                'discount_status' => $request->discounts,
                'discount_total' => $request->discount_total,
                'before_discount' => $request->subtotal,
                'after_discount' => $request->after_discount,
                'total_amount' => floatval($request->total),
                'discount_percent' => intval($request->discount_percent),
                'user_id' => $request->user_id,
                'currency' => 'EGP',
            ];


            $invoice = Invoice::create($data);
            if ($request->items) {

                foreach ($request->items as $key => $value) {
                    $total_taxitem = 0;
                    if (isset($value['tax'])) {
                        # code...
                        $taxRates = TaxRate::whereIN('id', $value['tax'])->pluck('rate_percent');
                        if (!empty($taxRates)) {
                            foreach ($taxRates as $ratevalue) {
                                $total_taxitem = $total_taxitem + ($value['unit_cost'] * $value['total_qty'] * ($ratevalue / 100));
                            }
                        }
                    }

                    $newitem = ItemInvoiceRelations::create($value);
                    $newitem->update([
                        'invoices_id' => $invoice['id'],
                        'item_id' => $value['saved_items_id'],
                    ]);

                    if ($newitem && isset($value['tax'])) {
                        foreach ($value['tax'] as $index => $newtax) {
                            if(is_array($request->total_tax)){
                                $taxcost=$request->total_tax[$index] ? $request->total_tax[$index]: $request->total_tax;
                            }else{
                                $taxcost=$request->total_tax;
                            }
                            $addtaxes = new InvoiceItemTax;
//                            $addtaxes->tax_cost = $invoice['id'];
                            $addtaxes->tax_cost = $taxcost;
                            $addtaxes->taxs_id = $newtax;
                            $addtaxes->invoices_id = $invoice['id'];
                            $addtaxes->item_id = $newitem->id;
                            $addtaxes->save();
                        }

                    }
                }
            }


            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $invoice->id]);
            }

            setActivity('invoice',$invoice->id,'Create Invoice #','تم اضافة فاتوره #',$invoice->reference_no,$invoice->reference_no);

            DB::commit();
            return redirect()->route('finance.admin.invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
//             dd($e);
            return redirect()->back();
        }

    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ProposalsItem = ProposalsItem::all();
        $taxRates = TaxRate::all();
        $clients = Client::all();
        $projects =  Project::where('client_id',$invoice->project_id)->get();
        return view('finance::admin.invoices.edit', compact('ProposalsItem', 'taxRates', 'invoice', 'clients', 'projects'));
    }

    public function update(Request $request, Invoice $invoice)
    {

        DB::beginTransaction();

        try {
            $total_tax = $request->total_tax ? array_sum($request->total_tax) : 0;
            $after_discount = $request->after_discount ? $request->after_discount : 0;
            $total = $request->total ? $request->total : 0;
            $discount_percent = $request->discount_percent ? $request->discount_percent : 0;
            $request->merge(['total_cost_price' => $total, 'total_tax' => $total_tax, 'after_discount' => $after_discount, 'discount_percent' => $discount_percent]);
            // dd($request->all(),$request->item_relation_id,isset($request->item_relation_id),ItemInvoiceRelations::whereIn('id',$request->item_relation_id)->get());
            $data = [
                'reference_no' => $request->reference_no,
                'recurring' => $request->recurring,
                'recur_start_date' => $request->recur_start_date,
                'recur_end_date' => $request->recur_end_date,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'notes' => $request->notes,
                'total_tax' => $request->total_tax,
                'client_id' => $request->client_id,
                'project_id' => $request->project_id,
                'adjustment' => $request->adjustment,
                'discount_status' => $request->discounts,
                'discount_total' => $request->discount_total,
                'before_discount' => $request->subtotal,
                'after_discount' => $request->after_discount,
                'total_amount' => floatval($request->total),
                'discount_percent' => intval($request->discount_percent),
                'currency' => 'EGP',
            ];

            $invoice->update($data);


            if (isset($request->item_relation_id)) {

                $deleteold = ItemInvoiceRelations::whereIn('id', $request->item_relation_id)->forceDelete();
            }


            if ($request->items) {
                foreach ($request->items as $key => $value) {
                    $total_taxitem = 0;
                    if (isset($value['tax'])) {
                        # code...
                        $taxRates = TaxRate::whereIN('id', $value['tax'])->pluck('rate_percent');
                        if (!empty($taxRates)) {
                            foreach ($taxRates as $ratevalue) {
                                $total_taxitem = $total_taxitem + ($value['unit_cost'] * $value['total_qty'] * ($ratevalue / 100));
                            }
                        }
                    }


                    $newitem = ItemInvoiceRelations::create($value);
                    $newitem->update([
                        'invoices_id' => $invoice['id'],
                        'item_id' => $value['saved_items_id'],
                    ]);

                    if ($newitem && isset($value['tax'])) {
                        foreach ($value['tax'] as $index => $newtax) {
                            if(is_array($request->total_tax)){
                                $taxcost=$request->total_tax[$index] ? $request->total_tax[$index]: $request->total_tax;
                            }else{
                                $taxcost=$request->total_tax;
                            }

                            $addtaxes = new InvoiceItemTax;
                            $addtaxes->tax_cost = $taxcost;
                            $addtaxes->taxs_id = $newtax;
                            $addtaxes->invoices_id = $invoice['id'];
                            $addtaxes->item_id = $newitem->id;
                            $addtaxes->save();
                        }

                    }
                }

            }


            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $invoice->id]);
            }

            setActivity('invoice',$invoice->id,'update Invoice #','تم تعديل فاتوره #',$invoice->reference_no,$invoice->reference_no);

            DB::commit();
            return redirect()->route('finance.admin.invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
//            dd($e);
            return redirect()->back();
        }


    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('finance::admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        setActivity('invoice',$invoice->id,'delete Invoice #','تم حذف فاتوره #',$invoice->reference_no,$invoice->reference_no);

        return back();
    }

    public function massDestroy(Request $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

//        setActivity('invoice',$invoice->id,'delete Invoice #','تم حذف فاتوره #',$invoice->reference_no,$invoice->reference_no);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('invoice_create') && Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Invoice();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }


    /**
     * get invoice item by id
     * **/
    public function get_item_by_id(Request $request)
    {
        if ($request->id != null) {

            $item = ProposalsItem::find($request->id);
            $item->setAttribute('group_name', (!empty($item->customer_group) ? $item->customer_group->name : null));
            $item->setAttribute('taxname', (!empty($item->taxes) ? $item->taxes->name : null));
            $item->setAttribute('taxrate', (!empty($item->taxes) ? $item->taxes->rate_percent : null));
            $item->setAttribute('description', strip_tags($item->description));

            return response()->json($item, Response::HTTP_CREATED);
        } else {

            return response()->json(null, 500);
        }
    }

    /**
     * get taxes
     * **/
    public function get_taxes_ajax(Request $request)
    {
        $taxRates = TaxRate::all();
        return response()->json($taxRates, Response::HTTP_CREATED);
    }




    /**
     * get projects
     * **/
    public function get_projects(Request $request)
    {
        $projects = Project::where('client_id',$request->id)->get();
        $loadview=view('finance::admin.invoices.ajaxload', compact('projects'))->render();
        return response()->json($loadview, Response::HTTP_CREATED);
    }



    /**
     * Approved or reject Invoice
     * **/
    public function change_status_approved($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
           'status'     =>    'approved'
        ]);

        setActivity('invoice',$invoice->id,'Change Status Invoice #','تم تعديل حالة فاتوره #',$invoice->reference_no,$invoice->reference_no);

        return redirect()->route('finance.admin.invoices.show',$id);

    }

    /**
     * Reject or reject Invoice
     * **/
    public function change_status_reject($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
           'status'     =>    'rejected'
        ]);

        setActivity('invoice',$invoice->id,'Change Status Invoice #','تم تعديل حالة فاتوره #',$invoice->reference_no,$invoice->reference_no);

        return redirect()->route('finance.admin.invoices.show',$id);

    }

    /**
     *change status of Invoice ajax
     * **/
    public function changestatus(Request $request){

        $invoice = Invoice::findOrFail($request->id);
        if(!empty($invoice)){
            $invoice->update([
                'status' => $request->status,
            ]);
        }

        setActivity('invoice',$invoice->id,'Change Status Invoice #','تم تعديل حالة فاتوره #',$invoice->reference_no,$invoice->reference_no);

        return response()->json(Response::HTTP_CREATED);
    }

    /**
     *history of Invoice
     * **/
    public function history_invoice(Invoice $invoice)
    {

        return view('finance::admin.invoices.history', compact('invoice'));
    }

    public function reminder_invoice($id)
    {
        try {

            // Begin a transaction
            DB::beginTransaction();
            $invoice = Invoice::findOrFail($id);

            // Notify User

            $user = $invoice->client;
            //dd($user);
//            $dataMail = [
//                'subjectMail'    => trans('global.reminder') .' '. $invoice->reference_no,
//                'bodyMail'       => trans('global.reminder') .' '. $invoice->reference_no . ' ' . trans('cruds.invoice.fields.due_date'),
//                'action'         => route("finance.admin.invoices.show", $invoice->id)
//            ];

            $dataNotification = [
                'message'       => trans('global.reminder') .' '. $invoice->reference_no . ' ' . trans('cruds.invoice.fields.due_date'),
                'route_path'    => 'admin/finance/invoices',
            ];

//            $user->notify(new FinanceNotification($invoice,$user,$dataMail,$dataNotification));
            $user->notify(new FinanceNotification($invoice,$user,$dataNotification));
            $userNotify = $user->notifications->where('notifiable_id', $user->id)->sortBy(['created_at' => 'desc'])->first();
            event(new NewNotification($userNotify));

            // send mail
            $sender =  settings('smtp_sender_name');
            $email_from =  settings('smtp_email') ;
            Mail::mailer('smtp')->to($user->email)->send(new FinanceMail($email_from, $sender));

            $flashMsg = flash(trans('cruds.messages.payment_amounts_more_invoice_amount'), 'sucess');

            // Commit the transaction
            DB::commit();

        }catch(\Exception $e){
            // An error occured; cancel the transaction...
            DB::rollback();
            $flashMsg = flash(trans('cruds.messages.payment_amounts_more_invoice_amount'), 'danger');

            // and throw the error again.
            throw $e;
        }
        return redirect()->back()->with($flashMsg);

    }



}
