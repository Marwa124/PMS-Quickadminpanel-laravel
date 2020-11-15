<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMeetingMinuteRequest;
use App\Http\Requests\UpdateMeetingMinuteRequest;
use App\Http\Resources\Admin\MeetingMinuteResource;
use App\Models\MeetingMinute;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeetingMinutesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('meeting_minute_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MeetingMinuteResource(MeetingMinute::with(['user'])->get());
    }

    public function store(StoreMeetingMinuteRequest $request)
    {
        $meetingMinute = MeetingMinute::create($request->all());

        return (new MeetingMinuteResource($meetingMinute))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MeetingMinute $meetingMinute)
    {
        abort_if(Gate::denies('meeting_minute_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MeetingMinuteResource($meetingMinute->load(['user']));
    }

    public function update(UpdateMeetingMinuteRequest $request, MeetingMinute $meetingMinute)
    {
        $meetingMinute->update($request->all());

        return (new MeetingMinuteResource($meetingMinute))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MeetingMinute $meetingMinute)
    {
        abort_if(Gate::denies('meeting_minute_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meetingMinute->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
