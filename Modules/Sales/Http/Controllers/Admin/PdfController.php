<?php

namespace Modules\Sales\Http\Controllers\Admin;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDF;
use Modules\Sales\Entities\Proposal;
class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function pdf(Request $request)
    {
           $proposals_info = Proposal::findOrFail($request->id);
        //    $options = new Options();
        //    $options->set('defaultFont', 'Cairo');
        dd( PDF::loadView('sales::admin.proposals.pdf', compact('proposals_info')));
           $loadpdf = PDF::loadView('sales::admin.proposals.pdf', compact('proposals_info'))
           ->stream('PDF-Report.pdf');;
        //    $loadpdf = PDF::loadView('sales::admin.proposals.pdf', compact('proposal'))->stream('proposals.pdf');
        //    $pdf=$loadpdf::loadView('sales::admin.proposals.pdf', compact('proposal'));
           return $loadpdf;
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
