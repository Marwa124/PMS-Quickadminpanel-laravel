<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuotationFormRequest;
use App\Http\Requests\StoreQuotationFormRequest;
use App\Http\Requests\UpdateQuotationFormRequest;
use App\Models\QuotationForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotationFormsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quotation_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationForms = QuotationForm::all();

        return view('admin.quotationForms.index', compact('quotationForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('quotation_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotationForms.create');
    }

    public function store(StoreQuotationFormRequest $request)
    {
        $quotationForm = QuotationForm::create($request->all());

        return redirect()->route('admin.quotation-forms.index');
    }

    public function edit(QuotationForm $quotationForm)
    {
        abort_if(Gate::denies('quotation_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationForm->load('user');

        return view('admin.quotationForms.edit', compact('quotationForm'));
    }

    public function update(UpdateQuotationFormRequest $request, QuotationForm $quotationForm)
    {
        $quotationForm->update($request->all());

        return redirect()->route('admin.quotation-forms.index');
    }

    public function show(QuotationForm $quotationForm)
    {
        abort_if(Gate::denies('quotation_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationForm->load('user');

        return view('admin.quotationForms.show', compact('quotationForm'));
    }

    public function destroy(QuotationForm $quotationForm)
    {
        abort_if(Gate::denies('quotation_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuotationFormRequest $request)
    {
        QuotationForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
