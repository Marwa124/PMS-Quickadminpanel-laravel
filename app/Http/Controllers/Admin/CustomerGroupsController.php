<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustomerGroupRequest;
use App\Http\Requests\StoreCustomerGroupRequest;
use App\Http\Requests\UpdateCustomerGroupRequest;
use App\Models\CustomerGroup;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CustomerGroupsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerGroups = CustomerGroup::all();

        return view('admin.customerGroups.index', compact('customerGroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerGroups.create');
    }

    public function store(StoreCustomerGroupRequest $request)
    {
        $customerGroup = CustomerGroup::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $customerGroup->id]);
        }

        return redirect()->route('admin.customer-groups.index');
    }

    public function edit(CustomerGroup $customerGroup)
    {
        abort_if(Gate::denies('customer_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerGroups.edit', compact('customerGroup'));
    }

    public function update(UpdateCustomerGroupRequest $request, CustomerGroup $customerGroup)
    {
        $customerGroup->update($request->all());

        return redirect()->route('admin.customer-groups.index');
    }

    public function show(CustomerGroup $customerGroup)
    {
        abort_if(Gate::denies('customer_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerGroups.show', compact('customerGroup'));
    }

    public function destroy(CustomerGroup $customerGroup)
    {
        abort_if(Gate::denies('customer_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerGroupRequest $request)
    {
        CustomerGroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('customer_group_create') && Gate::denies('customer_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CustomerGroup();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
