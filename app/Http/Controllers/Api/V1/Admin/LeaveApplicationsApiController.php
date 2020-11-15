<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLeaveApplicationRequest;
use App\Http\Requests\UpdateLeaveApplicationRequest;
use App\Http\Resources\Admin\LeaveApplicationResource;
use App\Models\LeaveApplication;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveApplicationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('leave_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeaveApplicationResource(LeaveApplication::with(['user', 'leave_category'])->get());
    }

    public function store(StoreLeaveApplicationRequest $request)
    {
        $leaveApplication = LeaveApplication::create($request->all());

        if ($request->input('attachments', false)) {
            $leaveApplication->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        return (new LeaveApplicationResource($leaveApplication))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeaveApplicationResource($leaveApplication->load(['user', 'leave_category']));
    }

    public function update(UpdateLeaveApplicationRequest $request, LeaveApplication $leaveApplication)
    {
        $leaveApplication->update($request->all());

        if ($request->input('attachments', false)) {
            if (!$leaveApplication->attachments || $request->input('attachments') !== $leaveApplication->attachments->file_name) {
                if ($leaveApplication->attachments) {
                    $leaveApplication->attachments->delete();
                }

                $leaveApplication->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($leaveApplication->attachments) {
            $leaveApplication->attachments->delete();
        }

        return (new LeaveApplicationResource($leaveApplication))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApplication->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
