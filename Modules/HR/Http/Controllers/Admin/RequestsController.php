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

        if ($request->ajax()) {
            $query = ClientMeeting::with(['user'])->select(sprintf('%s.*', (new ClientMeeting)->table));
            $table = DataTables::of($query);

            $table->addColumn('status_color', ' ');
            $table->addColumn('request_color', ' ');

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('status_color', '&nbsp;');
            $table->addColumn('request_color', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'employee_request_show';
                $editGate      = 'employee_request_edit';
                $deleteGate    = 'employee_request_delete';
                $modalId       = 'hr.';
                // $crudRoutePart = 'client_meetings';
                $crudRoutePart = 'requests';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'modalId',
                    'crudRoutePart',
                    'row'
                ));
            });

            // $table->editColumn('id', function ($row) {
            //     return $row->id ? $row->id : "";
            // });
            $table->editColumn('request_color', function ($row) {
                return $row->request_type && ClientMeeting::REQUEST_COLOR[$row->request_type] ? ClientMeeting::REQUEST_COLOR[$row->request_type] : 'none';
            });
            $table->editColumn('request_type', function ($row) {
                return $row->request_type ? ClientMeeting::REQUEST_TYPE_SELECT[$row->request_type] : '';
            });
            $table->editColumn('day', function ($row) {
                return $row->day ? $row->day : '';
            });
            $table->editColumn('status_color', function ($row) {
                return $row->status && ClientMeeting::STATUS_COLOR[$row->status] ? ClientMeeting::STATUS_COLOR[$row->status] : 'none';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ClientMeeting::STATUS_SELECT[$row->status] : '';
            });
            // return $table->make(true);
            $table->editColumn('day_hour', function ($row) {
                return $row->day_hour ? ClientMeeting::MEETING_STATUS_SELECT[$row->day_hour] : '';
            });
            $table->editColumn('from_time', function ($row) {
                return $row->from_time ? $row->from_time : "";
            });
            $table->editColumn('to_time', function ($row) {
                return $row->to_time ? $row->to_time : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('hr::admin.requests.index');




        // $requests = ClientMeeting::all();

        // return view('hr::admin.requests.index', compact('requests'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');
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

        // $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');
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

    public function destroy(ClientMeeting $clientMeeting)
    {
        abort_if(Gate::denies('employee_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMeeting->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientMeetingRequest $request)
    {
        ClientMeeting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
