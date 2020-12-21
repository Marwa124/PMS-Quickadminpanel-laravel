<?php


namespace Modules\MaterialsSuppliers\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\MaterialsSuppliers\Http\Requests\Destroy\MassDestroySupplierRequest;
use Modules\MaterialsSuppliers\Http\Requests\Store\StoreSupplierRequest;
use Modules\MaterialsSuppliers\Http\Requests\Update\UpdateSupplierRequest;
use Modules\MaterialsSuppliers\Entities\CustomerGroup;
use Spatie\Permission\Models\Permission;
use Modules\MaterialsSuppliers\Entities\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuppliersController extends Controller
{
    public function index()
    {
        
        abort_if(Gate::denies('supplier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all();

        $customer_groups = CustomerGroup::get();

        // $permissions = Permission::get();

        return view('materialssuppliers::admin.suppliers.index', compact('suppliers', 'customer_groups'));
    }

    public function create()
    {
        abort_if(Gate::denies('supplier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_groups = CustomerGroup::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $permissions = Permission::all()->pluck('title', 'id');

        return view('materialssuppliers::admin.suppliers.create', compact('customer_groups'));
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create($request->all());
      
        return redirect()->route('materialssuppliers.admin.suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_groups = CustomerGroup::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

       
        $supplier->load('customer_group');

        return view('materialssuppliers::admin.suppliers.edit', compact('customer_groups', 'supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        

        return redirect()->route('materialssuppliers.admin.suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->load('customer_group');

        return view('materialssuppliers::admin.suppliers.show', compact('supplier'));
    }

    public function destroy(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->delete();

        return back();
    }

    public function massDestroy(MassDestroySupplierRequest $request)
    {
        Supplier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
