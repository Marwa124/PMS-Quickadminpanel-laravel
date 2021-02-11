<?php

namespace Modules\Finance\Http\Controllers\Admin;


use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDF;
use Modules\ProjectManagement\Http\Controllers\Traits\ProjectManagementHelperTrait;

class PdfController extends Controller
{
    use ProjectManagementHelperTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function pdf(Request $request)
    {
//           $invoice = Invoice::findOrFail($request->id);
//           $pdf = PDF::loadView('finance::admin.invoices.pdf', compact('invoice'));
//           return $pdf->download('invoices.pdf');

        $invoice = Invoice::findOrFail($request->id);
        $title = $invoice->reference_no . '-invoice.pdf';
        $compact = [
            'invoice'   => $invoice,
        ];

        $view = 'finance::admin.invoices.invoice_pdf';
        //dd($view,$compact,$title);
//        $this->download_pdf($view,$compact,$title);
        $this->stream_pdf($view,$compact,$title);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sales::create');
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
        return view('sales::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sales::edit');
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
