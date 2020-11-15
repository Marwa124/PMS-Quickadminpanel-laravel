<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCustomerGroupRequest;
use App\Http\Requests\UpdateCustomerGroupRequest;
use App\Http\Resources\Admin\CustomerGroupResource;
use App\Models\CustomerGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerGroupsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerGroupResource(CustomerGroup::all());
    }

    public function store(StoreCustomerGroupRequest $request)
    {
        $customerGroup = CustomerGroup::create($request->all());

        return (new CustomerGroupResource($customerGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerGroup $customerGroup)
    {
        abort_if(Gate::denies('customer_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerGroupResource($customerGroup);
    }

    public function update(UpdateCustomerGroupRequest $request, CustomerGroup $customerGroup)
    {
        $customerGroup->update($request->all());

        return (new CustomerGroupResource($customerGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerGroup $customerGroup)
    {
        abort_if(Gate::denies('customer_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
