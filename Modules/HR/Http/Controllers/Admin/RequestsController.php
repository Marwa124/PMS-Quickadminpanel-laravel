<?php

namespace Modules\HR\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Http\Requests\Destroy\MassDestroyClientMeetingRequest;
use Modules\HR\Http\Requests\Store\StoreClientMeetingRequest;
use Modules\HR\Http\Requests\Update\UpdateClientMeetingRequest;
use Modules\HR\Entities\ClientMeeting;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequestsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('employee_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usersRequests = ClientMeeting::get();

        return view('hr::admin.requests.index', compact('usersRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');
        }

        return view('hr::admin.requests.create', compact('users'));
    }

    public function store(StoreClientMeetingRequest $request)
    {
        // dd($request->all());
        $requests = ClientMeeting::create($request->all());

        return redirect()->route('hr.admin.requests.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('employee_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Fetch all active users Only
        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id')->prepend(trans('global.pleaseSelect'), '');
        }

        $clientMeeting = ClientMeeting::findOrFail($id);

        return view('hr::admin.requests.edit', compact('users', 'clientMeeting'));
    }

    public function update(UpdateClientMeetingRequest $request, $id)
    {
        $clientMeeting = ClientMeeting::findOrFail($id);
        try {
            $request['approved_by'] = $request->user()->id;
            $clientMeeting->update($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('hr.admin.requests.index')->withSuccess("Request Updated Successfully");
    }

    public function show(ClientMeeting $clientMeeting)
    {
        abort_if(Gate::denies('employee_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMeeting->load('user');

        return view('hr::admin.requests.show', compact('clientMeeting'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('employee_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMeeting = ClientMeeting::findOrFail($id);
        $clientMeeting->forceDelete();

        return back();
    }

    public function massDestroy(MassDestroyClientMeetingRequest $request)
    {
        ClientMeeting::whereIn('id', request('ids'))->forceDelete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
