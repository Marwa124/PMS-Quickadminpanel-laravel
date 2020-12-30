<?php
namespace Modules\MaterialsSuppliers\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Modules\MaterialsSuppliers\Http\Requests\Destroy\MassDestroyTaxRateRequest;
use Modules\MaterialsSuppliers\Http\Requests\Store\StoreTaxRateRequest;
use Modules\MaterialsSuppliers\Http\Requests\Update\UpdateTaxRateRequest;
// use App\Models\Permission;
use Modules\MaterialsSuppliers\Entities\TaxRate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxRatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_rate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxRates = TaxRate::all();

        return view('materialssuppliers::admin.taxRates.index', compact('taxRates'));
    }

    public function create()
    {
        abort_if(Gate::denies('tax_rate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $permissions = Permission::all()->pluck('title', 'id');

        return view('materialssuppliers::admin.taxRates.create');
    }

    public function store(StoreTaxRateRequest $request)
    {
        if($request->ajax()) 
        {
          
          $taxRate = TaxRate::create($request->all());
          return response()->json(['id'=>$taxRate->id,'name'=>$taxRate->rate_percent], 200);

        }else{
        $taxRate = TaxRate::create($request->all());
        // $taxRate->permissions()->sync($request->input('permissions', []));
        return redirect()->route('materialssuppliers.admin.tax-rates.index');
        
       }

    }

    public function edit(TaxRate $taxRate)
    {
        abort_if(Gate::denies('tax_rate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        // $taxRate->load('permissions');

        return view('materialssuppliers::admin.taxRates.edit', compact('taxRate'));
    }

    public function update(UpdateTaxRateRequest $request, TaxRate $taxRate)
    {
        $taxRate->update($request->all());
        // $taxRate->permissions()->sync($request->input('permissions', []));

        return redirect()->route('materialssuppliers.admin.tax-rates.index');
    }

    public function show(TaxRate $taxRate)
    {
        abort_if(Gate::denies('tax_rate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $taxRate->load('permissions');

        return view('materialssuppliers::admin.taxRates.show',compact('taxRate'));
    }

    public function destroy(TaxRate $taxRate)
    {
        abort_if(Gate::denies('tax_rate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxRate->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaxRateRequest $request)
    {
        TaxRate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
